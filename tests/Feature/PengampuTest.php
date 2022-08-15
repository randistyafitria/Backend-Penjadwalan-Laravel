<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Pengampu;
use App\Models\User;
use Laravel\Passport\Passport;

class PengampuTest extends TestCase
{
    /**
     * test create pengampu.
     *
     * @return void
     */
    public function test_create_pengampu()
    {
         $user = User::factory()->create();
         Passport::actingAs($user);

         $response = $this->json('POST','api/pengampu',[
             'kode_mk' => '3',
             'kode_dosen' => '3',
             'kelas' => 'C',
             'tahun_akademik' => '2021-2022'
         ]);

         //Write the response in laravel.log
         \Log::info(1, [$response->getContent()]);

         $response->assertStatus(201);
     }

    /**
     * test update pengampu.
     *
     * @return void
     */
    public function test_update_pengampu()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);
        
        $response = $this->json('PUT','api/pengampu/1',[
            'kode_mk' => '1',
             'kode_dosen' => '1',
             'kelas' => 'A',
             'tahun_akademik' => '2022-2023'
        ]);

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test find pengampu.
     *
     * @return void
     */
    public function test_find_pengampu()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);
        
        $response = $this->json('GET','api/pengampu/1');

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test get all pengampus.
     *
     * @return void
     */
    public function test_get_all_pengampu()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);
        
        $response = $this->json('GET','api/pengampu');

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test delete pengampus.
     *
     * @return void
     */
    // public function test_delete_pengampu()
    //  {
    //      $user = User::factory()->create();
    //      Passport::actingAs($user);
        
    //      $response = $this->json('DELETE','api/pengampu/2');

    //      //Write the response in laravel.log
    //      \Log::info(1, [$response->getContent()]);

    //      $response->assertStatus(200);
    //  }
}