<?php

namespace App\Http\Controllers;

use App\Repositories\CurlConnectionRepository;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $curl_connect;

    public function __construct(CurlConnectionRepository $curl_connect) {
        $this->curl_connect = $curl_connect;
    }
}
