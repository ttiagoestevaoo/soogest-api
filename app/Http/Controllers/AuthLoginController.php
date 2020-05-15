<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthLoginController extends Controller
{
    public function login()
    {
        $http = new \GuzzleHttp\Client();
        try{
            $response = $http->post(config('services.passport.login_endpoint'),[
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => config('services.passport.client_id'),
                    'client_secret' => config('services.passport.client_password'),
                    'username' => request('username'),
                    'password' => request('password')
                ]
            ]);
            return $response->getBody();
        }catch(\GuzzleHttp\Exception\BadResponseException $erro){
            if($erro->getCode()==400){
                return response()->json('Invalid request. Please enter a username or a password', $erro->getCode());
            }else if($erro->getCode()==401) {
                return response()->json('Your credentials are incorrect', $erro->getCode());
            }

            return response()->json('Something went wrong on the server', $erro->getCode());

        }
    }
}
