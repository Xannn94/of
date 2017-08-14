<?php
namespace App\Modules\Sliders\Http\ViewComposers;
use Illuminate\View\View;
use App\Modules\Sliders\Models\Sliders;
class SliderComposer
{
    public function compose(View $view){
        $slider = new Sliders();
        $result = $slider::active()->orderBy('priority', 'desc')->orderBy('created_at', 'desc')->get();
        $view->with('slider', $result);
    }
}