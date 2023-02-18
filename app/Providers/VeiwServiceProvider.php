<?php

namespace App\Providers;


use App\Http\View\Composer\CategoryComposer;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class VeiwServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer("layouts.app",CategoryComposer::class);
    }
}
