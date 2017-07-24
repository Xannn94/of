<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Uploader extends Facade {
    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'uploader'; // the IoC binding.
    }
}
