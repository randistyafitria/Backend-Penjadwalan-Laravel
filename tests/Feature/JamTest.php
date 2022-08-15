<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Jam;
use App\Models\User;
use Laravel\Passport\Passport;

class JamTest extends TestCase
{
    /**
     * test create jam.
     *
     * @return void
     */
    public function test_create_jam()
    {
         $user = User::factory()->create();
         Passport::actingAs($user);

         $response = $this->json('POST','api/jam',[
             'range_jam' => '12.00 - 13.00',
             'aktif' => 'N'
         ]);

         //Write the response in laravel.log
         \Log::info(1, [$response->getContent()]);

         $response->assertStatus(201);
     }

    /**
     * test update jam.
     *
     * @return void
     */
    public function test_update_jam()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);
        
        $response = $this->json('PUT','api/jam/3',[
            'range_jam' => '12.00 - 13.00',
             'aktif' => 'N'
        ]);

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test find jam.
     *
     * @return void
     */
    public function test_find_jam()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);
        
        $response = $this->json('GET','api/jam/1');

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test get all jams.
     *
     * @return void
     */
    public function test_get_all_jam()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);
        
        $response = $this->json('GET','api/jam');

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test delete jams.
     *
     * @return void
     */
    // public function test_delete_jam()
    //  {
    //      $user = User::factory()->create();
    //      Passport::actingAs($user);
        
    //      $response = $this->json('DELETE','api/jam/2');

    //      //Write the response in laravel.log
    //      \Log::info(1, [$response->getContent()]);

    //      $response->assertStatus(200);
    //  }
}