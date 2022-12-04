<?php

namespace App\Workshop\DesignPattern\Behavioral\Mediator;

class ChatRoom implements ChatRoomMediator
{

    public function showMessage(User $user, string $message)
    {
        $time = date('M d, y H:i');
        $sender = $user->getName();

        echo $time . '[' . $sender . ']:' . $message;
    }
}
