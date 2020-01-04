<?php

namespace App;

use gasner\TagManager\App\Tag;
use Illuminate\Database\Eloquent\Model;

class Taggable extends Model
{
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
