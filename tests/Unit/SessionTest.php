<?php

namespace Tests\Unit;

use App\Models\Session;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SessionTest extends TestCase
{
    use RefreshDatabase;

    public const API_SESSION = '/api/session';
    public const TABLE_SESSION = 'sessions';

    /** @test */
    public function it_lists_all_sessions(): void
    {
        $sessions = Session::factory()->count(5)->create();

        $this->get(self::API_SESSION)
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

        $this->post(self::API_SESSION, [
            'name' => $session->name,
            'date' => $session->date,
        ])->assertSuccessful();

        $this->assertDatabaseHas(self::TABLE_SESSION, $session->toArray());
    }

    /** @test */
    public function it_shows_a_session(): void
    {
        $session = Session::factory()->create();

        $this->get(self::API_SESSION."/{$session->getKey()}")
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

        $this->put(self::API_SESSION."/{$session->getKey()}", [
            'name' => $newName = 'Updated name',
            'date' => $newDate = now()->addDay()->toDateString(),
        ])->assertSuccessful();

        $this->assertDatabaseHas(self::TABLE_SESSION, [
            'name' => $newName,
            'date' => $newDate,
        ]);
    }

    /** @test */
    public function it_destroys_a_session(): void
    {
        $session = Session::factory()->create();

        $this->delete(self::API_SESSION."/{$session->getKey()}")
            ->assertSuccessful();

        $this->assertDatabaseMissing(self::TABLE_SESSION, [
            'id' => $session->getKey(),
        ]);
    }
}
