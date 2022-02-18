<?php

namespace Tests\Unit;

use App\Models\Tag;
use Tests\TestCase;

class TagTest extends TestCase
{
    /** @test */
    public function it_lists_all_tags(): void
    {
        $tags = Tag::factory()->count(5)->create();

        $this->get('/api/tag')
            ->assertSuccessful()
            ->assertJsonCount(5)
            ->assertJsonFragment([
                'name' => $tags->pluck('name')->first(),
                'type' => $tags->pluck('type')->first(),
            ]);
    }

    /** @test */
    public function it_creates_a_new_tag(): void
    {
        $tag = Tag::factory()->make();

        $this->post('/api/tag', $tag->toArray())
            ->assertSuccessful();

        $this->assertDatabaseHas('tags', $tag->toArray());
    }

    /** @test */
    public function it_shows_a_tag(): void
    {
        $tag = Tag::factory()->create();

        $this->get("/api/tag/{$tag->getKey()}")
            ->assertSuccessful()
            ->assertJsonFragment($tag->toArray());
    }

    /** @test */
    public function it_updates_a_tag(): void
    {
        $tag = Tag::factory()->create([
            'type' => TAG::TYPE_SET,
        ]);

        $this->put("/api/tag/{$tag->getKey()}", [
            'name' => $newName = 'Updated name',
            'type' => $newType = Tag::TYPE_USER,
        ])->assertSuccessful();

        $this->assertDatabaseHas('tags', [
            'name' => $newName,
            'type' => $newType,
        ]);
    }

    /** @test */
    public function it_destroys_a_tag(): void
    {
        $tag = Tag::factory()->create();

        $this->delete("/api/tag/{$tag->getKey()}")
            ->assertSuccessful();

        $this->assertDatabaseMissing('tags', [
            'id' => $tag->getKey(),
        ]);
    }
}
