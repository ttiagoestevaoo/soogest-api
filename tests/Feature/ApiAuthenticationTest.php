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

        $response = $this->post("http://soogest-api.herokuapp.com/api/login",[
            'username' => $user->email,
            'password' => 'inter123'
        ]);

        dd($response);
    }

    /** @test*/ 
    public function user_can_register_on_api() 
    {
        $this->withoutExceptionHandling();

        $response = $this->post("http://soogest-api.herokuapp.com/api/register",[
            'Content-Type' => 'multipart/form-data',
            'Accept' => 'application/json',
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => 'inter123'
        ]);
        dd($response->getContent());
    }

    /** @test*/ 
    public function user_can_see_your_informations() 
    {
        
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $response = $this->post("/api/login",[
            'username' => $user->email,
            'password' => 'inter123'
        ]);
        
        $token = json_decode($response->getContent());

        $http = new \GuzzleHttp\Client();
        
        $response = $http->post(config('services.passport.endpoint')."details",[ 'headers' => [
            'Accept' => 'application/json',
            'Authorization' => $token->token_type . " " . $token->access_token
        ]]);
      

        dd(json_decode($response->getBody()));
    }

    /** @test */
    public function user_can_logout()
    {
        $user = factory(User::class)->create();

        $response = $this->post("/api/login",[
            'username' => $user->email,
            'password' => 'inter123'
        ]);
        
        $token = json_decode($response->getContent());
        $http = new \GuzzleHttp\Client();

        $response = $http->post(config('services.passport.endpoint')."logout",[ 'headers' => [
            'Accept' => 'application/json',
            'Authorization' => $token->token_type . " " . $token->access_token
        ]]);

        dd(json_decode($response->getBody()));

        $response = $http->post(config('services.passport.endpoint')."logout",[ 'headers' => [
            'Accept' => 'application/json',
            'Authorization' => $token->token_type . " " . $token->access_token
        ]]);

        

        dd(json_decode($response->getBody()));
    }
}
