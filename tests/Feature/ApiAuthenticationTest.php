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
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $response = $this->post("/api/login",[
            'username' => $user->email,
            'password' => 'inter123'
        ]);

        dd($response->getContent());
    }

    /** @test*/ 
    public function user_can_register_on_api() 
    {
        $this->withoutExceptionHandling();

        $response = $this->post("/api/register",[
            'Content-Type' => 'multipart/form-data',
            'Accept' => 'application/json',
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => 'inter123'
        ]);
        dd($response);
    }

    /** @test*/ 
    public function test_clients() 
    {
        $this->withoutExceptionHandling();
       $user = factory(User::class)->create();

       $http = new \GuzzleHttp\Client([
        'base_uri' => 'http://192.168.15.2:8001',
        'headers' => [
            'Accept' => 'application/json; charset=utf-8'
        ]
       ]);

       $response = $this->post("/oauth/token" ,[
            'grant_type' => 'password',
            'client_id' => 3,
            'client_secret' => '2WsjgSPKBaXSsMSPzKaTfz4dqGoK4yyv1V2r4KQG',
            'username' => $user->email,
            'password' => 'inter123',
            'scope' => '',
            ]);

        $token = json_decode($response->getContent());
        

        $details = $this->get("/api/details",[
            'Accept' => 'application/json',
            'Authorization' => $token->token_type . " " . $token->access_token
        ]);

        dd($details);
    }
}
