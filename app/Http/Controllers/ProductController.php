<?php
namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::latest()->paginate(5);

        return view('products.summary', [
            'products' => $products
        ]);
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
        $request->validate([
            'name' => 'required',
            'currency' => 'required',
            'price' => 'required'
        ]);

        Products::Create($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Products $product)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Products::find($id);
        return view('products.edit', compact('products'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        $products = Products::findOrFail($id);       
        
        $products->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}