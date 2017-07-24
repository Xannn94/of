<?php

namespace App\Modules\Search\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class MainComposer
{
    /**
     * @var Request Current HTTP request instance
     */
    protected $request;

    /**
     * MainComposer constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Passes search_text parameter to view
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('query', $this->request->input('query'));
    }
}