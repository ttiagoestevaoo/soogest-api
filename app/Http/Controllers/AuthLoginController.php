<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
                    'password' => request('password'),
                    'score' => ''
                ]
            ]);
            return $response->getBody();
        }catch(\GuzzleHttp\Exception\BadResponseException $erro){
            if($erro->getCode()== Controller::$HTTP_BAD_REQUEST){
                return response()->json('Insira um email e senha válida', $erro->getCode());
            }else if($erro->getCode()==Controller::$HTTP_UNAUTHORIZED) {
                return response()->json('Seus dados estão errados', $erro->getCode());
            }

            return response()->json('Alguma coisa deu errado no servidor', $erro->getCode());

        }
    }

    public function register(Request $request)
    {
        $request -> validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8']
        ]);

        return response()->json(User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]));
    }

    public function logout()
    {
        $user = Auth::user()->token();
        $user->revoke();
        return response()->json('Logout realizado!');
    }

    
}
