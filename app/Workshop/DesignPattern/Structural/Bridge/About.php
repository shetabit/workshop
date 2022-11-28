<?php

namespace App\Workshop\DesignPattern\Structural\Bridge;

class About implements WebPage
{
    protected Theme $theme;

    public function __construct(Theme $theme)
    {
        $this->theme = $theme;
    }

    public function getContent()
    {
        return "About page in " . $this->theme->getColor();
    }
}
