<?php

namespace Tests\Unit;

use App\Models\Tag;
use Tests\TestCase;

final class TagTest extends TestCase
{
    public const API_TAG = '/api/tag';
    public const TABLE_TAG = 'tags';

    /** @test */
    public function it_lists_all_tags(): void
    {
        $tags = Tag::factory()->count(5)->create();

        $this->get(self::API_TAG)
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

        $this->post(self::API_TAG, $tag->toArray())
            ->assertSuccessful();

        $this->assertDatabaseHas(self::TABLE_TAG, $tag->toArray());
    }

    /** @test */
    public function it_shows_a_tag(): void
    {
        $tag = Tag::factory()->create();

        $this->get(self::API_TAG."/{$tag->getKey()}")
            ->assertSuccessful()
            ->assertJsonFragment($tag->toArray());
    }

    /** @test */
    public function it_updates_a_tag(): void
    {
        $tag = Tag::factory()->create([
            'type' => TAG::TYPE_SET,
        ]);

        $this->put(self::API_TAG."/{$tag->getKey()}", [
            'name' => $newName = 'Updated name',
            'type' => $newType = Tag::TYPE_USER,
        ])->assertSuccessful();

        $this->assertDatabaseHas(self::TABLE_TAG, [
            'name' => $newName,
            'type' => $newType,
        ]);
    }

    /** @test */
    public function it_destroys_a_tag(): void
    {
        $tag = Tag::factory()->create();

        $this->delete(self::API_TAG."/{$tag->getKey()}")
            ->assertSuccessful();

        $this->assertDatabaseMissing(self::TABLE_TAG, [
            'id' => $tag->getKey(),
        ]);
    }
}
