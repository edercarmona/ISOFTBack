<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TicketTest extends TestCase
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
           'user_email' => "eder@cc.com",
           'ticket_id' => "0404MG0041252503 Nov 2021 / 01:28:58",
         ];
      $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8yMy45Ni4xLjExMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYzNjYwOTM0NSwiZXhwIjoxNjM5MjAxMzQ1LCJuYmYiOjE2MzY2MDkzNDUsImp0aSI6ImE5WEgxMEFuQ2JBNmxnR0giLCJzdWIiOjcsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.me2_71vwqqpNLd8kUmjKPMQKAggMp5OHaQ-xvW-4_o8";
      $response = $this->call('POst', '/api/ticket', $data, [], [], ['HTTP_Authorization' => 'Bearer '.$token]);
      $response
          ->assertStatus(200)
          ->assertSuccessful()
          ->assertValid( "success", "true" ); */
    }
}
