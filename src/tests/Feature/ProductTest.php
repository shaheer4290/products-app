<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_basic_request()
    {
        $response = $this->get('/api/products');
 
        $response->assertStatus(200);
    }

    /**
     * A test to check json reponse's structure
     *
     * @return void
     */
    public function test_response_structure()
    {
        $response = $this->getJson('/api/products');
 
        $response->assertStatus(200)
                 ->assertJson(fn ($json) =>
                    $json->hasAll(['data', 'links', 'meta'])
                )->assertJsonStructure([
                    'data' => [
                        '*' => [
                             'name',
                             'sku',
                             'category',
                             'price',

                        ]
                    ]
                ]);
    }

    /**
     * A test to check json reponse's in case of a category not existing
     *
     * @return void
     */
    public function test_response_for_non_existant_category()
    {
        $response = $this->getJson('/api/products?category=non-existant-asdf',);
 
        $response->assertStatus(200)
                 ->assertJsonCount(0, 'data');
    }

}
