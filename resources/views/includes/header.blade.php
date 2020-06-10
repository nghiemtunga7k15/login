
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>

        a{display:block}

        body,a
        {font-family:Tahoma,Geneva,sans-serif;font-style:normal;font-weight:400}

        a
        {margin:0;border:none;cursor:pointer;text-decoration: none;}

        a:focus
        {background:#808080;color:#000}

        a,p,.home
        {font-size:14px}

        a,
        .home{
            background:transparent;
            padding:14px;
            color:#fff;
            vertical-align:middle
        }

        a:hover,.home:hover
        {background:#4d4d4d;color:#fff}

        h1,h2{font-size:30px}

        h1,p
        {margin:0;padding:0}

        [class*="container"]
        {display:block;position:relative;float:left}

        .warper-header [class*="content"]
        {display:none;position:absolute;z-index:10}

        .home,#btnMenu
        {position:relative;float:left}

        #btnMenu,.fa-close,.acc
        {display:none}

        .content_list:before,
        h2:before,
        h2:after
        {content:"";display:block;position:absolute}

        header{
            width:100%;
            padding:16px;
            display:block;
            position:absolute;
            z-index:10;
            box-shadow:0 8px 6px -6px #000
        }

        header h1,header p
        {letter-spacing:5px;text-shadow:-1px 0 #fff, 0 1px #fff, 1px 0 #fff, 0 -1px #fff}

        #sticky_nav{
            background:#1e2f7f;
            width:100%;
            top:-45px;
            display:block;
            position:fixed;
            z-index:999;
            transition:all .5s ease
        }

        .btnList{width:120px; text-align: center; text-decoration: none; color: #fff;text-transform: uppercase;}

        .content_list
        {background:#fff;width:250px;top:45px}

        .content_list.left,
        .content_list.left:before
        {left:0}

        .content_list.center{left:-65px}

        .content_list.center:before
        {left:50%;transform:translate(-50%,0)}

        .content_list.right,
        .content_list.right:before
        {right:0}

        .content_list:before{
            width:8px;
            top:-8px;
            border-left:8px solid transparent;
            border-right:8px solid transparent;
            border-bottom:8px solid #fff
        }

        .container_right{float:right}

        .content_search
        {background:#000;top:0;right:40px}


        @media (max-width:683px){
            #btnMenu{display:block;}
            .container_menu{display:none}
            .container_list{width:100%}

            .btnList
            {width:100%;box-shadow:0 2px 2px -2px #333}

            .drop{display:none}
            .acc{display:inline-block}

            .warper-header .content_list{
                width:100%;
                top:0;
                position:relative;
                float:left
            }

            .warper-header .content_list.left,
            .warper-header .content_list.center,
            .warper-header .content_list.right
            {left:0;right:0}

            .content_list.left:before,
            .content_list.center:before,
            .content_list.right:before
            {left:50%;transform:translate(-50%,0)}

            .show_menu{
                background:#1a1a1a;
                width:100%;
                top:45px;
                display:block;
                position:absolute
            }
        }

        .warper-header .title,.blank{
            width:100%;
            min-height:100%;
            display:block;
            position:relative;
            float:left
        }

        h2{
            width:100%;
            top:50%;
            left:0;
            margin:0;
            padding:0 8px;
            display:block;
            position:absolute;
            color:#fff;
            transform:translate(0,-50%)
        }

        h2:before,h2:after{
            width:50px;
            height:50px;
            left:50%;
            border-right:1px solid #fff;
            border-bottom:1px solid #fff;
            animation:buble 1s linear infinite alternate
        }

        h2:before{bottom:-100px}
        h2:after{bottom:-110px}

        @keyframes buble{
            from{transform:rotate(45deg) translate(-50%,0) scale(.8,.8)}
            to{transform:rotate(45deg) translate(-50%,0) scale(1,1)}
        }

        .warper-header .blank{background:#262626}

        .warper-header .visible{display:inline-block}
        .warper-header.hidden{display:none}
        [class*="show"]{display:block}

        .warper-header .show_list
        {padding:20px 0;animation:height 1s ease}

        @keyframes height{
            from{padding:0;opacity:0}
            to{padding:20px 0;opacity:1}
        }

        .warper-header .show_search form
        {width:150px;padding:6px;animation:width 1s ease}

        @keyframes width{
            from{width:0;opacity:0}
            to{width:150px;opacity:1}
        }
        .fa {
            color: #fff;
            font-size: 24px;
        }
        .dropdown-menu-right a{
            color: #000;
        }
        .nav .open>a, .nav .open>a:focus,.nav>li>a:focus, .nav>li>a:hover {
            text-decoration: none;
            background-color: #4d4d4d;
        }
    </style>

<div class="warper-header">
    <nav id="sticky_nav" style="top: 0">
        <div class="container_left">
            <a class="home" href="http://vnpsoftware.biz/" target="blank_">
                <i class="fa fa-home"></i>
            </a>
            <a id="btnMenu" onclick="openMenu()">
                <i class="fa fa-bars"></i>
                <i class="fa fa-close"></i>
            </a>
        </div>
        <div class="container_menu" id="thisMenu">
            <div class="container_list">
                <a class="btnList" href="http://vnpsoftware.biz/">
                    <span class="drop">Trang Chủ</span>
                </a>
            </div>
            <div class="container_list">
                <a class="btnList" href="http://vnpsoftware.biz/shop" >
                    <span class="drop">Sản Phẩm</span>
                </a>
            </div>
            <div class="container_list">
                <a class="btnList" href="http://vnpsoftware.biz/blog" >
                    <span class="drop">Blog</span>
                </a>
            </div>
            <div class="container_list">
                <a class="btnList" href="http://vnpsoftware.biz/">
                    <span class="drop">Giới Thiệu</span>
                </a>
            </div>
            <div class="container_list">
                <a class="btnList" href="http://vnpsoftware.biz/">
                    <span class="drop">Liên Hệ</span>
                </a>
            </div>
        </div>
        <div class="container_right">
           @if(Cookie::get('get_user'))
                <ul class="nav ml-auto">
                    <li class="nav-item dropdown ">
                        <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class=""  style="color: #fff;">Xin chào,  {{json_decode(Cookie::get('get_user'))->name}} </span><span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-header text-center quick_user ">
                                <a href="{{route('profileUser')}}">Hồ Sơ Của Tôi</a> <br>

                            </div>

                            <a class="dropdown-item pull-right" href="{{route('do-logout')}}" style="color: #0c6fff;">Logout</a>
                        </div>
                    </li>
                </ul>
               @else
                <div class="container_list">
                    <a class="btnList" href="{{asset('login')}}">
                        <span class="drop">ĐĂNG NHẬP</span>
                    </a>
                </div>
            @endif
        </div>
    </nav>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
    // window.onscroll = function(){
    //     document.getElementById("sticky_nav").style.top = "0"
    //     scrollFunction()
    // }
    // function scrollFunction(){
    //     var sn = document.getElementById("sticky_nav");
    //
    //
    //     if(document.documentElement.scrollTop >0 &&document.documentElement.scrollTop <=100){
    //         sn.style.top = "-45px"
    //     }
    //     else{
    //         sn.style.top = "0"
    //     }
    // }




    function openSearch(){
        document.getElementById("thisSearch").classList.toggle("show_search");
        document.getElementById("btnSearch").getElementsByTagName("i")[0].classList.toggle("hidden");
        document.getElementById("btnSearch").getElementsByTagName("i")[1].classList.toggle("visible")
    }

    function openMenu(){
        document.getElementById("thisMenu").classList.toggle("show_menu");
        document.getElementById("btnMenu").getElementsByTagName("i")[0].classList.toggle("hidden");
        document.getElementById("btnMenu").getElementsByTagName("i")[1].classList.toggle("visible")
    }

</script>


