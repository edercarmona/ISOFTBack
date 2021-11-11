<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaxeTest extends TestCase
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
           'taxe_user' => "eder@ccc.com",
           'taxe_rfc' => "CAAE830331230",
           'taxe_company' => "EDER CARMONA AMRIJO",
           'taxe_email' => "eder@cc.com"
         ];
      $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8yMy45Ni4xLjExMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYzNjYwOTM0NSwiZXhwIjoxNjM5MjAxMzQ1LCJuYmYiOjE2MzY2MDkzNDUsImp0aSI6ImE5WEgxMEFuQ2JBNmxnR0giLCJzdWIiOjcsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.me2_71vwqqpNLd8kUmjKPMQKAggMp5OHaQ-xvW-4_o8";
      $response = $this->call('POST', '/api/taxes', $data, [], [], ['HTTP_Authorization' => 'Bearer '.$token]);
      $response
          ->assertStatus(200)
          ->assertJson(['success' => true]);
    $this->assertDatabaseHas('taxes', $data);

    $response = $this->call('POST', '/api/update_taxes', $data, [], [], ['HTTP_Authorization' => 'Bearer '.$token]);
    $response
        ->assertStatus(200)
        ->assertJson(['success' => true]);
  $this->assertDatabaseHas('taxes', $data);*/
    }
}
