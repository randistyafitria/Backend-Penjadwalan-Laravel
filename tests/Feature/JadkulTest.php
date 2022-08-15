<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Jadkul;
use App\Models\User;
use Laravel\Passport\Passport;

class JadkulTest extends TestCase
{
    /**
     * test create jadkul.
     *
     * @return void
     */
    public function test_create_jadkul()
    {
         $user = User::factory()->create();
         Passport::actingAs($user);

         $response = $this->json('POST','api/jadkul',[
             'kode_pengampu' => '4',
             'kode_jam' => '4',
             'kode_hari' => '4',
             'kode_ruang' => '4'
         ]);

         //Write the response in laravel.log
         \Log::info(1, [$response->getContent()]);

         $response->assertStatus(404);
     }

    /**
     * test update jadkul.
     *
     * @return void
     */
    public function test_update_jadkul()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);
        
        $response = $this->json('PUT','api/jadkul/2',[
            'kode_pengampu' => '1',
             'kode_jam' => '1',
             'kode_hari' => '1',
             'kode_ruang' => '2'
        ]);

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(404);
    }

    /**
     * test find jadkul.
     *
     * @return void
     */
    public function test_find_jadkul()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);
        
        $response = $this->json('GET','api/jadkul/1');

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(404);
    }

    /**
     * test get all jadkuls.
     *
     * @return void
     */
    public function test_get_all_jadkul()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);
        
        $response = $this->json('GET','api/jadkul');

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(404);
    }

    /**
     * test delete jadkuls.
     *
     * @return void
     */
    // public function test_delete_jadkul()
    //  {
    //      $user = User::factory()->create();
    //      Passport::actingAs($user);
        
    //      $response = $this->json('DELETE','api/jadkul/2');

    //      //Write the response in laravel.log
    //      \Log::info(1, [$response->getContent()]);

    //      $response->assertStatus(200);
    //  }
}