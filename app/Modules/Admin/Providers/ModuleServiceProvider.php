<?php

namespace App\Modules\Admin\Providers;

use App\Providers\ModuleProvider;
use Illuminate\Http\Request;

class ModuleServiceProvider extends ModuleProvider
{
    public $module = 'admin';

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->make('view')->composer('admin::common.languages', 'App\Modules\Admin\Http\ViewComposers\LanguagesComposer');
        $this->app->make('view')->composer('admin::common.menu', 'App\Modules\Admin\Http\ViewComposers\MenuComposer');


    }
}
