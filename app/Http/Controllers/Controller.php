<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static $HTTP_SUCCESS = 200;

    public function response( string $messageType,string $message,$data=null, int $code = 200)
    {
        return response()->json(['message'=> ['type'=>'success', 'message' => $message], 'data' => $data], $code);
    }
}
