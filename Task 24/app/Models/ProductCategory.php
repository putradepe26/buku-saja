<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductCategory extends Model
{
    public function Product()
    {
        return $this->belongsTo(ProductCateogry::class);
    }
}
