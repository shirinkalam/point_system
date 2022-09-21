<?php

namespace App\Observers;

use App\Models\Topic;

class TopicObserver
{
    /**
     * Handle the Topic "created" event.
     *
     * @param  \App\Models\Topic  $topic
     * @return void
     */
    public function created(Topic $topic)
    {
        $topic->user->incrementXp(Topic::XP);
    }
}
