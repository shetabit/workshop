<?php

namespace App\Classes;

trait HasTranslatableLabels
{
    public function getLabel(): string
    {
        return self::options()[$this->value];
    }
}
