<?php

namespace Tests\Unit;

use App\OauthAccessToken;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class UserTest extends TestCase
{
    /** @test*/ 
    public function user_has_auth_tokens() 
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $this->assertInstanceOf(Collection::class, $user->oauthaccesstoken);
    }
}
