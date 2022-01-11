<?php

namespace Tests\Unit;

use App\Models\Set;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SetTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_lists_all_sets()
    {
        $set = Set::factory()->count(5)->create();
        $first = $set->first()->toArray();

        $this->get('/api/set')
            ->assertSuccessful()
            ->assertJsonCount(5)
            ->assertJsonFragment($first);
    }

    /**
     * @test
     */
    public function it_creates_a_new_set()
    {
        $set = Set::factory()->make();

        $this->post('/api/set', $set->toArray())
            ->assertSuccessful();

        $this->assertDatabaseHas('sets', $set->toArray());
    }

    /**
     * @test
     */
    public function it_shows_a_set()
    {
        $set = Set::factory()->create();

        $this->get('/api/set/' . $set->getKey())
            ->assertSuccessful()
            ->assertJsonFragment($set->toArray());
    }

    /**
     * @test
     */
    public function it_updates_a_set()
    {
        $set = Set::factory()->create();

        $this->put("/api/set/{$set->getKey()}", [
            'number' => $newNumber = $set->number + 1,
        ])->assertSuccessful();

        $this->assertDatabaseHas('sets', [
            'number' => $newNumber,
        ]);
    }

    /**
     * @test
     */
    public function it_destroys_a_set()
    {
        $set = Set::factory()->create();

        $this->delete("/api/set/{$set->getKey()}")
            ->assertSuccessful();

        $this->assertDatabaseMissing('sets', [
            'id' => $set->getKey(),
        ]);
    }
}
