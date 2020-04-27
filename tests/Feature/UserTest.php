<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{

    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }
    public function test_user_cannot_view_a_login_form_when_authenticated()
    {

        $user = User::find(1);
        $response = $this->actingAs($user)->get('/login');
        $response->assertRedirect('/profile');
    }
    public function test_user_can_view_home_page()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/home');
        $response->assertStatus(200);
    }
    public function test_user_can_view_projects_page(){
        $user = User::find(1);
        $response = $this->actingAs($user)->get('projects');
        $response->assertStatus(200);
    }
    public function test_user_can_view_selected_project_page(){
        $user = User::find(1);
        $response = $this->actingAs($user)->get('projects/12');
        $response->assertStatus(200);
    }
    public function test_user_can_view_profile_page(){
        $user = User::find(1);
        $response = $this->actingAs($user)->get('profile');
        $response->assertStatus(200);
    }
    public function test_user_can_view_other_profiles(){
        $user = User::find(1);
        $response = $this->actingAs($user)->get('users/24');
        $response->assertStatus(200);
    }
}
