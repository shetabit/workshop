<?php

namespace App\Workshop\DesignPattern\Structural\Bridge;

class Careers implements WebPage
{
    protected Theme $theme;

    public function __construct(Theme $theme)
    {
        $this->theme = $theme;
    }

    public function getContent()
    {
        return "Careers page in " . $this->theme->getColor();
    }
}
