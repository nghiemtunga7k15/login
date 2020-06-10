<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class AccountController extends Controller
{
    public function pay(Request $request)
    {
        // try {s
        $option = 1;
        // $url_login = config('system.protocol') . config('system.url') . config('system.prefix_login') .
        //     config('system.uri.account.login');
        $url_login = 'http://devapi.hacklike.biz/api/payment-bk';
        $timestamp = time();
        $param = [
            'mrc_order_id' => $request->mrc_order_id . $timestamp,
            'total_amount' => $request->total_amount,
            'description' => $request->description,
            'url_success' => 'https://stackoverflow.com/questions/5141910/javascript-location-href-to-open-in-new-window-tab',
        ];

        $curl = $this->curl_connect->curl_set_post($option, $url_login, $param, "POST");
        $res = $this->curl_connect->curl_get($curl);
//        dd($res);
        if ((isset($res->data) && $res->data->code == 2)) {
            return view('account.info',
                [
                    'mrc_order_id_err' => (isset($res->data->message->mrc_order_id)) ? $res->data->message->mrc_order_id[0] : '',
                    'total_amount_err' => (isset($res->data->message->total_amount)) ? $res->data->message->total_amount[0] : '',
                    'description_err' => (isset($res->data->message->description)) ? $res->data->message->description[0] : '',
                ]);
        } else if ($res->data->code == 7) {
            return view('account.info',
                [
                    'order_err' => (isset($res->data->message)) ? $res->data->message[0] : '',
                ]);
        } else {
            return redirect()->away($res->data->data->payment_url);
        }
    }

    public function payUser(Request $request)
    {

        return view('account.payment');
    }

    public function accountprofileUser()
    {
        return view('account.profile');
    }
    public function profileUser()
    {
        if (isset($_COOKIE['auth_user'])){
            $token = ($_COOKIE['auth_user']);
            $url_get_token  = 'http://devapi.hacklike.biz/api/users/validate-token?token='.$token;
            $curl_get_token = $this->curl_connect->curl_set_post(1, $url_get_token, [], "POST");
            $res = $this->curl_connect->curl_get($curl_get_token);
            if (isset($res->code) && $res->code == 200) {
                $user=$res->data->user;
                return redirect(route('account'))->withCookie(cookie()->forever('get_user', json_encode($user)))
                    ->with('login_success', 'Login success');
            }
            Cookie::queue('names', 'lỗi không vào được',10);
            return response()->json(['code' => 200, 'data' => 'OK' , 'token' => $token]);
        }else{
            return redirect('login');
        }
        return view('account.profile');
    }

    public function profileUserHome()
    {
        $token = json_decode(Cookie::get('auth_user'));
        $url_get_token  = 'http://vnpsoftware.biz/checkLoginSPM?token='.$token;
        return redirect($url_get_token);
    }
}
