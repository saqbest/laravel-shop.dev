<?php

namespace App\Http\Controllers;

use App\models\PurchasedProducts;
use App\models\Transactions;
use Illuminate\Http\Request;
use Paypalpayment;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Products;
use DB;
use Illuminate\Support\Facades\Session;
class BuyController extends Controller
{
    /**
     * object to authenticate the call.
     * @param object $_apiContext
     */
    private $_apiContext;

    /**
     * Set the ClientId and the ClientSecret.
     * @param
     *string $_ClientId
     *string $_ClientSecret
     */
    private $_ClientId = 'AWQUI56y9hykFOq2Hwspc413zdxPEQxlkxJ_PmwsWmjxEHdGoX3zuFo1wbJIV3Mwibc0VvQbnQ-b1FDk';
    private $_ClientSecret = 'ELRBpKAZy1wzyJ2zzANpkbafVH4TrEn29-7wZPHbH5nZypYRd_Crh_qsKNfI4rUbxxXky_Tl3jziGKIZ';

    /*
     *   These construct set the SDK configuration dynamiclly,
     *   If you want to pick your configuration from the sdk_config.ini file
     *   make sure to update you configuration there then grape the credentials using this code :
     *   $this->_cred= Paypalpayment::OAuthTokenCredential();
    */
    public function __construct()
    {

        // ### Api Context
        // Pass in a `ApiContext` object to authenticate
        // the call. You can also send a unique request id
        // (that ensures idempotency). The SDK generates
        // a request id if you do not pass one explicitly.

        $this->_apiContext = Paypalpayment::apiContext($this->_ClientId, $this->_ClientSecret);

        // Uncomment this step if you want to use per request
        // dynamic configuration instead of using sdk_config.ini

        $this->_apiContext->setConfig(array(
            'mode' => 'sandbox',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => __DIR__ . '/../PayPal.log',
            'log.LogLevel' => 'FINE'
        ));

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function buyItem(Request $request)
    {
        $subTotal = 0;
        $data = $request->input('products');
        Session::put('product_info', $data);

        $payer = Paypalpayment::payer();
        $payer->setPaymentMethod("paypal");

        $products = Products::whereIn('id', array_keys($data))->get();

        foreach ($products as $product) {
            $quantity = $data[$product->id]['quantity'];
            $quantity = $product->quantity < $quantity ? $product->quantity : $quantity;

            $product_list[] = Paypalpayment::item()
                ->setName($product->name)
                ->setDescription($product->id)
                ->setCurrency('USD')
                ->setQuantity($quantity)
                ->setPrice($product->price);
            $subTotal += ($product->price) * $quantity;
        }


        $itemList = Paypalpayment::itemList();
        $itemList->setItems($product_list);


        $details = Paypalpayment::details();
        $details->setShipping("100")
            ->setTax("10")
            //total of items prices
            ->setSubtotal($subTotal);

        //Payment Amount
        $amount = Paypalpayment::amount();
        $amount->setCurrency("USD")
            // the total is $17.8 = (16 + 0.6) * 1 ( of quantity) + 1.2 ( of Shipping).
            ->setTotal($subTotal + 110)
            ->setDetails($details);

        // ### Transaction
        // A transaction defines the contract of a
        // payment - what is the payment for and who
        // is fulfilling it. Transaction is created with
        // a `Payee` and `Amount` types

        $transaction = Paypalpayment::transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());

        // ### Payment
        // A Payment Resource; create one using
        // the above types and intent as 'sale'
        $baseUrl = url();
        $redirectUrls = Paypalpayment::redirectUrls();
        $redirectUrls->setReturnUrl("$baseUrl/paypal/ok")
            ->setCancelUrl("$baseUrl/paypal/error");
        $payment = Paypalpayment::payment();

        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        try {
            // ### Create Payment
            // Create a payment by posting to the APIService
            // using a valid ApiContext
            // The return object contains the status;
            $payment->create($this->_apiContext);
        } catch (\PPConnectionException $ex) {
            return "Exception: " . $ex->getMessage() . PHP_EOL;
            exit(1);
        }
            //dd($payment);
        return redirect($payment->getApprovalLink());

    }

    public function ok(Request $request)
    {
        $data=session('product_info');
        if($request->has('paymentId')&&$request->has('PayerID')){
            $payment = Paypalpayment::getById($request->input('paymentId'), $this->_apiContext);
            $execution = Paypalpayment::PaymentExecution();
            $execution->setPayerId($request->input('PayerID'));
            $payment->execute($execution,$this->_apiContext);
        }
        else{
            return redirect('paypal/error');
        }
        $payment = Paypalpayment::getById($request->input('paymentId'), $this->_apiContext);

        $lastId=Transactions::create([
            'paymentId' => $payment->id,
            'cart' => $payment->cart,
            'payer_email' => $payment->payer->payer_info->email,
            'payer_first_name' => $payment->payer->payer_info->first_name,
            'payer_last_name' => $payment->payer->payer_info->last_name,
            'payer_id' => $payment->payer->payer_info->payer_id,
            'shipping_recipient_name' => $payment->payer->payer_info->shipping_address->recipient_name,
            'shipping_city' => $payment->payer->payer_info->shipping_address->city,
            'country_code' => $payment->payer->payer_info->country_code,
            'amount_total' => $payment->transactions[0]->amount->total,
            'invoice_number' => $payment->transactions[0]->invoice_number,
        ]);
            $lastId=$lastId->id;
        foreach ($payment->transactions[0]->item_list->items as $item){
            $qart_info = $data[$item->description]['qart_info'];
            DB::table('shopping_card')->where('id', '=', $qart_info)->delete();

            $product = DB::table('products')
                        ->where('id', $item->description)
                        ->get();
            $productNewQuantity=$product[0]->quantity-$item->quantity;
            DB::table('products')
                ->where('id', $item->description)
                ->update(['quantity' => $productNewQuantity]);
            PurchasedProducts::create([
                'transaction_id'=>$lastId,
                'product_name'=>$item->name,
                'quantity'=>$item->quantity,
                'description'=>$item->description,
                'tax'=>$item->tax,
            ]);
        }
        Session::forget('product_info');

        return redirect('/');
    }

    public function error()
    {
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
