<?php

use App\Workshop\DesignPattern\Structural\Facade\Computer;
use App\Workshop\DesignPattern\Structural\Facade\ComputerFacade;

$computer = new ComputerFacade(new Computer());
$computer->turnOn(); // Ouch! Beep beep! Loading.. Ready to be used!
$computer->turnOff(); // Bup bup buzzz! Haah! Zzzzz
