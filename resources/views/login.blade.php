
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
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
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
        <div class="col-md-5">
            <div class="card-group">
                <div class="card p-4">
                    <div class="card-body">
                        <h1 class="text-center" style="margin-bottom: 8px;color: #2069b5;"><a href="{{asset(env('URL_SPM'))}}">VNP SOFTWARE</a></h1>
                        <h3 class="text-center" style="margin-bottom: 45px;font-weight: 800;font-size: 18px;
                               color: #c51111"></h3>
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
                            @if(!empty($username))
                                <span class="error">{{$username}}</span>
                            @endif
                            <div class="input-group mb-20">
                                <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </span>
                                </div>
                                <input class="form-control" type="text" placeholder="Email" name="email">
                            </div>
                            @if(!empty($password))
                                <span class="error">{{$password}}</span>
                            @endif
                            <div class="input-group mb-20">
                                <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock"></i>
                                </span>
                                </div>
                                <input class="form-control" type="password" placeholder="Password" name="password">
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
                            <div style="clear: both;"></div>
                            <div class="row" >
                                <div class="col-12 text-center">
                                    <button  class="btn btn-primary px-4" style="cursor: pointer" type="submit">Đăng nhập</button>
                                    <a href="" class="text-center">Quên mật khẩu?</a>
                                    <hr>
                                </div>

                                <div class="col mt-30" style="margin-top: 20px">
                                    <a href="{{asset('/loginfacebook')}}" class="fb btn">
                                        <i class="fa fa-facebook fa-fw"></i> Login with Facebook
                                    </a>
                                    <a href="{{asset('/logingoogle')}}" class="google btn"><i class="fa fa-google fa-fw">
                                        </i> Login with Google
                                    </a>
                                </div>
                            </div>
                        </form>
                        <div class="row" style="margin-top: 30px">
                            @if(isset($_GET['urlRedirect']))
                                <a href="{{asset('/register?urlRedirect='.$_GET['urlRedirect'])}}" class="col-12 text-right" style="text-decoration: none">Đăng ký</a>
                                @else
                                <a href="{{route('register')}}" class="col-12 text-right" style="text-decoration: none">Đăng ký</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .error{
        color: red;
    }
    input,
    .btn {
        width: 100%;
        padding: 7px;
        border: none;
        border-radius: 4px;
        margin: 5px 0;
        opacity: 0.85;
        display: inline-block;
        font-size: 17px;
        line-height: 20px;
        text-decoration: none; /* remove underline from anchors */
    }

    input:hover,
    .btn:hover {
        opacity: 1;
    }

    /* add appropriate colors to fb, twitter and google buttons */
    .fb {
        background-color: #3B5998;
        color: white;
    }

    .twitter {
        background-color: #55ACEE;
        color: white;
    }

    .google {
        background-color: #dd4b39;
        color: white;
    }

    /* style the submit button */
    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    }
    #captcha{
        display: none;
    }
    #captcha .col-6{
        height: 60px;
        width: 100%;
        float: left;

    }
    @media (max-width: 768px){
        #captcha .col-6{
            float: none;
        }
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
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '{your-app-id}',
            cookie     : true,
            xfbml      : true,
            version    : '{api-version}'
        });

        FB.AppEvents.logPageView();

    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
</body>
</html>
