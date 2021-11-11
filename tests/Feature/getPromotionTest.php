<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class getPromotionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
          /*$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8yMy45Ni4xLjExMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYzNjYwOTM0NSwiZXhwIjoxNjM5MjAxMzQ1LCJuYmYiOjE2MzY2MDkzNDUsImp0aSI6ImE5WEgxMEFuQ2JBNmxnR0giLCJzdWIiOjcsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.me2_71vwqqpNLd8kUmjKPMQKAggMp5OHaQ-xvW-4_o8";
           $response = $this->get('/api/get_promotion', [
       'HTTP_Authorization' => 'Bearer ' . $token
          ]);
          $response
              ->assertStatus(200)
              ->assertSuccessful()
              ->assertValid( "success", "true" );*/
    }
}
