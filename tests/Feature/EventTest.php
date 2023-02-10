<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventTest extends TestCase
{
    use RefreshDatabase;

    /**
     * set up test data
     * 
     * @return void
     */
    // public function setUp()
    // {
    //     parent::setUp();
    //
    //     $this->seed('EventTableSeeder');
    // }

    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function testEventIndex()
    {
        // $this->seed('EventTableSeeder');
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->get(route('events.index'));

        $response->assertOk();
    }
}
