<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('contact.index', 'App\View\Composers\ContactIndexComposer');
        View::creator('contact.confirm', 'App\View\Creators\ContactConfirmCreator');
    }
}
