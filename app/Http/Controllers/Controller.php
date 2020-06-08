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

    public static $HTTP_OK = 200;
    public static $HTTP_CREATED = 201; 
    public static $HTTP_ACCEPTED = 202; 
    
    public static $HTTP_BAD_REQUEST = 400;
    public static $HTTP_UNAUTHORIZED = 401;
    public static $HTTP_METHOD_NOT_ALLOWED = 405;

}
