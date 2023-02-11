<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
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
        $user = User::createTestUserSolvedForignKey();

        $area_id = DB::table('areas')->first()->id;

        Event::factory()->count(10)->create(['area_id' => $area_id]);
        $response = $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->get(route('events.index'));

        $response
            ->assertOk();
    }
}
