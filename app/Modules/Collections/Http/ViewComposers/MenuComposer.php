<?php
namespace App\Modules\Collections\Http\ViewComposers;

use Illuminate\View\View;
use App\Modules\Collections\Models\Collections;

class MenuComposer
{
    public function compose(View $view){
        $view->with('collections', Collections::active()->get());
    }
}