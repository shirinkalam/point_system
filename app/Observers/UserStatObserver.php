<?php

namespace App\Observers;

use App\Models\UserState;
use App\Services\Badge\BadgeApplier;

class UserStatObserver
{
    /**
     * Handle the UserStat "updated" event.
     *
     * @param  \App\Models\UserStat  $userStat
     * @return void
     */
    public function updated(UserState $userStat)
    {
        resolve(BadgeApplier::class)->apply($userStat);
    }

}
