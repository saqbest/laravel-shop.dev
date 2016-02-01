<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Redirect;
use Validator;
use App\models\Products;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $role = Auth::user()->role_id;
        if (Auth::guest()) {
            return Redirect::to('auth/login');

        } elseif ($role == 1) {

            return view('buyer.index');

        } elseif ($role == 2) {
            return view('seller.index');

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        $file = $data['photo'];
        if ($file->move('uploads', $file->getClientOriginalName())) {
            return Products::create([
                'name' => $data['product_name'],
                'price' => $data['price'],
                'image' => $file->getClientOriginalName(),
                'quantity' => $data['quantity'],
                'description' => $data['description'],
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
