<?php

use App\Workshop\DesignPattern\Structural\Bridge\About;
use App\Workshop\DesignPattern\Structural\Bridge\Careers;
use App\Workshop\DesignPattern\Structural\Bridge\DarkTheme;

$darkTheme = new DarkTheme();

$about = new About($darkTheme);
$careers = new Careers($darkTheme);

echo $about->getContent(); // "About page in Dark Black";
echo $careers->getContent(); // "Careers page in Dark Black";
