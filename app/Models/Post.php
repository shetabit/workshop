<?php

namespace App\Models;

use App\Support\PostStatuses;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $casts = [
        'status' => PostStatuses::class
    ];

	public function tags()
	{
			return $this->belongsToMany('App\Tag');
	}


}
