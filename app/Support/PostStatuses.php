<?php

namespace App\Support;

use App\Classes\HasTranslatableLabels;
use App\Classes\Translatable;

enum PostStatuses: string implements Translatable
{
    use HasTranslatableLabels;
    case DRAFT = 'draft';
    case PUBLISHED = 'published';

    public static function options(): array
    {
        return [
            self::DRAFT->value => __('Draft'),
            self::PUBLISHED->value => __('Published'),
        ];
    }
}

//examples
//PostStatuses::options()[$post->status->value];
//$post->status->getLabel();
