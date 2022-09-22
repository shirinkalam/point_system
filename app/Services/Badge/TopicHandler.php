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


    protected function getAvailableBdges($userState)
    {
        #بج هایی که کاربر میتواند داشته باشد
        return Badge::topic()->where('required_number','<=',$userState->topic_count)->get();
    }
}

