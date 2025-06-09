<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::withCount('category')->paginate(2);
        return view('dashboard.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.product.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'name'=>['required','string','max:255'],
            'description'=>['required','string','max:255'],
            'price'=>['required','numeric'],
            'product_cateogry_id'=>['required','exist:product_cateogries.id'],
            'stock'=>['required','numeric'],
            'image'=>['required','image','mimes:jpeg,png,jpg,gif','max:2048'],
        ]);

        $category=ProductCategory::find0rFail($request->category_id);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->product_category_id = $category->id;
        $product->stock = $request->stock;
        if($request->hasFile('image'))
        {
        $product->image = $request->file('image')->store('products','public');
        }
        $product->save();

        return redirect()
        ->route('product.index')
        ->with('success','Produk berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
