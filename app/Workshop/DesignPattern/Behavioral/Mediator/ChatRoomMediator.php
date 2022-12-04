<?php

namespace App\Workshop\DesignPattern\Behavioral\Mediator;

interface ChatRoomMediator
{
    public function showMessage(User $user, string $message);
}
