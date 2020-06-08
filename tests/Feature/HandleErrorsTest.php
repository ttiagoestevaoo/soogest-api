<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HandleErrorsTest extends TestCase
{
    /** @test*/ 
    public function unanthenticated_error_message() 
    {
        $user = factory(User::class)->create();

        $response = $this->get("/api/user");

        dd($response->getContent());
    }

    /** @test*/ 
    public function not_found_message() 
    {
        $user = factory(User::class)->create();

        $response = $this->post("/api/login",[
            'username' => "user@soogest.com.br",
            'password' => 'developer'
        ]);
        
        $token = json_decode($response->getContent());

        $http = new \GuzzleHttp\Client();
        
        $response = $http->get(config('services.passport.endpoint')."projects/10",[ 'headers' => [
            'Accept' => 'application/json',
            'Authorization' => $token->token_type . " " . $token->access_token
        ]]);
      

        dd($response->getBody());
    }

    /** @test*/ 
    public function error_code_message() 
    {
        $user = factory(User::class)->create();

        $response = $this->post("/api/login",[
            'username' => "user@soogest.com.br",
            'password' => 'developer'
        ]);
        
        $token = json_decode($response->getContent());

        $http = new \GuzzleHttp\Client();
        
        $response = $http->post(config('services.passport.endpoint')."projects",[ 'headers' => [
            'Accept' => 'application/json',
            'Authorization' => $token->token_type . " " . $token->access_token
        ]]);
      

        dd($response->getBody());
    }
}
