<?php

namespace App\Services\Badge;

use App\Models\Badge;
use App\Models\UserState;

class TopicHandler extends AbstractHandler
{
    public function handle(UserState $userState)
    {
        if($userState->isDirty('topic_count')) return $this->applyBadge($userState);

        return parent::handle($userState);
    }


    private function applyBadge($userState)
    {
        #بج هایی که کاربر میتواند داشته باشد
        $availableBadges = Badge::topic()->where('required_number','<=',$userState->topic_count)->get();

        #مقایسه کردن بج های بالا با بج های خود کاربر
        $userBadges = $userState->user->badges;

        $notRecievedBadge = $availableBadges->diff($userBadges);

        #اگر خالی نبود
        if($notRecievedBadge->isEmpty()) return;

        #آن را برای کاربر اساین میکند
        $userState->user->badges()->attach($notRecievedBadge);
    }
}

