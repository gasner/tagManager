<?php


namespace gasner\TagManager\App;


use gasner\TagManager\App\Services\TagService;

trait TagAble
{

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function setTags(array $tags)
    {
        $createdTags = TagService::createFromArray($tags);
        $this->tags()->detach();
         $this->tags()->attach(collect($createdTags)->pluck("id"));
        $this->refresh();

    }

    public function addTags(array $tags)
    {
        $createdTags = TagService::createFromArray($tags);
        $exitedTagIds = $this->tags->pluck("id");
        $tagToAttach = collect($createdTags)->filter(function($tag) use ($exitedTagIds) {
            return !$exitedTagIds->contains($tag["id"]);
        });
         $this->tags()->attach($tagToAttach->pluck("id"));
         $this->refresh();
    }

}
