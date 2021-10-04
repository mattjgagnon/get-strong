<?php

namespace Tests\Unit;

use App\Models\Session;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SessionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_lists_all_sessions()
    {
        $sessions = Session::factory()->count(5)->create();

        $response = $this->get('/api/session');

        $response
            ->assertSuccessful()
            ->assertJsonCount(5)
            ->assertJsonFragment([
                'name' => $sessions->pluck('name')->first(),
                'date' => $sessions->pluck('date')->first(),
            ]);
    }

    /**
     * @test
     */
    public function it_creates_a_new_session() {
        $session = Session::factory()->make();

        $response = $this->post('/api/session', [
            'name' => $session->name,
            'date' => $session->date,
        ]);

        $response->assertSuccessful();
        $this->assertDatabaseHas('sessions', $session->toArray());
    }
}
