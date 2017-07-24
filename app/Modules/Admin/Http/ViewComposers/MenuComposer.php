<?php
namespace App\Modules\Admin\Http\ViewComposers;

use Auth;
use Illuminate\View\View;
use Xannn94\Modules\Facades\Module;

class MenuComposer
{
    public function compose(View $view = null)
    {
        $modules    = Module::all();
        $groups     = [];
        $items      = [];

        if (empty($modules)) {
            return;
        }

        foreach ($modules as $module => $info) {
            $config = module_config('menu', strtolower($module));

            if (isset($config['groups'])) {
                $groups = array_merge($groups, $config['groups']);
            }

            if (isset($config['items'])) {
                $items = array_merge($items, $config['items']);
            }
        }

        if (empty($groups)){
            return;
        }

        if (empty($items)) {
            return;
        }

        $groups = collect($groups)->sortBy('title')->sortByDesc('priority');
        $items  = collect($items)->sortBy('title')->sortByDesc('priority');
        $groups = $groups->toArray();

        foreach ($groups as $key => &$group) {
            $count = 0;
            foreach ($items as $item) {
                $admin = Auth::guard('admin')->user();

                if ($item['group'] == $group['slug'] && $admin->canRead($item['slug'])){
                    $group['items'][] = $item;
                   $count++;
                }
            }

            if(!$count){
                unset($groups[$key]);
            }
        }

        $view->with('items', $groups);
    }
}