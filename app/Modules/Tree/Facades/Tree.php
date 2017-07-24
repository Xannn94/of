<?php
namespace App\Modules\Tree\Facades;

use Illuminate\Support\Facades\Facade;

class Tree extends Facade {
    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'tree_repository';
    }
}
