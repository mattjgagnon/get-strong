<?php

namespace Tests\Unit;

use App\Models\Exercise;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class ExerciseTest extends TestCase
{
    use RefreshDatabase;

    public const API_EXERCISE = '/api/exercise';
    public const TABLE_EXERCISE = 'exercises';

    /** @test */
    public function it_lists_all_exercises(): void
    {
        $exercises = Exercise::factory()->count(5)->create();

        $this->get(self::API_EXERCISE)
            ->assertSuccessful()
            ->assertJsonCount(5)
            ->assertJsonFragment([
                'name' => $exercises->pluck('name')->first(),
                'instructions' => $exercises->pluck('instructions')->first(),
            ]);
    }

    /** @test */
    public function it_creates_a_new_exercise(): void
    {
        $exercise = Exercise::factory()->make();

        $this->post(self::API_EXERCISE, [
            'name' => $exercise->name,
            'instructions' => $exercise->instructions,
        ])->assertSuccessful();

        $this->assertDatabaseHas(self::TABLE_EXERCISE, $exercise->toArray());
    }

    /** @test */
    public function it_shows_an_exercise(): void
    {
        $exercise = Exercise::factory()->create();

        $this->get(self::API_EXERCISE."/{$exercise->getKey()}")
            ->assertSuccessful()
            ->assertJsonFragment([
            'name' => $exercise->name,
            'instructions' => $exercise->instructions,
        ]);
    }

    /** @test */
    public function it_updates_an_exercise(): void
    {
        $exercise = Exercise::factory()->create();

        $this->put(self::API_EXERCISE."/{$exercise->getKey()}", [
            'name' => $newName = 'Updated name',
            'instructions' => $newInstructions = 'Updated instructions',
        ])->assertSuccessful();

        $this->assertDatabaseHas(self::TABLE_EXERCISE, [
            'name' => $newName,
            'instructions' => $newInstructions,
        ]);
    }

    /** @test */
    public function it_destroys_an_exercise(): void
    {
        $exercise = Exercise::factory()->create();

        $this->delete(self::API_EXERCISE."/{$exercise->getKey()}")
            ->assertSuccessful();

        $this->assertDatabaseMissing(self::TABLE_EXERCISE, [
            'id' => $exercise->getKey(),
        ]);
    }
}
