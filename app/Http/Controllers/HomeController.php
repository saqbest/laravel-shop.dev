<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
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

        if (Auth::guest()) {
            return Redirect::to('auth/login');
        } else {
            $role = Auth::user()->role_id;
            if ($role == 1) {

                return view('buyer.index');

            } elseif ($role == 2) {
                return view('seller.index');
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


    public function test()
    {
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
