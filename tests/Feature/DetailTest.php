<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DetailTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
      $data = [
           'detail_sale' => 1,
           'detail_group' => 'MU',
           'detail_product' => 4,
           'detail_quantity' => 1,
         ];
         $response = $this->post('/api/detail',$data);
         $response
             ->assertStatus(200)
             ->assertJson(['success' => true]);
       $this->assertDatabaseHas('details', $data);
    }
}
