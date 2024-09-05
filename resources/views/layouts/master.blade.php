<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BikeShop | @yield('title', 'จำหน่ายจักรยานออนไลน์')</title>
    {{-- css --}}
    {{-- public/vendor -> bootstrap, font-awesome, toastr --}}
    {{-- downloaded it to use in this project --}}
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/toastr/build/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- js --}}
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('vendor/toastr/build/toastr.min.js') }}"></script>
    <script src="{{ asset('js/angular.min.js') }}"></script>

</head>

<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a href="/product" class="navbar-brand">BikeShop</a>
            </div>
            <p class="navbar-text navbar-left">นายจีรวัฒน์ ญานะ 6506021611017</p>
            <div id="navbar" class="navbar-collapse collapse navbar-right">
                <ul class="nav navbar-nav">
<<<<<<< HEAD
=======
                    <li><a href="/home">หน้าแรก</a></li>
>>>>>>> 46e4174e78886715e609d6e121d67279513a25c6
                    <li><a href="/product">ข้อมูลสินค้า</a></li>
                    <li><a href="/category">ข้อมูลประเภทสินค้า</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
<<<<<<< HEAD
=======
        <h4 class="text-center">นาย จีรวัฒน์ ญานะ 6506021611017</h2>
>>>>>>> 46e4174e78886715e609d6e121d67279513a25c6
        @yield('content')
    </div>

    {{-- js --}}
    @if (session('message'))
        @if (session('status'))
            <script>
                toastr.success("{{ session('message') }}")
            </script>
        @else
            <script>
                toastr.error("{{ session('message') }}")
            </script>
        @endif
    @endif
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>
