<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;


class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProductCategory::withCount('product')->paginate(10);
        return view('dashboard.product_category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.category_product.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required','string','max:255']
        ]);

        $name_check=ProductCategory::where('name',$request->name)->exist();

        if($name_check)
        {
            return redirect()->back->withErrors(['Nama kategori sudah ada!']);
        }
        else
        {
            $category=new ProductCategory;
            $category->name=$request->name;
            $category->save();

            return redirect()->route('product-category.index')
                            ->with('success','Kategori berhasil dibuat');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
