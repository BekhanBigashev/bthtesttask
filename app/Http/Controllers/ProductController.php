<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::activeOnly();
        return view('product/index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product/create');
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|min:10',
            'art' => 'unique:products,art|required|regex:/^[A-Za-z0-9]+$/i',
            'status' => 'in:available,unavailable',
            'color' => 'min:4|max:15',
            'size' => 'regex:/^[0-9]+$/i',
            'weight' => 'regex:/^[0-9]+$/i'
        ]);

        $product = new Product;
        $product->name = $validated['name'];
        $product->art = $validated['art'];
        $product->status = 'available';
        $product->data = [
            'color' => $validated['color'],
            'size' => $validated['size'],
            'weight' => $validated['weight'],
        ];
        if ($product->save()) {
            return redirect()->route('products.index')->with('success','Product added !');
        } else {
            return redirect()->route('products.index')->with('error','Something went wrong(');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product/edit', ['product' => $product]);
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
        dd($request->all());
        $validated = $request->validate([
            'name' => 'required|min:10',
            'status' => 'in:available,unavailable',
            'color' => 'min:4|max:15',
            'size' => 'regex:/^[0-9]+$/i',
            'weight' => 'regex:/^[0-9]+$/i'
        ]);

        $updateData = [
            'name' => $validated['name'],
            'status' => $validated['status'],
            'data' => [
                'size' => $validated['size'],
                'color' => $validated['color'],
                'weight' => $validated['weight'],
            ]
        ];

        $product = Product::where('id', $id);
        if ($product->update($updateData)) {
            return redirect()->route('products.index')->with('success','Product updated !');
        } else {
            return redirect()->route('products.index')->with('error','Something went wrong(');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('products.index')->with('success','Item deleted');
    }

}
