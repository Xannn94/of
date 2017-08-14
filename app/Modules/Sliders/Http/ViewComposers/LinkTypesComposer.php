<?php
namespace App\Modules\Sliders\Http\ViewComposers;

use Illuminate\View\View;

class LinkTypesComposer
{
    public function compose(View $view){
        $linkTypes = [
            'in' => trans('sliders::admin.fields.linkIn'),
            'out' => trans('sliders::admin.fields.linkOut'),
        ];
        $view->with('linkTypes', $linkTypes);
    }
}