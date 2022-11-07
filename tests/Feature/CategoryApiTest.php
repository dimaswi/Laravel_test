<?php

namespace Tests\Feature;

use App\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryApiTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function get_data_test()
    {
        $data_category = Category::all();

        $response = $this->get('/api/get_data')->assertStatus(200);
    }

    /** @test */
    public function create_data_test()
    {
        $testData = [
            'name' => 'Test Data',
            'is_publish' => 1,
        ];
    
        $response = $this->post('/api/tambah_data', $testData);
    
        $response->assertStatus(200);
    }
    /** @test */
    public function edit_data_test()
    {
        $id = 2;
        $value = [
            '_token' => csrf_token(),
            'name' => $this->faker->name,
            'is_publish' => $this->faker->boolean(),
        ];

        $response = $this->post(url('api/edit_data/'.$id), $value)->assertStatus(200);
    }

    /** @test */
    public function delete_data_test()
    {
        $id = 1;

        $response = $this->post('/api/delete_data/'.$id)->assertStatus(200);
    }
}
