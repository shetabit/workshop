<?php

use App\Workshop\DesignPattern\Behavioral\Command\Bulb;
use App\Workshop\DesignPattern\Behavioral\Command\RemoteControl;
use App\Workshop\DesignPattern\Behavioral\Command\TurnOff;
use App\Workshop\DesignPattern\Behavioral\Command\TurnOn;

$bulb = new Bulb();

$turnOn = new TurnOn($bulb);
$turnOff = new TurnOff($bulb);

$remote = new RemoteControl();
$remote->submit($turnOn); // Bulb has been lit!
$remote->submit($turnOff); // Darkness!
