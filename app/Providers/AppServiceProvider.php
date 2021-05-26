<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Orchid\Support\Facades\Dashboard;

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
        Dashboard::useModel(\Orchid\Platform\Models\User::class, \App\Models\Admin::class);
        Dashboard::useModel(\Orchid\Platform\Models\Role::class, \App\Models\Role::class);
    }
}
