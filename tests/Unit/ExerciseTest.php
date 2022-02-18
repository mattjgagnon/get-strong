<?php

namespace Tests\Unit;

use App\Models\Exercise;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExerciseTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_lists_all_exercises(): void
    {
        $exercises = Exercise::factory()->count(5)->create();

        $this->get('/api/exercise')
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

        $this->post('/api/exercise', [
            'name' => $exercise->name,
            'instructions' => $exercise->instructions,
        ])->assertSuccessful();

        $this->assertDatabaseHas('exercises', $exercise->toArray());
    }

    /** @test */
    public function it_shows_an_exercise(): void
    {
        $exercise = Exercise::factory()->create();

        $this->get("/api/exercise/{$exercise->getKey()}")
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

        $this->put("/api/exercise/{$exercise->getKey()}", [
            'name' => $newName = 'Updated name',
            'instructions' => $newInstructions = 'Updated instructions',
        ])->assertSuccessful();

        $this->assertDatabaseHas('exercises', [
            'name' => $newName,
            'instructions' => $newInstructions,
        ]);
    }

    /** @test */
    public function it_destroys_an_exercise(): void
    {
        $exercise = Exercise::factory()->create();

        $this->delete("/api/exercise/{$exercise->getKey()}")
            ->assertSuccessful();

        $this->assertDatabaseMissing('exercises', [
            'id' => $exercise->getKey(),
        ]);
    }
}
