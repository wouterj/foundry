<?php

namespace Zenstruck\Foundry\Tests\Functional;

use Zenstruck\Foundry\Tests\Fixtures\Factories\TagFactory;
use Zenstruck\Foundry\Tests\Fixtures\Stories\TagStory;
use Zenstruck\Foundry\Tests\FunctionalTestCase;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
final class GlobalStateTest extends FunctionalTestCase
{
    /**
     * @test
     */
    public function tag_story_is_added_as_global_state(): void
    {
        TagFactory::repository()->assertCount(2);
        TagFactory::repository()->assertExists(['name' => 'dev']);
        TagFactory::repository()->assertExists(['name' => 'design']);
    }

    /**
     * @test
     */
    public function ensure_global_story_is_not_loaded_again(): void
    {
        TagStory::load();
        TagStory::load();

        TagFactory::repository()->assertCount(2);
    }
}
