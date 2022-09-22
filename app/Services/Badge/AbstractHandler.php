<?php

namespace App\Services\Badge;

use App\Models\UserState;

abstract class AbstractHandler implements Handler
{
    #مشخص میکند که مرحله ی بعدی آپدیت ما چی هستش
    private $nextHandler;

    public function setNext(Handler $handler)
    {
        $this->nextHandler = $handler;

        return $handler;
    }

    public function handle(UserState $userState)
    {
        
        if($this->nextHandler){
            return $this->nextHandler->handle($userState);
        }

        return null;
    }
}
