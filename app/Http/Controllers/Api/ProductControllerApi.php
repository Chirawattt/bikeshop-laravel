<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductControllerApi extends Controller
{
    //
    public function product_list() {
        $products = Product::all();
        return response()->json(['ok' => true, 'products' => $products]);
    }
}
