<?php
namespace App\Modules\Tree\Http\ViewComposers;

use Illuminate\View\View;
use App\Modules\Tree\Helpers\Breadcrumbs;

class BreadcrumbsComposer
{
    public function compose(View $view){
        $view->with('breadcrumbs', Breadcrumbs::all());
    }
}