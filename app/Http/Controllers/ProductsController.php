<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Product::all();
        return response()->json([
            'status' => 'success',
            'data' => Product::all()
        ]);
    }

    public function display(Request $request)
    {
        // 1
        // $data = Product::all(); // return all Product instance ex: model, class dll
        // 2
        // $data = Product::all()->toArray(); // return all Product to array res: [0 => '' , 1 => '']
        // 3
        $data = Product::all()->toJson(); // return all Product to json res: [{id:1, ...rest}]
        // dd(json_decode($data));
        $dataProduct = [
            'status' => true,
            'message' => 'berhasil mendapatkan data',
            // 'data' =>  $data // only opt 2
            'data' =>  json_decode($data) // convert json ke array, persis 2. tpi akses hasil object
        ];
        $request->header([
            ''
        ]);
        return $dataProduct;
        // return view('crud.list', ['data' => $dataProduct]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required'
        ]);
        return Product::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return Product::find($id);
        if (!Product::find($id)) {
            return response()->json(['status' => 'success', 'message' => 'data not found']);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Found data',
            'data' => [Product::find($id)]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Product::destroy($id);
    }

    /**
     * search the specified resource from storage.
     *
     * @param  str  $id
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return Product::where('desc', 'like', '%' . $name . '%')->get();
    }
}
