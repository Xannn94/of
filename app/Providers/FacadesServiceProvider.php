<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FacadesServiceProvider extends ServiceProvider {
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->app->bind('uploader', function(){
            return new \App\Helpers\Uploader;
        });

        $this->app->singleton('bootstrap_form_new', function($app) {
            return new \App\Helpers\BootstrapForm($app['html'], $app['form'], $app['config']);
        });
    }
}