<?php

namespace App\Classes;

interface Translatable
{
    public static function options(): array;

    public function getLabel(): string;
}
