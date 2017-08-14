<?php
namespace App\Modules\Sliders\Http\ViewComposers;
use Illuminate\View\View;
class ColorComposer
{
    public function compose(View $view){
        $colors = [
            'white' => trans('sliders::admin.colors.white'),
            'black' => trans('sliders::admin.colors.black'),
            'purple' => trans('sliders::admin.colors.purple'),
            'yellow' => trans('sliders::admin.colors.yellow'),
            'blue' => trans('sliders::admin.colors.blue'),
            'green' => trans('sliders::admin.colors.green'),
        ];
        $view->with('colors', $colors);
    }
}