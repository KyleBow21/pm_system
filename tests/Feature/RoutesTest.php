<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutesTest extends TestCase
{

    public function test_can_view_login()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
    public function test_can_view_register_route_no_auth()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }
    public function test_cant_view_projects_without_auth()
    {
        $response = $this->get('/projects');
        $response->assertRedirect('/login');
    }
    public function test_cant_view_marking_forms_creation_page_without_auth(){
        $response = $this->get('/marking-forms/create');
        $response->assertStatus(302);
    }

}
