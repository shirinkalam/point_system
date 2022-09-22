<?php

namespace App\Services\Badge;

use App\Models\Badge;
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

    protected function applyBadge($userState)
    {
        $availableBadges = $this->getAvailableBdges($userState);

        #مقایسه کردن بج های بالا با بج های خود کاربر
        $userBadges = $userState->user->badges;

        $notRecievedBadge = $availableBadges->diff($userBadges);

        #اگر خالی نبود
        if($notRecievedBadge->isEmpty()) return;

        #آن را برای کاربر اساین میکند
        $userState->user->badges()->attach($notRecievedBadge);
    }

    abstract protected function getAvailableBdges($userState);
}
