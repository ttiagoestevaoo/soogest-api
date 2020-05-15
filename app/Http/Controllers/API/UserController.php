<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use Validator;

class UserController extends Controller
{
    public $successStatus =  200;
/** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(Request $request){ 
        $loginData = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(!Auth::attempt($loginData)){
            return response(['message'=>'invalid credentials']);
        }

        $access_token = auth()->user()->createToken('authToken')->accessToken;
        
        return response(['user' => auth()->user(), 'access_token' => $access_token]);
    }
/** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function register(Request $request) 
    { 
        $validateData = $request -> validate([
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required', 
            'c_password' => 'required|same:password', 
        ]);

        $validateData['password'] = bcrypt($request->password);

        $user = User::create($validateData); 
        
        $access_toker =  $user->createToken('MyApp')-> accessToken; 

        return response(['user' => $user, 'access_token'=> $access_toker]); 
    }
/** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function details() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this-> successStatus); 
    } 
}
