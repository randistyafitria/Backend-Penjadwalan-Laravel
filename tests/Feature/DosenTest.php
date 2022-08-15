<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Dosen;
use App\Models\User;
use Laravel\Passport\Passport;

class DosenTest extends TestCase
{
    /**
     * test create dosen.
     *
     * @return void
     */
    public function test_create_dosen()
    {
         $user = User::factory()->create();
         Passport::actingAs($user);

         $response = $this->json('POST','api/dosen',[
             'nidn' => '9',
             'nama' => 'Bambang, S.Pd',
             'alamat' => 'Nganjuk',
             'telp' => '0812'
         ]);

         //Write the response in laravel.log
         \Log::info(1, [$response->getContent()]);

         $response->assertStatus(201);
     }

    /**
     * test update dosen.
     *
     * @return void
     */
    public function test_update_dosen()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);
        
        $response = $this->json('PUT','api/dosen/7',[
            'nidn' => '7',
            'nama' => 'Bagas, S.Pd',
            'alamat' => 'Malang',
            'telp' => '0845'
        ]);

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test find dosen.
     *
     * @return void
     */
    public function test_find_dosen()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);
        
        $response = $this->json('GET','api/dosen/1');

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test get all dosens.
     *
     * @return void
     */
    public function test_get_all_dosen()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);
        
        $response = $this->json('GET','api/dosen');

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test delete dosens.
     *
     * @return void
     */
    public function test_delete_dosen()
     {
         $user = User::factory()->create();
         Passport::actingAs($user);
        
         $response = $this->json('DELETE','api/dosen/2');

         //Write the response in laravel.log
         \Log::info(1, [$response->getContent()]);

         $response->assertStatus(200);
     }
}