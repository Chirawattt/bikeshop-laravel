@extends('layouts.master')
@section('title')
    เพิ่มประเภทสินค้า
@endsection
@section('content')
    <h1 class="text-center">เพิ่มประเภทสินค้า</h1>
    <ul class="breadcrumb">
        <li><a href="/product">หน้าแรก</a></li>
        <li><a href="/category">ประเภทสินค้าทั้งหมด</a></li>
        <li class="active">เพิ่มประเภทสินค้า</li>
    </ul>
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif
    {!! Form::open([
        'method' => 'POST',
        'enctype' => 'multipart/form-data',
        'action' => 'App\Http\Controllers\CategoryController@insert',
        // 'url' => '/product/insert',
    ]) !!}
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">
                <strong>เพิ่มประเภทสินค้า</strong>
            </div>
        </div>
        <div class="panel-body">
            <table class="col-xs-12">
                <tr>
                    <td class="text-right col-xs-2">{{ Form::label('name', 'ชื่อประเภท :') }}</td>
                    <td>{{ Form::text('name', Request::old('name'), ['class' => 'form-control']) }}</td>
                </tr>
            </table>
        </div>
        <div class="panel-footer">
            <div style="display:flex; justify-content: space-between">
                <button type="reset" class="btn btn-danger">ยกเลิก</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection