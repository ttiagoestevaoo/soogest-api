<?php

namespace Tests\Feature;

use App\User;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiAuthenticationTest extends TestCase
{
    
    /** @test*/ 
    public function user_can_acess_api() 
    {   
        $response = $this->post(route("api.register",[
            'email' => 'tiago.estevao.o@gmail.com',
            'password' => 123,
            'c_password' => 123,
            'name' => "Tiago"
        ]));
        dd(json_decode($response, true));

       $this->post(route("api.login",[
            'email' => 'tiago.estevao.o@gmail.com',
            'password' => 123
        ]));

        
    }
}
