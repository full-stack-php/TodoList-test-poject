<?php

namespace App\Providers;

use App\Http\ViewComposer\BodyComposer;
use App\Http\ViewComposer\MenuComposer;
use App\Http\ViewComposer\NavComposer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class TaskServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.sidebar', MenuComposer::class);
        View::composer('layouts.nav', NavComposer::class);
        View::composer('tasks.index', BodyComposer::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
