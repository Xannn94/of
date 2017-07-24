<?php

namespace App\Modules\News\Providers;


use App\Providers\ModuleProvider;

class ModuleServiceProvider extends ModuleProvider
{
    public $module = 'news';

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->make('view')->composer('news::main', 'App\Modules\News\Http\ViewComposers\MainComposer');
    }
}
