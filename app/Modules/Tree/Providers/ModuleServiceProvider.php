<?php

namespace App\Modules\Tree\Providers;

use App\Providers\ModuleProvider;

class ModuleServiceProvider extends ModuleProvider
{

    public $module = 'tree';

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->bind('tree_repository', function(){
            return new \App\Modules\Tree\Models\TreeRepository;
        });

        $this->app->make('view')->composer('tree::menu', 'App\Modules\Tree\Http\ViewComposers\MenuComposer');
        $this->app->make('view')->composer('tree::breadcrumbs', 'App\Modules\Tree\Http\ViewComposers\BreadcrumbsComposer');

    }


}
