<?php

namespace Tests\Feature;

use gasner\TagManager\App\Services\TagService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use gasner\TagManager\Tests\TestCase;

class TagServiceTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_string_to_tags()
    {
        TagService::createFromArray(["good","tora","slient"]);

        $this->assertDatabaseHas("tags",
            ["name"=>"good"]
         );
    }
}
