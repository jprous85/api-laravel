<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        if (!$this->middleware('auth')){
            redirect('/');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::paginate(15);
        return view('products.list', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();

        try {
            $product::create($request->all());
            return redirect('/product/create')
                ->with('status', trans('product.create_product_success'))
                ->with('status_box', 'success');
        }catch (\Exception $e) {
            return redirect('/product/create')
                ->with('status', trans('product.error_create_product'))
                ->with('status_box', 'danger');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(int $product)
    {
        $prod = Product::where('id', $product)->firstOrFail();
        return view('/products/edit', compact('prod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        try {
            $new_product = Product::where('id', $request->id)->firstOrFail();
            $new_product->name = $request->name;
            $new_product->category = $request->category;
            $new_product->description = $request->description;
            $new_product->quantity = $request->quantity;
            $new_product->price = $request->price;
            $new_product->save();
            return redirect('product/edit/' . $new_product->id)
                ->with('status_box', 'success')
                ->with('status', trans('product.a'))
                ;
        } catch (\Exception $e) {
            return redirect('product/edit/' . $request->id)
                ->with('status_box', 'danger')
                ->with('status', 'product.b')
                ;

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $product)
    {
        try {
            Product::where('id', $product)->delete();
            return redirect('/product/list')
                ->with('status', 'product.success_delete_product')
                ->with('status_box', 'success')
                ;
        }
        catch (\Exception $e) {
            return redirect('/product/list')
                ->with('status', trans('product.error_delete_product'))
                ->with('status_box', 'danger')
                ;
        }
    }
}
