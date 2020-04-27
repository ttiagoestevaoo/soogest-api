<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    use WithFaker;
    
    protected function singIn($user = null)
    {
        $user = $user ?: factory(User::class)->create();
        
        $this->actingAs($user);
        
        return $user;
    }

}
