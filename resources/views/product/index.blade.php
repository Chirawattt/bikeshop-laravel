@extends('layouts.master')
@section('title')
    รายการสินค้า
@endsection
@section('content')
    <h1 class="text-center">รายการสินค้าทั้งหมด</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>รูปสินค้า</th>
                <th>รหัส</th>
                <th>ชื่อสินค้า</th>
                <th>ประเภท</th>
                <th>คงเหลือ</th>
                <th>ราคาต่อหน่วย</th>
                <th>การทำงาน</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)
                <tr>
                    <td> {{ $item->image_url }} </td>
                    <td> {{ $item->code }} </td>
                    <td> {{ $item->name }} </td>
                    <td> {{ $item->category->name }} </td>
                    <td> {{ number_format($item->stock_qty, 0) }} </td>
                    <td> {{ number_format($item->price, 2) }} </td>
                    <td>
                        <a href="#" class="btn btn-info"><i class="fa fa-edit"></i> แก้ไข</a>
                        <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i> ลบ</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4">รวม</th>
                <th>{{ $products->sum('stock_qty') }}</th>
                <th>{{ number_format($products->sum('price'), 2) }}</th>
            </tr>
        </tfoot>
    </table>
@endsection
