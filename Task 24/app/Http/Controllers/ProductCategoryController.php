<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;



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
        $category = ProductCategory::findOrFail($id);
        return view('dashboard.category_products.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>['required', 'string', 'max:255'],
        ]);

        $category_name_check =ProductCategory::where('name', $request->name)->exists();

        if($category_name_check)
        {
            return back()
                    ->withInput()
                    ->withErrors(['Nama kategori sudah ada']);
        }
        else
        {
        $category=ProductCategory::findOrFail($id);
        $category->name=$request->name;
        $category->sava();
        return redirect()
                ->route('product-category.index')
                ->with('success', 'Kategori berhasil diperbarui');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $category=ProductCategory::findOrFail($id);
        $product_check= Product::where('product_category_id', $category->id)->exists();
        if($product_check)
        {
            $product = Product::where('product_category_id', $category->id)->delete([
                'product_category_id' =>null
            ]);
        }
        $category->delete();

        return redirect()->route('product-category.index')
        ->with('success', 'Kategori behasil dihapus');
    }
}
