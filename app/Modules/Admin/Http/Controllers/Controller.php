<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $page;
    public $pageGroup;

    public function __construct()
    {
        $this->middleware([
            'admin.user',
            'action.access'
        ]);

        View::share('page', $this->page);
        View::share('pageGroup', $this->pageGroup);

        //Не смотря на локаль, все переводы в админке русские
        Lang::setLocale(config('cms.admin_locale'));


    }


}
