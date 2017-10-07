<?php
namespace App\Modules\Collections\Http\ViewComposers;

use Illuminate\View\View;
use App\Modules\Collections\Models\Collections;

class MainComposer
{
    public function compose(View $view){
        $view->with('collections', Collections::active()->where('on_main',1)->get());
    }
}