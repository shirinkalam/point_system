<?php

namespace App\Services\Badge;

use App\Models\UserState;

#این کلاس chain هارا بقل هم قرار میدهد و آنهارا اجرا میکند
class BadgeApplier
{
    public function apply(UserState $userState)
    {
        $xpHandler = resolve(XpHandler::class);

        $xpHandler->handle($userState);
    }
}
