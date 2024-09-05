@extends('layouts.master')
@section('title', 'อุปกรณ์จักรยาน, อะไหล่, ชุดแข่ง, และอุปกรณ์ตกแต่ง')
@section('content')
    <br>
    <br>
    <div class="row" ng-app="app" ng-controller="ctrl">
        <div class="col-xs-3">Sidebar</div>
        <div class="col-xs-9">
            <div class="row">
                <div class="col-md-3" ng-repeat="p in products">
                    {{-- product card --}}
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4><a href="#">@{p.name}</a></h4>
                            <div class="form-group">
                                <div>คงเหลือ: @{p.stock_qty}</div>
                                <div>ราคา <strong>@{p.price}</strong> บาท</div>
                            </div>
                            <a href="#" class="btn btn-success btn-block"><i class="fa fa-shopping-cart"> หยิบใส่ตะกร้า</i></a>
                        </div>
                    </div>
                    {{-- ^ end product card --}}
                </div>
            </div>
        </div>
    </div>

    {{-- js --}}
    <script type="text/javascript">
        // angular.module('name', [dependencies]) -> create module [] means no dependencies create module from scratch
        var app = angular.module('app', []).config(function ($interpolateProvider) {
            $interpolateProvider.startSymbol('@{').endSymbol('}');
        });
        // service
        app.service('productService', function($http) {
            this.getProductList = function() {
                return $http.get('/api/product');
            }
        });
        // controller
        app.controller('ctrl', function ($scope, productService) {
            $scope.helloMessage = 'ยินดีต้อนรับสู่ AngularJS และ Laravel';

            $scope.products = [];
            $scope.getProductList = function() {
                productService.getProductList().then(function (res) {
                    if (!res.data.ok) {
                        alert('เกิดข้อผิดพลาด');
                        return;
                    }
                    $scope.products = res.data.products;
                });
            };
            $scope.getProductList(); // call function to get product list

            // mock-up data
            // $scope.products = [
            //     { code: 'P001', name: 'เสื้อยืด', price: 250.00, qty: 6 },
            //     { code: 'P002', name: 'กางเกงยีนส์', price: 1500.00, qty: 3 },
            //     { code: 'P003', name: 'รองเท้า', price: 1200.00, qty: 1 },
            //     { code: 'P004', name: 'ถุงเท้า', price: 100.00, qty: 7 },
            //     { code: 'P005', name: 'หมวก', price: 300.00, qty: 0 },
            // ];
        });
        
    </script>



    {{-- original before optimize --}}
    {{-- <div class="container" ng-app="app" ng-controller="ctrl">
        <h2 class="text-center">@{ helloMessage }</h2>
        <input type="text" class="form-control" ng-model="helloMessage">
        <br>
        <br>
        <br>
        <input type="text" class="form-control" ng-model="query.name" placeholder="ค้นหาสินค้า . . .">
        <table class="table table-bordered" ng-if="products.length">
            <thead>
                <tr>
                    <th>รหัส</th>
                    <th>ชื่อสินค้า</th>
                    <th>ราคาขาย</th>
                    <th>คงเหลือ</th>
                    <th class="text-center">สถานะ</th>
                </tr>
            </thead>
            <tr ng-repeat="p in products|filter:query">
                <td>@{p.code}</td>
                <td>@{p.name}</td>
                <td>@{p.price|number:2}</td>
                <td>@{p.stock_qty|number:0}</td>
                <td align="center">
                    <span ng-if="p.stock_qty > 0 && p.stock_qty < 5" class="label label-warning">สินค้าใกล้หมด</span>
                    <span ng-if="p.stock_qty == 0" class="label label-danger">สินค้าหมด</span>
                    {{-- another way by using ng-class --}}
                    {{-- <span ng-if="p.qty > 0 && p.qty < 5" ng-class="{'label label-warning': p.qty > 0 && p.qty < 5}">สินค้าใกล้หมด</span> --}}
                    {{-- <span ng-if="p.qty == 0" ng-class="{'label label-danger': p.qty == 0}">สินค้าหมด</span>
                    
                </td>
            </tr>
        </table>
        <div class="alert alert-danger" role="alert" ng-if="!products.length"> ไม่พบข้อมูลสินค้า </div>
    </div>
 --}}
@endsection