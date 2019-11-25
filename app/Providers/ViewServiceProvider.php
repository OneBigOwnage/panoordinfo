<?php

namespace App\Providers;

use App\Http\ViewComposers\MenuItems;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.default', MenuItems::class);
    }
}
