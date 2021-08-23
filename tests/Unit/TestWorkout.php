<?php

namespace Tests\Unit;

use Tests\TestCase;

class TestWorkout extends TestCase
{
    /**
     * @test
     */
    public function can_create_workout()
    {
        $this->postJson('/api/workout', [
            'name' => $name = 'New Workout',
        ])->assertOk();
        $this->assertDatabaseHas('workouts', ['name' => $name]);
    }
}
