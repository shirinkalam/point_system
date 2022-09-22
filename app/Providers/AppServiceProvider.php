<?php

namespace App\Providers;

use App\Models\Reply;
use App\Models\Topic;
use App\Models\User;
use App\Models\UserState;
use App\Observers\ReplyObserver;
use App\Observers\TopicObserver;
use App\Observers\UserObserver;
use App\Observers\UserStatObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::Observe(UserObserver::class);
        Topic::Observe(TopicObserver::class);
        Reply::Observe(ReplyObserver::class);
        UserState::Observe(UserStatObserver::class);
    }
}
