<?php

use App\Workshop\DesignPattern\Behavioral\Visitor\Dolphin;
use App\Workshop\DesignPattern\Behavioral\Visitor\Lion;
use App\Workshop\DesignPattern\Behavioral\Visitor\Monkey;
use App\Workshop\DesignPattern\Behavioral\Visitor\Speak;

$monkey = new Monkey();
$lion = new Lion();
$dolphin = new Dolphin();

$speak = new Speak();

$monkey->accept($speak);    // Ooh oo aa aa!
$lion->accept($speak);      // Roaaar!
$dolphin->accept($speak);   // Tuut tutt tuutt!
