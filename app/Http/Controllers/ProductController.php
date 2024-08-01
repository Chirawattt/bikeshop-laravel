<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Config;
// paginate import

class ProductController extends Controller
{
    // rp = Result per page
    // default value is 10
    var $rp = 10;


    public function __construct()
    {
        // get congif from app.php
        $this->rp = Config::get('app.result_per_page');
    }

    public function index()
    {
        $products = Product::paginate($this->rp);
        // $products = DB::table('products')->get();
        return view('product/index', compact('products'));
    }

    public function search(Request $request)
    {
        $query = $request->q;
        if ($query) {
            $products = Product::where('code', 'like', "%$query%")
                ->orWhere('name', 'like', "%$query%")->paginate($this->rp);
            return view('product/index', compact('products'));
        } else {
            $products = Product::paginate($this->rp);
            return redirect()->back()->withErrors(['queryError' => 'โปรดใส่คำค้นหา!']);
        }
    }
}
