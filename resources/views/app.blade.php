hello
@if(Session::has('login_success'))
    <p class="alert alert-success">{{session::get('login_success')}}</p>
@endif
<br>
@if(Cookie::get('auth_user'))
   Xin chào, {{json_decode(Cookie::get('auth_user'))->user->name}}
                <a class="dropdown-item pull-right" href="{{route('do-logout')}}" style="color: #0c6fff;">Logout</a>

@else
    <a href="{{ asset('/login') }}" class="">LOGIN</a>
@endif
