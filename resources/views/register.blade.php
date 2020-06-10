<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Tăng tương tác ảo">
    <meta name="author" content="VNP Software">
    <meta name="keyword" content="livestream, bufflike, buffsub, buffview, seed, comment">
    <title>CoreUI Pro Bootstrap Admin Template</title>
    <!-- Icons-->
    <link href="{{asset('vendors/@coreui/icons/css/coreui-icons.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Main styles for this application-->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>
<body class="app flex-row align-items-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mx-4">
                <div class="card-body p-4">
                    <h1 class="text-center" style="margin-bottom: 8px;color: #2069b5;"><a href="http://vnpsoftware.biz/">VNP SOFTWARE</a></h1>
                    <h3 class="text-center" style="margin-bottom: 45px;font-weight: 800;font-size: 18px;
                               color: #c51111"></h3>
                    <p class="text-muted"></p>
                    <form action="" method="POST">
                        @csrf
                        @if(Session::has('error'))
                            <p class="alert alert-danger">{{session::get('error')}}</p>
                        @endif
                        @if(Session::has('success'))
                            <p class="alert alert-success">{{session::get('success')}}</p>
                        @endif
                        @if(!empty($err_s))
                            <p class="alert alert-danger">{{$err_s}}</p>
                        @endif
                        @if(!empty($err_full_name))
                            <span class="error">{{$err_full_name}}</span>
                        @endif
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" placeholder="Tên" name="full_name">
                        </div>
                        @if(!empty($err_email))
                            <span class="error">{{$err_email}}</span><br>
                        @endif
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-at"></i>
                                </span>
                            </div>
                            <input class="form-control" type="email" placeholder="Email" name="email">
                        </div>
                        @if(!empty($err_password))
                            <span class="error">{{$err_password}}</span>
                        @endif
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-lock"></i>
                            </span>
                            </div>
                            <input class="form-control" type="password" placeholder="Mật khẩu" name="password">
                        </div>
                        @if(!empty($err_password_confirmation))
                            <span>{{$err_password_confirmation}}</span>
                        @endif
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-lock"></i>
                            </span>
                            </div>
                            <input class="form-control" type="password" placeholder="Nhập lại mật khẩu" name="password_confirmation">
                        </div>
                        @if(!empty($err_phone))
                            <span class="error">{{$err_phone}}</span>
                        @elseif(!empty($err_phone_exits))
                            <span class="error">{{$err_phone_exits}}</span>
                        @endif
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-phone"></i>
                            </span>
                            </div>

                            <input class="form-control" type="phone_number" placeholder="số điện thoại" name="phone_number">
                        </div>
                        <div  id="captcha">
                            <div class=" col-6 code-captcha">
                                <img src="{{'img/sss.png'}}" alt="">

                                <p>
                                    @if(Session::has('captcha'))
                                        {{ session()->get('captcha')}}
                                    @endif
                                </p>
                                <span class="" style="    margin-left: 152px;font-size: 28px;">
                                        <a href=""><i class="fa fa-refresh"></i></a></span>

                            </div>

                            <div class="col-6">
                                <input class="form-control" type="text" name="code" placeholder="Xác nhận mã" style="
                                    width: 140px;margin: 7px;border: 1px solid #000;" />
                            </div>

                        </div>
                        <button  class="btn btn-block btn-primary" type="submit">Tạo tài khoản</button>
                    </form>
                    <br>
                        <a href="{{route('login')}}" class="pull-right" style="color: #4dbd74; float: right;">Đăng nhập</a>
                </div>
{{--                <div class="card-footer p-4">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-6">--}}
{{--                            <button class="btn btn-block btn-facebook" type="button">--}}
{{--                                <span>facebook</span>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                        <div class="col-6">--}}
{{--                            <button class="btn btn-block btn-twitter" type="button">--}}
{{--                                <span>twitter</span>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</div>
<style>
    .error{
        color: red;
    }
    #captcha{
        display: none;
    }
    #captcha .col-6{
        height: 60px;
        width: 100%;
        float: left;

    }
    #captcha .code-captcha{
    }
    #captcha img{
        position: absolute;
        width: 145px;
        opacity: 0.5;
        z-index: 5;
        height: 50px;
    }
    #captcha p{
        position: absolute;
        width: 150px;
        padding: 10px 0;
        text-align: center;
        font-size: 26px;
        font-family: "Adobe Garamond Pro";
        text-decoration: line-through;
        color: #524d4d;
    }
</style>
<!-- Bootstrap and necessary plugins-->
<script src="{{asset('vendors/jquery/js/jquery.min.js')}}"></script>
<script src="{{asset('vendors/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('vendors/perfect-scrollbar/js/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('vendors/@coreui/coreui-pro/js/coreui.min.js')}}"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    var correctCaptcha = function(response) {
        if(response){
            $('#btn').removeAttr("disabled");
        }

    };
    $(document).ready(function(){
        function getCookie(name) {
            var value = "; " + document.cookie;
            var parts = value.split("; " + name + "=");
            if (parts.length == 2) return parts.pop().split(";").shift();
        }
        let cookie  = getCookie('error_capcha');
        if ( parseInt(cookie) < 3  || cookie == null || cookie == 'undefined' ) {

            $('#captcha').css({"display":"none"});
        }else{
            $('#captcha').css({"display":"block"});
        }
    });
</script>
</body>
</html>
