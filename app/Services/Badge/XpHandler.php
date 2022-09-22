<?php

namespace App\Services\Badge;

use App\Models\Badge;
use App\Models\UserState;

class XpHandler extends AbstractHandler
{
    public function handle(UserState $userState)
    {
        if($userState->isDirty('xp')) $this->applyBadge($userState);

        return parent::handle($userState);
    }

    protected function getAvailableBdges($userState)
    {
        #بج هایی که کاربر میتواند داشته باشد
        return Badge::xp()->where('required_number','<=',$userState->xp)->get();

    }
}
