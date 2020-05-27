<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    /** @test*/ 
    public function store_project()
    {
        $this->withoutExceptionHandling();
        $response = $this->post(route("projects",[
            'name' => "Teste",
            'description' => 'este é um teste',
            'deadline' => '23/09/2020'
        ]));
        dd($response->getContent());

    }

    /** @test*/ 
    public function edit_project()
    {
        $this->withoutExceptionHandling();
        $response = $this->putJson("/api/projects/1",[
            'name' => "Teste",
            'description' => 'este é um teste',
            'deadline' => '23/09/2020'
        ]);
        dd($response->getContent());

    }

    /** @test*/ 
    public function delete_project()
    {
        $this->withoutExceptionHandling();
        $response = $this->delete(route("/api/projects/1"));
        dd($response->getContent());
    }
}
