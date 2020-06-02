<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /** 
     *  User details 
     * 
     * @return App\User 
     */ 
    public function show() 
    { 
        $user = auth()->user();
        return response()->json(['message'=> ['type'=>'success', 'message' => 'Registro usuário'], 'data' => $user]);
    } 
}
