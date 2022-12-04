<?php

namespace App\Workshop\DesignPattern\Behavioral\Observer;

interface Observer
{
    public function onJobPosted(JobPost $job);
}
