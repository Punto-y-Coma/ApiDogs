<?php

namespace Tests\Feature;

use App\Models\Dog;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DogApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_route_get_all_dogs()
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

    public function test_route_show_one_dog()
    {
        //Given

        $dogs = Dog::factory(10)->create();
        //When
        
        $response = $this->json('GET','/api/dogs/5');

        // $response = $this->getJson('/api/dogs', ['id' => '5']);
        
        //Then

        $response->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment(['id' => 5,'name' => $dogs[4]->name]);
    }

     public function test_route_create_a_dog()
    {
        $this->markTestSkipped("pausa");

        $data = [
            'name' => 'Salchicha',
            'image' => 'http://www.example',
        ];

        $response = $this->json('POST','/api/dogs',$data);

        $response->assertStatus(201);
            
    }

   /* public function test_route_delete_a_dog()
    {
        //Given

        $dogs = Dog::factory(10)->create();
        //dd($dogs);
        //When

        $response = $this->deleteJson('/api/dogs/5');
        //$response = $this->json('DELETE','/api/dogs/5');

        //Then
        $response->assertStatus(200);
    }

    public function test_route_update_a_dog()
    {
        $dogs = Dog::factory(10)->create();

        $data = [
            'name' => 'Lasi',
            'image' => 'http://www.example',
        ];

        $response = $this->putJson('/api/dogs/5',$data);

        $response->assertStatus(200)
            ->assertSuccessful();
            //->assertJsonFragment();

            
    } */
}
