<?php

namespace Tests\Unit;

use App\Models\Set;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class SetTest extends TestCase
{
    use RefreshDatabase;

    public const API_SET = '/api/set';
    public const TABLE_SET = 'sets';

    /** @test */
    public function it_lists_all_sets(): void
    {
        $set = Set::factory()->count(5)->create();
        $first = $set->first()->toArray();

        $this->get(self::API_SET)
            ->assertSuccessful()
            ->assertJsonCount(5)
            ->assertJsonFragment($first);
    }

    /** @test */
    public function it_creates_a_new_set(): void
    {
        $set = Set::factory()->make();

        $this->post(self::API_SET, $set->toArray())
            ->assertSuccessful();

        $this->assertDatabaseHas(self::TABLE_SET, $set->toArray());
    }

    /** @test */
    public function it_shows_a_set(): void
    {
        $set = Set::factory()->create();

        $this->get(self::API_SET."/{$set->getKey()}")
            ->assertSuccessful()
            ->assertJsonFragment($set->toArray());
    }

    /** @test */
    public function it_updates_a_set(): void
    {
        $set = Set::factory()->create();

        $this->put(self::API_SET."/{$set->getKey()}", [
            'number' => $newNumber = $set->number + 1,
        ])->assertSuccessful();

        $this->assertDatabaseHas(self::TABLE_SET, [
            'number' => $newNumber,
        ]);
    }

    /** @test */
    public function it_destroys_a_set(): void
    {
        $set = Set::factory()->create();

        $this->delete(self::API_SET."/{$set->getKey()}")
            ->assertSuccessful();

        $this->assertDatabaseMissing(self::TABLE_SET, [
            'id' => $set->getKey(),
        ]);
    }
}
