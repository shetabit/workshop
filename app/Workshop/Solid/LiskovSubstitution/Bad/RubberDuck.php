<?php

namespace App\Workshop\Solid\LiskovSubstitution\Bad;

use App\Workshop\Solid\LiskovSubstitution\Duck;
use App\Workshop\Solid\LiskovSubstitution\Person;

class RubberDuck extends Duck
{
    protected $person;

    public function __construct(Person $person)
    {
        $this->person = $person;
    }

    public function quack()
    {
        if ($this->person->squeezeDuck()) {
            return 'The Duck is quacking';
        }

        throw new \Exception("A RubberDuck can't quack on its own.");
    }

    public function fly()
    {
        throw new \Exception("A RubberDuck can't fly.");
    }

    public function swim()
    {
        if ($this->person->throwDuckInTub()) {
            return 'The Duck is swimming';
        }

        throw new \Exception("A RubberDuck can't swim on its own.");
    }
}
