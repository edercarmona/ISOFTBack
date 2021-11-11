<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class updateUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
      /*
      $data = [
        'user_name' => "Juan Perez lopez",
        'user_email' => "perez4580@kared.com",
        'user_password' => "123456",
        'user_phone' => "5522556778",
        'user_dire' => "bravo 89 colonia centro banderilla",
         ];
      $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8yMy45Ni4xLjExMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYzNjYwOTM0NSwiZXhwIjoxNjM5MjAxMzQ1LCJuYmYiOjE2MzY2MDkzNDUsImp0aSI6ImE5WEgxMEFuQ2JBNmxnR0giLCJzdWIiOjcsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.me2_71vwqqpNLd8kUmjKPMQKAggMp5OHaQ-xvW-4_o8";
      $response = $this->call('POST', '/api/update_user', $data, [], [], ['HTTP_Authorization' => 'Bearer '.$token]);
      $response
          ->assertStatus(200)
          ->assertJson(['success' => true]);
          $data2 = [
            'user_name' => "Juan Perez lopez",
            'user_email' => "perez4580@kared.com",
            'user_phone' => "5522556778",
            'user_dire' => "bravo 89 colonia centro banderilla",
             ];
    $this->assertDatabaseHas('users', $data2);*/
    }
}
