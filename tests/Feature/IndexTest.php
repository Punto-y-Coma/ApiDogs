<?php

namespace Tests\Feature;

use App\Models\Dog;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_route_index_dog()
    {
        //Given

        $dogs = Dog::factory(10)->create();
        //dd($dogs);
        //When
        
        $response = $this->json('GET','/api/dogs');
        
        //Then

        $response->assertStatus(200)
            ->assertJsonCount(10)
            ->assertExactJson($dogs->toArray());
        

    }
}
