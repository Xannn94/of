<?php

namespace App\Modules\Sitemap\Providers;

use App\Modules\Sitemap\Sitemap;
use App\Providers\ModuleProvider;

class ModuleServiceProvider extends ModuleProvider
{
    public $module = 'sitemap';

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->bind('sitemap', function(){
            return new Sitemap();
        });
    }
}
