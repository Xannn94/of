<?php

namespace App\Providers;

use Xannn94\Modules\Support\ServiceProvider;

abstract class ModuleProvider extends ServiceProvider
{

    public $module = false;

    /**
     * Bootstrap the module services.
     *
     * @return void
     */

    protected function getDir(){
        return app_path().'/Modules/'.ucfirst($this->module);
    }

    public function boot()
    {
        if (!$this->module){
            return false;
        }

        $this->loadTranslationsFrom($this->getDir().'/Resources/Lang', $this->module);
        $this->loadViewsFrom($this->getDir().'/Resources/Views', $this->module);
        $this->bootConfig($this->module);
    }

    protected function bootConfig($module){

        $files = array_diff(scandir( $this->getDir().'/Config'), array('.','..'));
        if (empty($files)){
            return false;
        }

        foreach ($files as $file){
            $this->mergeConfigFrom( $this->getDir().'/Config/'.$file, 'modules.items.'.$module.'.'.basename($file, '.php'));
        }

    }
}
