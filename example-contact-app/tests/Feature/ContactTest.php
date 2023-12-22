<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_トップページにGETでアクセス出来る(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_トップページからPOST出来る(): void
    {
        $data = [
            'input-name' => 'たろう'
        ];
        $response = $this->post('/', $data);

        $response->assertStatus(200);
    }
}
