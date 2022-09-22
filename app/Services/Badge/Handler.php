<?php

namespace App\Services\Badge;

use App\Models\UserState;

interface Handler
{
    public function setNext(Handler $handler);
    public function handle(UserState $userState);
}
