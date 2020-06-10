<?php

namespace App\Http\Controllers\Auth;

use App\Repositories\CurlConnectionRepository;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $curl_connect;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Create a new controller instance.
     *
     * @param CurlConnectionRepository $curl_connect
     */
    public function __construct(CurlConnectionRepository $curl_connect) {
        $this->middleware('guest');
        $this->curl_connect = $curl_connect;
    }

    public function redirectRegister(Request $request) {
        if ($request->cookie('auth_user')) {

            return redirect(route('login'));
        } else {
            $string_radrom= Str::random(6);
            Session:: put('captcha',$string_radrom);
            return view('register');
        }
    }

    public function replace_string($string) {
        if ( strpos($string, '<') !== false  ||  strpos($string, '>')  !== false  || strpos($string, '<script>') !== false || strpos($string, '</scrip>') !== false  ){
            return true;
        }else{
            return false;
        }
    }

    public function register(Request $request) {

        if ($this->replace_string( $request->email)==true||$this->replace_string( $request->password)==true){
            if (!isset($_COOKIE["error_capcha"])){
                setcookie("error_capcha", 1 , time()+3600);
            }else{
                setcookie("error_capcha", intval($_COOKIE["error_capcha"]) + 1 , time()+3600);
            }
            return view('login',
                [
                    'err_s' =>'Vui lòng nhập đầy đủ và đúng định dạng',
                ]);
        }

        try {
            $request->validate([
                'full_name' => 'required',
                'email' => 'required',
                'password' => 'required|confirmed',
                'phone_number' => 'required',
            ]);
            $option = 1;

            $url_login  = 'http://devapi.hacklike.biz/api/users/register/bk';
            $param = [
                'email' => $request->email,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation,
                'name' => $request->full_name,
                'phone' => $request->phone_number,
            ];
            if(isset($_COOKIE['error_capcha'])){
                if ($_COOKIE['error_capcha']>=3 && strip_tags($request->code)!=session()->get('captcha')){
                    return view('register',
                        [
                            'err_s' =>'Mã bảo mật không đúng',
                        ]);
                }
            }
            $curl = $this->curl_connect->curl_set_post($option, $url_login, $param, "POST");
            $res = $this->curl_connect->curl_get($curl);
            if (isset($res->code) && $res->code == 200) {
                setcookie("error_capcha", 1 , time()-3600);
                return redirect(route('login'))->with('success', 'Đăng ký thành công , Vui lòng đăng nhập để tiếp tục')->with('email',$request->email)->with('password',$request->password);

            }else if ( (isset($res->code) && $res->code == 404 &&  $res->err->code == 2) ||  $res->err->code == 500 ) {
                if (!isset($_COOKIE["error_capcha"])){
                    setcookie("error_capcha", 1 , time()+3600);
                }else{
                    setcookie("error_capcha", intval($_COOKIE["error_capcha"]) + 1 , time()+3600);
                }
                return view('register',
                    [
                        'err_email' => (isset($res->err->message->email)) ? $res->err->message->email[0] : '' ,
                        'err_password' => (isset($res->err->message->password)) ? $res->err->message->password[0] : '' ,
                        'err_phone' => (isset($res->err->message->phone)) ? $res->err->message->phone[0] : '' ,
                        'err_phone_exits' => (isset($res->err->code) && $res->err->code == 500 ) ? 'Phone đã tồn tại' : '' ,
                    ]);
            } else {
                if (!isset($_COOKIE["error_capcha"])){
                    setcookie("error_capcha", 1 , time()+3600);
                }else{
                    setcookie("error_capcha", intval($_COOKIE["error_capcha"]) + 1 , time()+3600);
                }
                return back()->with('error', 'Đăng ký thất bại');
            }
        } catch (\Exception $e) {
            if (!isset($_COOKIE["error_capcha"])){
                setcookie("error_capcha", 1 , time()+3600);
            }else{
                setcookie("error_capcha", intval($_COOKIE["error_capcha"]) + 1 , time()+3600);
            }
            return back()->with('error', ' Vui lòng nhập đầy đủ và đúng định dạng');

        }
    }
}
