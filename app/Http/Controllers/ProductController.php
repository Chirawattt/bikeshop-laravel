<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
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

    public function edit($id = null)
    {
        $product = Product::find($id);
        $categories = Category::pluck('name', 'id')->prepend('เลือกรายการ', ''); // ใช้ pluck('value', 'key') สร้าง array ที่มี key และ value จากข้อมูลในตาราง
        // prepend คือการเพิ่มค่าเข้าไปที่ตำแหน่งแรกของ array
        // result is ['' => 'เลือกรายการ', 1 => 'เสื้อ', 2 => 'กางเกง', 3 => 'รองเท้า']
        return view('product/edit', compact('product', 'categories'));
    }

    public function update(Request $request)
    {
        $rule = ['code' => 'required', 'name' => 'required', 'category_id' => 'required|numeric', 'price' => 'numeric', 'stock_qty' => 'numeric'];
        $message = ['reqired' => 'โปรดกรอกข้อมูล :attribute ให้ครบ ', 'numeric' => 'โปรดกรอกข้อมูล :attribute เป็นตัวเลข'];
        $id = $request->id;
        $temp = ['code' => $request->code, 'name' => $request->name, 'category_id' => $request->category_id, 'price' => $request->price, 'stock_qty' => $request->stock_qty];
        $validator = Validator::make($temp, $rule, $message);
        if ($validator->fails()) {
            return redirect()->back()->withError($validator)->withInput();
        } else {
            return redirect('/product');
        }
    }
}
