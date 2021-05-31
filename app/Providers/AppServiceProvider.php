<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\UserObserver;
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
        view()->composer(

            'layouts.navbars.navs.auth',                  

            function ($view) {
                $view->with('user', auth()->user())->with('url', Storage::disk('s3')->temporaryUrl('user_avatars/'.auth()->user()->avatar, now()->addMinutes(60)));
            }
        );
    }
}
