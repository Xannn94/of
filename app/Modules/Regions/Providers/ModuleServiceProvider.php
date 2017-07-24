<?php

namespace App\Modules\Regions\Providers;

use App\Providers\ModuleProvider;

class ModuleServiceProvider extends ModuleProvider
{
    public $module = 'regions';

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->make('view')->composer('affiliates::admin.form', 'App\Modules\Regions\Http\ViewComposers\RegionsComposer');
    }
}
