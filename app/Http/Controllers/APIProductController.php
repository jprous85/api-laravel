<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class APIProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return response()->json(['data'=> $product], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json(['data' => $product], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(int $product)
    {
        $prod = Product::where('id', $product)->first();

        return response()->json(['data'=>$prod], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        $product->name = $request->name;
        $product->category = $request->category;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->save();

        return response()->json(['data' => $product], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        $product = Product::where('id', $product)->first();
        $product->delete();
        return response()->json('OK', 204);
    }
}
