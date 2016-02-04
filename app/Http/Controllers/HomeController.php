<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Redirect;
use Validator;
use App\models\Products;
use Casinelli\Currency\Facades\Currency;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $currencies = $users = \DB::table('currency')->lists('code', 'code');
        if (!empty(session('currency'))) {
            $currency = session('currency');
        } elseif (isset($_POST['currency'])) {
            \Session::put('currency', $_POST['currency']);
            $currency = session('currency');
        } else {
            $currency = 'AMD';
        }

        if (Auth::guest()) {
            return Redirect::to('auth/login');
        } else {
            $role = Auth::user()->role_id;
            if ($role == 1) {
                $products = Products::all();

                return view('buyer.index', ['products' => $products, 'currency' => $currency, 'currencies' => $currencies]);

            } elseif ($role == 2) {
                $user_id = Auth::user()->id;

                $products = Products::where('user_id', '=', $user_id)->get();
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
                'width' => 300,
                'height' => 300,
                //'grayscale' => true
            ))->save('uploads/300x300/' . $file->getClientOriginalName());
            return Products::create([
                'name' => $data['product_name'],
                'price' => $data['price'],
                'image' => $file->getClientOriginalName(),
                'quantity' => $data['quantity'],
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
            'description' => 'max:500',
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
    public function show($id)
    {
        //
    }

    public function getAllProducts()
    {
        $user_id = Auth::user()->id;

    }

    public function AddToCard()
    {

    }

    public function test()
    {

        $cfg = [
            'src' => 'App\models\Products',
            'columns' => [
                'id',
                'name',
                'price',
                'quantity',
                'quantity',
            ]
        ];
        echo \Grids::make($cfg);

        echo Currency::format(12.00, 'AMD');
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
