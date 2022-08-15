<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AuthTest extends TestCase
{

    public function testRegister()
    {
        $data = [
            'name'      => 'test',
            'email'     => time().'test@example.com',
            'password'  => '123456789',
            'password_confirmation' => '123456789'
        ];

        //send post request
        $response = $this->json('POST', 'api/register', $data);

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        //assert it was succesfull
        $response->assertStatus(200);

    }

    public function testLogin()
    {
        // Creating Users
        User::create([
            'name' => 'Test',
            'email'=> $email = time().'@example.com',
            'password' => $password = bcrypt('123456789')
        ]);

        // Simulated landing
        $response = $this->json('POST', 'api/login',[
            'email' => $email,
            'password' => $password,
        ]);

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        // Determine whether the login is successful and receive token 
        $response->assertStatus(200);

        //$this->assertArrayHasKey('token',$response->json());

        // Delete users
        User::where('email','test@gmail.com')->delete();
    }
}