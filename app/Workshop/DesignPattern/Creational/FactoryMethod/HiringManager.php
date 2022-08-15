<?php

namespace App\Workshop\DesignPattern\Creational\FactoryMethod;

abstract class HiringManager
{

    // Factory method
    abstract protected function makeInterviewer(): Interviewer;

    public function takeInterview()
    {
        $interviewer = $this->makeInterviewer();

        return $interviewer->askQuestions();
    }
}
