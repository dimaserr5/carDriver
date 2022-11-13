<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class apiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_api_create()
    {
        $response = $this->post('api/v1/user/create');

        $response->assertStatus(400);
    }

    public function test_api_role()
    {
        $response = $this->post('api/v1/user/role');

        $response->assertStatus(401);
    }

    public function test_api_user_cars()
    {
        $response = $this->get('api/v1/user/cars');

        $response->assertStatus(401);
    }

    public function test_api_user_cars_info()
    {
        $response = $this->get('api/v1/user/cars/info');

        $response->assertStatus(401);
    }

    public function test_api_user_cars_rent()
    {
        $response = $this->post('api/v1/user/cars/rent');

        $response->assertStatus(401);
    }

    public function test_api_user_cars_unrent()
    {
        $response = $this->post('api/v1/user/cars/unrent');

        $response->assertStatus(401);
    }

    public function test_api_admin_cars()
    {
        $response = $this->get('api/v1/admin/cars');

        $response->assertStatus(401);
    }

    public function test_api_admin_cars_add()
    {
        $response = $this->post('api/v1/admin/cars/add');

        $response->assertStatus(401);
    }

    public function test_api_admin_cars_delete()
    {
        $response = $this->post('api/v1/admin/cars/delete');

        $response->assertStatus(401);
    }
}
