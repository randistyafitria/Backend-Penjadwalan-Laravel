<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Ruang;
use App\Models\User;
use Laravel\Passport\Passport;

class RuangTest extends TestCase
{
    /**
     * test create ruang.
     *
     * @return void
     */
    public function test_create_ruang()
    {
         $user = User::factory()->create();
         Passport::actingAs($user);

         $response = $this->json('POST','api/ruang',[
             'nama' => 'Ruang 4',
             'kapasitas' => '12',
             'jenis' => 'TEORI'
         ]);

         //Write the response in laravel.log
         \Log::info(1, [$response->getContent()]);

         $response->assertStatus(201);
     }

    /**
     * test update ruang.
     *
     * @return void
     */
    public function test_update_ruang()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);
        
        $response = $this->json('PUT','api/ruang/1',[
             'nama' => 'Ruang 1',
             'kapasitas' => '30',
             'jenis' => 'TEORI'
        ]);

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test find ruang.
     *
     * @return void
     */
    public function test_find_ruang()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);
        
        $response = $this->json('GET','api/ruang/1');

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test get all ruangs.
     *
     * @return void
     */
    public function test_get_all_ruang()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);
        
        $response = $this->json('GET','api/ruang');

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test delete ruangs.
     *
     * @return void
     */
    // public function test_delete_ruang()
    //  {
    //      $user = User::factory()->create();
    //      Passport::actingAs($user);
        
    //      $response = $this->json('DELETE','api/ruang/2');

    //      //Write the response in laravel.log
    //      \Log::info(1, [$response->getContent()]);

    //      $response->assertStatus(200);
    //  }
}