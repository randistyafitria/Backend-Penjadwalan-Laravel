<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Wkt_tdk_bersedia;
use App\Models\User;
use Laravel\Passport\Passport;

class Wkt_tdk_bersediaTest extends TestCase
{
    /**
     * test create wkt_tdk_bersedia.
     *
     * @return void
     */
    public function test_create_wkt_tdk_bersedia()
    {
         $user = User::factory()->create();
         Passport::actingAs($user);

         $response = $this->json('POST','api/wkt_tdk_bersedia',[
             'kode_dosen' => '4',
             'kode_hari' => '4',
             'kode_jam' => '4'
         ]);

         //Write the response in laravel.log
         \Log::info(1, [$response->getContent()]);

         $response->assertStatus(201);
     }

    /**
     * test update wkt_tdk_bersedia.
     *
     * @return void
     */
    public function test_update_wkt_tdk_bersedia()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);
        
        $response = $this->json('PUT','api/wkt_tdk_bersedia/1',[
            'kode_dosen' => '1',
             'kode_hari' => '1',
             'kode_jam' => '2'
        ]);

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test find wkt_tdk_bersedia.
     *
     * @return void
     */
    public function test_find_wkt_tdk_bersedia()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);
        
        $response = $this->json('GET','api/wkt_tdk_bersedia/1');

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test get all wkt_tdk_bersedias.
     *
     * @return void
     */
    public function test_get_all_wkt_tdk_bersedia()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);
        
        $response = $this->json('GET','api/wkt_tdk_bersedia');

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test delete wkt_tdk_bersedias.
     *
     * @return void
     */
    // public function test_delete_wkt_tdk_bersedia()
    //  {
    //      $user = User::factory()->create();
    //      Passport::actingAs($user);
        
    //      $response = $this->json('DELETE','api/wkt_tdk_bersedia/2');

    //      //Write the response in laravel.log
    //      \Log::info(1, [$response->getContent()]);

    //      $response->assertStatus(200);
    //  }
}