<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;

    public $table = 'post_tags';

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}

/**
CREATE OR REPLACE VIEW post_tags AS
SELECT posts.id, posts.title, tags.id as tag_id, tags.name FROM posts
INNER JOIN post_tag ON post_tag.post_id = posts.id
INNER JOIN tags ON post_tag.tag_id = tags.id;
 */
