
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý tài khoản</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link id="favico" rel="icon" type="image/png" href="http://vnpgroup.vn/themes/v1/images/logo.png"/>
</head>
<body>
@include('includes.header')
<div class="wraper">
    <div class="warper-content">
        <div class="col-md-2 nav nav-bar">
            <ul class="list-group">
                <li class="">
                    <a href="{{route('profileUser')}}" class="list-group-item"><i class="fa fa-user-circle-o"></i>&emsp;Tài khoản của tôi</a>
                    {{--                    <ul class="" role="menu">--}}
                    {{--                        <li ><a href="{{route('payUser')}}" class="list-group-item"><i class="fa fa-suitcase"></i>&emsp;hồ sơ</a></li>--}}
                    {{--                        <li ><a href="" class="list-group-item"><i class="fa fa-bank"></i>&emsp;Quản lý số dư</a></li>--}}
                    {{--                        <li ><a href="" class="list-group-item"><i class="fa fa-key"></i>&emsp;đổi mật khẩu</a></li>--}}
                    {{--                    </ul>--}}
                </li>
                <li ><a href="{{route('paymentUser')}}" class="list-group-item"><i class="fa fa-bank"></i>&emsp;Quản lý số dư</a></li>
                <li ><a href="" class="list-group-item"><i class="fa fa-shopping-bag"></i>&emsp;Thống kê chi tiêu</a></li>
                <li ><a href="" class="list-group-item"><i class="fa fa-key"></i>&emsp;Đổi mật khẩu</a></li>
            </ul>
        </div>
        <div class="col-md-10 warper-content-info">
            <div class="content">
                @yield('content-account')
            </div>

        </div>
    </div>
</div>
<style>
    .wraper{
        min-height: 120vh;
        background: #DEDDFD;
        margin-top: 45px;
        padding: 20px 30px;
    }
    .warper-content-info{
        padding: 0;
    }
    .warper-content{
        min-height: 500px;


    }
    .nav-bar{
        padding: 0;
    }
    .list-group{
        background: #DEDDFD;
        /*min-height: 100vh;*/

    }
    .warper-content ul li{
        list-style: none;
        border-bottom: 1px solid #fff;
    }
    .list-group-item{
        border: none;
        background: #DEDDFD;
        text-transform: capitalize;
    }
    .content{
        background: #f5f5f5;
        min-height: 100vh;
    }
    .wraper .fa{
        color: #1e2f7f;
    }
    .nav .open>a, .nav .open>a:focus, .nav .open>a:hover,.nav .open>a:hover .fa,.nav .open>a:focus .fa {
        color: #fff;
    }
    .dropdown-menu{
        padding: 10px;
    }

</style>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="{{asset('vendors/jquery/js/jquery.min.js')}}"></script>
</body>
</html>
