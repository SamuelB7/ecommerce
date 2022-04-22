<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductsImages;
use Carbon\Carbon;
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
        $products = Product::paginate(25);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'price' => $request->price
        ]);
        
        $images = $request->file('image');
        
        foreach($images as $image) {
            $name_generated = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('img/products/'), $name_generated);

            $img_path = 'img/products/'.$name_generated;

            ProductsImages::insert([
                'image' => $img_path,
                'product_id' => $product->id,
                'created_at' => Carbon::now()
            ]);
        }

        return redirect('admin/products')->with('success', 'Produto adicionado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $product = Product::find($id);

        if($request->route()->getPrefix() == '/admin') {
            return view('admin.products.show', compact('product'));
        } else {
            return view('products.show', compact('product'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if($request['name'] != null && $request['name'] != '') {
            $product->name = $request['name'];
        }

        if($request['description'] != null && $request['description'] != '') {
            $product->description = $request['description'];
        }

        if($request['price'] != null && $request['price'] != '') {
            $product->price = $request['price'];
        }

        if($request['quantity'] != null && $request['quantity'] != '') {
            $product->quantity = $request['quantity'];
        }

        if($request['category_id'] != null && $request['category_id'] != '') {
            $product->category_id = $request['category_id'];
        }

        $product->save();

        return redirect("/admin/products/$id")->with('success', 'produto editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return redirect('/admin/products')->with('success', 'Produto deletado com sucesso');
    }
}
