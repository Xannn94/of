<?php

namespace App\Modules\Collections\Providers;


use App\Modules\Collections\Http\ViewComposers\MainComposer;
use App\Modules\Collections\Http\ViewComposers\MenuComposer;
use App\Providers\ModuleProvider;

class ModuleServiceProvider extends ModuleProvider
{

    public $module = 'collections';

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->make('view')
            ->composer('tree::menu', MenuComposer::class);

        $this->app->make('view')
            ->composer('collections::main', MainComposer::class);
    }
}
