<?php

    namespace Tests\Feature;

    use gasner\TagManager\Tests\Mock\User;
    use gasner\TagManager\Tests\TestCase;
    use Illuminate\Foundation\Testing\RefreshDatabase;

    class TagTest extends TestCase
    {

        use RefreshDatabase;
        /**
         * A basic test example.
         *
         * @return void
         */
        public function test_has_tag_for_users()
        {
            $user = factory(User::class)->create();
            $this->assertTrue($user->tags instanceof \Illuminate\Database\Eloquent\Collection);
        }

        public function test_set_tag_to_model()
        {
            /** @var User $user */
            $user = factory(User::class)->create();
            $user->setTags(["active user","free user"]);
            $this->assertDatabaseHas("tags",
                ["name"=>"active user"]
            );
            $tags = collect($user->tags)->pluck("name");
            $this->assertTrue($tags->contains("active user"));
            $this->assertTrue($tags->contains("free user"));

        }

        public function test_set_tag_remove_old_tags()
        {
            /** @var User $user */
            $user = factory(User::class)->create();
            $user->setTags(["active user","free user"]);
            $user->setTags(["deleted user"]);
            $tags = collect($user->tags)->pluck("name");
            $this->assertTrue($tags->contains("deleted user"));
            $this->assertTrue(!$tags->contains("free user"));
        }
        public function test_add_tag_dont_remove_old_tags()
        {
            /** @var User $user */
            $user = factory(User::class)->create();
            $user->setTags(["active user"]);
            $user->addTags(["free user","active user"]);
            $user->addTags(["free user"]);
            $tags = collect($user->tags)->pluck("name");
            $this->assertTrue($tags->contains("active user"));
            $this->assertTrue($tags->contains("free user"));
            $this->assertTrue($tags->count() === 2);
        }

    }
