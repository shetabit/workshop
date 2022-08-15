<?php

namespace App\Workshop\DesignPattern\Creational\FactoryMethod;

class DevelopmentManager extends HiringManager
{
    protected function makeInterviewer(): Interviewer
    {
        return new Developer();
    }
}
