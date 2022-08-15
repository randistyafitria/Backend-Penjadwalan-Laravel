<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Matkul;
use App\Models\User;
use Laravel\Passport\Passport;

class MatkulTest extends TestCase
{
    /**
     * test create matkul.
     *
     * @return void
     */
    public function test_create_matkul()
    {
         $user = User::factory()->create();
         Passport::actingAs($user);

         $response = $this->json('POST','api/matkul',[
             'kode_mk' => '4',
             'nama' => 'Bais Data',
             'sks' => '2',
             'semester' => '2',
             'aktif' => 'False',
             'jenis' => 'TEORI'
         ]);

         //Write the response in laravel.log
         \Log::info(1, [$response->getContent()]);

         $response->assertStatus(201);
     }

    /**
     * test update matkul.
     *
     * @return void
     */
    public function test_update_matkul()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);
        
        $response = $this->json('PUT','api/matkul/3',[
            'kode_mk' => '3',
             'nama' => 'BaSis DataAA',
             'sks' => '1',
             'semester' => '1',
             'aktif' => 'False',
             'jenis' => 'TEORI'
        ]);

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test find matkul.
     *
     * @return void
     */
    public function test_find_matkul()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);
        
        $response = $this->json('GET','api/matkul/1');

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test get all matkuls.
     *
     * @return void
     */
    public function test_get_all_matkul()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);
        
        $response = $this->json('GET','api/matkul');

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test delete matkuls.
     *
     * @return void
     */
    // public function test_delete_matkul()
    //  {
    //      $user = User::factory()->create();
    //      Passport::actingAs($user);
        
    //      $response = $this->json('DELETE','api/matkul/2');

    //      //Write the response in laravel.log
    //      \Log::info(1, [$response->getContent()]);

    //      $response->assertStatus(200);
    //  }
}