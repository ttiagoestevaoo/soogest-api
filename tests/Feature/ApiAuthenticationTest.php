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

        
        $this->post("/api/register", $atributtes = [
            'email' => $this->faker->email,
            'password' => $password = $this->faker->password,
            'c_password' => $password,
            'name' => "Tiago"
        ]);

       $response = $this->post("/api/login",[
            'email' => $atributtes['email'],
            'password' => $atributtes['password']
        ]);

        $response=$this->post("/api/details",[
            'token' => $response['access_token']
        ]);
        dd($response);

    }

    /** @test*/ 
    public function test_clients() 
    {
        $this->withoutExceptionHandling();
       $user = factory(User::class)->create();

       
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
