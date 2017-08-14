<?php

namespace App\Modules\Sliders\Providers;


use App\Providers\ModuleProvider;

class ModuleServiceProvider extends ModuleProvider
{

    public $module = 'sliders';

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->make('view')->composer(
            ['sliders::admin.form'],
            'App\Modules\Sliders\Http\ViewComposers\ColorComposer'
        );

        $this->app->make('view')->composer(
            ['sliders::admin.form'],
            'App\Modules\Sliders\Http\ViewComposers\LinkTypesComposer'
        );

        $this->app->make('view')->composer(
            ['sliders::main'],
            'App\Modules\Sliders\Http\ViewComposers\SliderComposer'
        );
    }


}
