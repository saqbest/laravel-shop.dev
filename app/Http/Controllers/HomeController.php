<?php

namespace App\Http\Controllers;

use App\models\ShoppingCard;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Auth;
use Redirect;
use Validator;
use App\models\Products;
use Casinelli\Currency\Facades\Currency;
use Paypalpayment;
use Illuminate\Routing\UrlGenerator;

class HomeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $currencies = $users = \DB::table('currency')->lists('code', 'code');
        if (!empty(session('currency'))) {
            $currency = session('currency');
        } elseif (isset($_POST['currency'])) {
            \Session::put('currency', $_POST['currency']);
            $currency = session('currency');
        } else {
            \Session::put('currency', 'AMD');
            $currency = session('currency');
        }

        if (Auth::guest()) {
            return Redirect::to('auth/login');
        } else {
            $role = Auth::user()->role_id;
            if ($role == 1) {
                $products = DB::table('products')
                ->where('quantity','>',0);
                $price_from = 1;
                $price_to = 100000;
                if ($request->has('price_range')) {
                    global $price_from, $price_to;
                    $price = explode(";", $request->input('price_range'));
                    $price_from = $price[0];
                    $price_to = $price[1];
                    $products->whereBetween('price', [$price_from, $price_to]);
                }

                if ($request->has('type')) {
                    $products->where('type', '=', $request->input('type'));
                }
                $products->where('name', 'like', '%' . $request->input('product_name', '') . '%');
                $shopping_cart = ShoppingCard::where('user_id', Auth::user()->id)->get();
                return view('buyer.index', [
                    'currency' => $currency,
                    'currencies' => $currencies,
                    'products' => $products->paginate(4),
                    'product_name' => $request->input('product_name', ''),
                    'price_from' => $price_from,
                    'price_to' => $price_to,
                    'type' => $request->input('type', ''),
                    'price_range' => $request->input('price_range', ''),
                    'shopping_cart' => $shopping_cart
                ]);

            } elseif ($role == 2) {
                $user_id = Auth::user()->id;

                $products = Products::where('user_id', '=', $user_id)->orderBy('created_at', 'desc')->paginate(5);
                return view('seller.index', ['products' => $products, 'currency' => $currency, 'currencies' => $currencies]);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        $user_id = Auth::user()->id;
        $file = $data['photo'];
        if ($file->move('uploads', $file->getClientOriginalName())) {
            \Image::make('/uploads/' . $file->getClientOriginalName(), array(
                'width' => 200,
                'height' => 200,
                'crop' => true,
                //'grayscale' => true
            ))->save('uploads/300x300/' . $file->getClientOriginalName());
            return Products::create([
                'name' => $data['product_name'],
                'price' => $data['price'],
                'image' => $file->getClientOriginalName(),
                'quantity' => $data['quantity'],
                'type' => $data['type'],
                'description' => $data['description'],
                'user_id' => $user_id,
            ]);
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'product_name' => 'required|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'type' => 'max:20',
            'description' => 'required|max:500',
            'photo' => 'max:10000|mimes:jpeg,bmp,png',

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $this->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function showProduct($id)
    {
        $product = Products::where('id', '=', $id)->get();
        return view('product.index', ['product' => $product]);

    }
    
    public function getAllProducts()
    {
        $user_id = Auth::user()->id;

    }

    public function AddToCart()
    {
        if (isset($_POST['key'])) {
            $user_id = Auth::user()->id;
            $product_id = $_POST['key'];
            $currency = session('currency');

            ShoppingCard::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'currency' => $currency
            ]);
            $product = Products::find($_POST['key']);
            print_r($currency);

        } else {
            return false;
        }
    }

    public function getAllCartItems()
    {
        if (!Auth::guest()) {
            $user_id = Auth::user()->id;
            // $products = \DB::table('shopping_card')->where('user_id', $user_id)->get();
            $currencies = $users = \DB::table('currency')->lists('code', 'code');
            $currency = session('currency');

            $products = ShoppingCard::where('user_id', $user_id)->get();
            return view('buyer.cart', ['products' => $products, 'currencies' => $currencies, 'currency' => $currency]);

        }
    }

    public function deleteCartItem()
    {
        if (isset($_POST['key'])) {
            $line_id = $_POST['key'];
            $cartItem = ShoppingCard::find($line_id);
            $cartItem->delete();
        }
    }

    public function setQuantity()
    {

        if (isset($_POST['key']) && isset($_POST['quantity']) && isset($_POST['info'])) {
            $buy_quantity = $_POST['quantity'];
            $product = Products::find($_POST['info']);
            $product_quantity = $product->quantity;
            if ($product_quantity >= $buy_quantity) {
                $line_id = $_POST['key'];
                $cartItem = ShoppingCard::find($line_id);
                $cartItem->quantity = $buy_quantity;
                $cartItem->save();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::where('id', '=', $id)->get();
        return view('product.edit', ['product' => $product]);
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
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $data = $request->all();
        \DB::table('products')
            ->where('id', $id)
            ->update(array('name' => $data['product_name'], 'price' => $data['price'], 'quantity' => $data['quantity'], 'description' => $data['description'], 'type' => $data['type']));
        return Redirect::to('/product/' . $id);

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

    public function getProducts()
    {

        if (!empty(session('currencyId'))) {
            $currency = session('currencyId');
        } elseif (isset($_POST['currencyId'])) {
            \Session::put('currencyId', $_POST['currencyId']);
            $currency = session('currencyId');
        } else {
            \Session::put('currencyId', '0');
            $currency = session('currencyId');
        }
        $products = Products::all()->toArray();
        $currencies = \DB::table('currency')->get();
        $data[] = ['products' => $products, 'currencies' => $currencies, 'defaultCurrency' => $currency];
        return json_encode($data);
    }

    
}
