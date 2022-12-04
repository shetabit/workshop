<?php

namespace App\Workshop\DesignPattern\Behavioral\Command;

interface Command
{
    public function execute();
    public function undo();
    public function redo();
}
