<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Hari;
use App\Models\User;
use Laravel\Passport\Passport;

class HariTest extends TestCase
{
    /**
     * test create hari.
     *
     * @return void
     */
    public function test_create_hari()
    {
         $user = User::factory()->create();
         Passport::actingAs($user);

         $response = $this->json('POST','api/hari',[
             'nama' => 'Kamis'
         ]);

         //Write the response in laravel.log
         \Log::info(1, [$response->getContent()]);

         $response->assertStatus(201);
     }

    /**
     * test update hari.
     *
     * @return void
     */
    // public function test_update_hari()
    // {
    //     $user = User::factory()->create();
    //     Passport::actingAs($user);
        
    //     $response = $this->json('PUT','api/hari/1',[
    //         'nama' => 'Seninnn'
    //     ]);

    //     //Write the response in laravel.log
    //     \Log::info(1, [$response->getContent()]);

    //     $response->assertStatus(200);
    // }

    /**
     * test find hari.
     *
     * @return void
     */
    // public function test_find_hari()
    // {
    //     $user = User::factory()->create();
    //     Passport::actingAs($user);
        
    //     $response = $this->json('GET','api/hari/1');

    //     //Write the response in laravel.log
    //     \Log::info(1, [$response->getContent()]);

    //     $response->assertStatus(200);
    // }

    /**
     * test get all haris.
     *
     * @return void
     */
    // public function test_get_all_hari()
    // {
    //     $user = User::factory()->create();
    //     Passport::actingAs($user);
        
    //     $response = $this->json('GET','api/hari');

    //     //Write the response in laravel.log
    //     \Log::info(1, [$response->getContent()]);

    //     $response->assertStatus(200);
    // }

    /**
     * test delete haris.
     *
     * @return void
     */
    // public function test_delete_hari()
    //  {
    //      $user = User::factory()->create();
    //      Passport::actingAs($user);
        
    //      $response = $this->json('DELETE','api/hari/2');

    //      //Write the response in laravel.log
    //      \Log::info(1, [$response->getContent()]);

    //      $response->assertStatus(200);
    //  }
}