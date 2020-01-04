<?php


namespace gasner\TagManager\App\Services;


use gasner\TagManager\App\Tag;

class TagService
{

    public static function createFromArray(array $tags): array
    {
        return collect($tags)->map(function ($tag) {
            return Tag::firstOrCreate(["name" => $tag], ["name" => $tag]);
        })->toArray();
    }

    public static function preferToTaggables(array $tags)
    {
        return collect($tags)->map(function ($tag){
            return ["tag_id"=>$tag["id"]];
        });
    }

}
