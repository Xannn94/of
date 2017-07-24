<?php
namespace App\Modules\News\Http\ViewComposers;
use Illuminate\View\View;
use App\Modules\News\Models\News;

class MainComposer
{
    public function compose(View $view)
    {
        $view->with('items', News::active()->where('on_main', 1)->get());
    }
}