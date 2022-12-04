<?php

namespace App\Workshop\DesignPattern\Behavioral\Command;

// Invoker
class RemoteControl
{
    public function submit(Command $command)
    {
        $command->execute();
    }
}
