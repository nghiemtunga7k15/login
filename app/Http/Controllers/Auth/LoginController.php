<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Repositories\CurlConnectionRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Rules\Captcha;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


    use AuthenticatesUsers;
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $curl_connect;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @param CurlConnectionRepository $curl_connect
     */
    public function __construct(CurlConnectionRepository $curl_connect) {
        $this->middleware('guest')->except('logout');
        $this->curl_connect = $curl_connect;
    }

    public function redirectLogin(Request $request) {
        if (!isset($_COOKIE['auth_user'])){
            $string_radrom= Str::random(6);
            Session:: put('captcha',$string_radrom);
            return view('login');
        } else {
            $token=$_COOKIE['auth_user'];
            if(isset($_GET['urlRedirect'])){
                return redirect($_GET['urlRedirect']);
            }
            else{
                return redirect(route('account'));
            }
        }
    }
    public function replace_string($string) {
        if ( strpos($string, '<') !== false  ||  strpos($string, '>')  !== false  || strpos($string, '<script>') !== false || strpos($string, '</scrip>') !== false  ){
            return true;
        }else{
            return false;
        }
    }

    public function login(Request $request) {

        try {
            if ($this->replace_string( $request->email)==true||$this->replace_string( $request->password)==true) {
                if (!isset($_COOKIE['error_capcha'])&& !isset($request->code)) {
                    setcookie("error_capcha", 1, time() + 3600);
                } else {
                    setcookie("error_capcha", intval($_COOKIE["error_capcha"]) + 1, time() + 3600);
                }
                return view('login',
                    [
                        'err_s' =>'Vui lòng nhập đầy đủ và đúng định dạng',
                    ]);
            }
            $option = 1;
            $url_login  = 'http://devapi.hacklike.biz/api/users/login/bk';
            $param = [
                'username' => strip_tags($request->email),
                'password' => strip_tags($request->password),

            ];
            if(isset($_COOKIE['error_capcha'])){
                if ($_COOKIE['error_capcha']>=3 && strip_tags($request->code)!=session()->get('captcha')){
                    return view('login',
                        [
                            'err_s' =>'Mã bảo mật không đúng',
                        ]);
                }
            }

            $curl = $this->curl_connect->curl_set_post($option, $url_login, $param, "POST");
            $res = $this->curl_connect->curl_get($curl);
            if (isset($res->code) && $res->code == 200) {
                $data=[
                    'token'=> $res->data->token,
                    'user'=> $res->data->user,
                ];
                setcookie("error_capcha", 1 , time()-3600);
                $token=$res->data->token;
                setcookie("auth_user", $token, time()+3600);
                if(isset($_GET['urlRedirect'])){
                    return redirect($_GET['urlRedirect']);
                }
                else{
                    return redirect('http://vnpsoftware.biz/checkLoginSPM');
                }

            } else if ( $res->code == 404  && $res->err->code == 2){
                if (!isset($_COOKIE["error_capcha"])){
                    setcookie("error_capcha", 1 , time()+3600);
                }else{
                    setcookie("error_capcha", intval($_COOKIE["error_capcha"]) + 1 , time()+3600);
                }
                return view('login',
                    [
                        'username' => (isset($res->err->message->username)) ? $res->err->message->username[0] : '' ,
                        'password' => (isset($res->err->message->password)) ? $res->err->message->password[0] : '' ,
                    ]);
            } else if ( $res->code == 404  && $res->err->code == 4  ) {
                if (!isset($_COOKIE["error_capcha"])){
                    setcookie("error_capcha", 1 , time()+3600);
                }else{
                    setcookie("error_capcha", intval($_COOKIE["error_capcha"]) + 1 , time()+3600);
                }
                return redirect()->back()->with('error',(isset($res->err->message)) ? $res->err->message[0] : '');
            }else {
                return back()->with('error', 'Đăng nhập thất bại');
            }
        } catch (\Exception $e) {
            if (!isset($_COOKIE["error_capcha"])){
                setcookie("error_capcha", 1 , time()+3600);
            }else{
                setcookie("error_capcha", intval($_COOKIE["error_capcha"]) + 1 , time()+3600);
            }
            return redirect()->back()->with('error', ' Đăng nhập thất bại');
        }
    }

    public function logout(Request $request) {

        setcookie("auth_user", 1 , time()-3600);
        return redirect(route('home'))->withCookie(Cookie::forget('get_user'));
    }
    public function profileUserFacebook() {
        $url_get_token  = 'http://vnid.net/login/facebook?return_url=aHR0cDovL3ZucHNvZnR3YXJlLmJpei8=';
        return redirect($url_get_token);
    }
    public function profileUserGoogle() {
        $url_get_token  = 'http://vnid.net/login/google?return_url=aHR0cDovL3ZucHNvZnR3YXJlLmJpei8=';
        return redirect($url_get_token);
    }
}




