<?php

namespace Tests\Unit;

use App\Models\Session;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SessionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_lists_all_sessions(): void
    {
        $sessions = Session::factory()->count(5)->create();

        $this->get('/api/session')
            ->assertSuccessful()
            ->assertJsonCount(5)
            ->assertJsonFragment([
                'name' => $sessions->pluck('name')->first(),
                'date' => $sessions->pluck('date')->first(),
            ]);
    }

    /** @test */
    public function it_creates_a_new_session(): void
    {
        $session = Session::factory()->make();

        $this->post('/api/session', [
            'name' => $session->name,
            'date' => $session->date,
        ])->assertSuccessful();

        $this->assertDatabaseHas('sessions', $session->toArray());
    }

    /** @test */
    public function it_shows_a_session(): void
    {
        $session = Session::factory()->create();

        $this->get("/api/session/{$session->getKey()}")
            ->assertSuccessful()
            ->assertJsonFragment([
            'name' => $session->name,
            'date' => $session->date,
        ]);
    }

    /** @test */
    public function it_updates_a_session(): void
    {
        $session = Session::factory()->create();

        $this->put("/api/session/{$session->getKey()}", [
            'name' => $newName = 'Updated name',
            'date' => $newDate = now()->addDay()->toDateString(),
        ])->assertSuccessful();

        $this->assertDatabaseHas('sessions', [
            'name' => $newName,
            'date' => $newDate,
        ]);
    }

    /** @test */
    public function it_destroys_a_session(): void
    {
        $session = Session::factory()->create();

        $this->delete("/api/session/{$session->getKey()}")
            ->assertSuccessful();

        $this->assertDatabaseMissing('sessions', [
            'id' => $session->getKey(),
        ]);
    }
}
