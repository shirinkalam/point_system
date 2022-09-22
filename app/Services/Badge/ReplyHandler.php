<?php

namespace App\Services\Badge;

use App\Models\Badge;
use App\Models\UserState;

class ReplyHandler extends AbstractHandler
{
    public function handle(UserState $userState)
    {
        if($userState->isDirty('reply_count')) return $this->applyBadge($userState);

        return parent::handle($userState);
    }


    protected function getAvailableBdges($userState)
    {
        #بج هایی که کاربر میتواند داشته باشد
        return Badge::reply()->where('required_number','<=',$userState->reply_count)->get();

    }
}
