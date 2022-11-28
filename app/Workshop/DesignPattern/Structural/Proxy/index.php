<?php

use App\Workshop\DesignPattern\Structural\Proxy\LabDoor;
use App\Workshop\DesignPattern\Structural\Proxy\SecuredDoor;

$door = new SecuredDoor(new LabDoor());
$door->open('invalid'); // Big no! It ain't possible.

$door->open('$ecr@t'); // Opening lab door
$door->close(); // Closing lab door
