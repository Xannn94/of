<?php

namespace App\Modules\Roles\Http\Controllers\Admin;

use App\Modules\Admin\Http\Controllers\Admin;
use App\Modules\Roles\Models\Permission;
use App\Modules\Roles\Models\Modules;
use Illuminate\Support\Facades\View;
use App\Modules\Roles\Models\Roles;
use Illuminate\Http\Request;

class IndexController extends Admin
{
    /* тут должен быть slug модуля для правильной работы меню */
    public $page = 'roles';
    /* тут должен быть slug группы для правильной работы меню */
    public $pageGroup = 'users';

    public function getModel()
    {
        return new Roles();
    }

    public function getRules($request, $id = false)
    {
        return  [
            'title' => 'sometimes|required'
        ];
    }

    public function create()
    {
        $entity     = $this->getModel();
        $modules    = Modules::all();

        $this->after($entity);

        return view($this->getFormViewName(), [
            'entity'    => $entity,
            'modules'   => $modules
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->getRules($request));

        $entity = $this->getModel()->create(
            [
                'title'     => $request->input('title'),
                'active'    => $request->input('active')
            ]
        );

        $data = [
            'permissions' => $request->input('permissions')
        ];

        $entity->saveData($data);

        $this->after($entity);

        return redirect()
            ->route($this->routePrefix.'edit', ['id'=>$entity->id])
            ->with('message', trans($this->messages['store']));
    }

    public function edit($id)
    {
        $entity     = $this->getModel()->findOrFail($id);
        $modules    = Modules::all();

        View::share('entity', $entity);

        $this->after($entity);

        return view($this->getFormViewName(), [
            'entity'        => $entity,
            'routePrefix'   => $this->routePrefix,
            'modules'       => $modules
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->getRules($request, $id));

        $entity = $this->getModel()->findOrFail($id);

        $entity->updateData($request->all());

        $this->after($entity);

        return redirect()->back()->with('message', trans($this->messages['update']));
    }

    public function destroy($id)
    {
        $entity         = $this->getModel()->find($id);
        $permissions    = $entity->permissions()->get();

        $entity->permissions()->detach();

        if(!$permissions->isEmpty()){
            foreach ($permissions as $permission){
                $permission->delete();
            }
        }

        $entity->delete();

        $this->after($entity);

        return redirect()->back()->with('message', trans($this->messages['destroy']));
    }

    public function refreshModules()
    {
        $newModules = 0;
        $newTitle   = 0;

        $this->deleteOldModules();

        foreach (config('modules.items') as $key => $value){
            $condition = (
                isset($value['settings']) &&
                isset($value['menu']) &&
                isset($value['settings']['in_roles']) &&
                $value['settings']['in_roles'] = 1
            );

            if($condition){
                $items  = config('modules.items.' .$key.'.menu.items');

                foreach ($items as $item){
                    $slug   = $item['slug'];
                    $title  = $item['title'];

                    $module = Modules::where('slug',$slug)->first();

                    if(!$module){
                        $module = Modules::create([
                            'slug'  => $slug,
                            'title' => $title
                        ]);

                        $admin = Roles::where('id',1)->first();

                        $permissionEntity               = new Permission();
                        $permissionEntity->module_id    = $module->id;
                        $permissionEntity->read         = 1;
                        $permissionEntity->create       = 1;
                        $permissionEntity->publish      = 1;
                        $permissionEntity->update       = 1;
                        $permissionEntity->delete       = 1;

                        $admin->permissions()->save($permissionEntity);

                        $newModules++;
                    }
                    elseif($module->title != $title) {
                        Modules::where('slug',$slug)->update([
                            'title' => $title
                        ]);

                        $newTitle++;
                    }
                }
            }
        }

        return redirect()->back()->with([
            'message' =>
                'Модули успешно обновлены.<br> Добавлено: '.
                $newModules.
                ' модуль(ей). <br> Переименовано: '.
                $newTitle.
                ' модуль(ей).'
        ]);
    }

    private function deleteOldModules()
    {
        $modules = Modules::all();

        $modules->each(
            function ($item){
                $slugs  = [];

                foreach (config('modules.items') as $key => $value) {
                    $condition = (
                        isset($value['settings']) &&
                        isset($value['menu']) &&
                        isset($value['settings']['in_roles']) &&
                        $value['settings']['in_roles'] = 1
                    );

                    if($condition){
                        foreach (config('modules.items.' .$key.'.menu.items') as $menuItem){
                                $slugs[$menuItem['slug']] = 1;
                        }
                    }
                }

                if(!array_key_exists($item->slug,$slugs)){
                    $roles  = Roles::all();
                    $module = Modules::where('slug',$item->slug)->first();

                    foreach ($roles as $role){
                        $permissions = $role->permissions()->get();

                        if($permissions){
                            foreach ($permissions as $permission){
                                if($module && $module->slug === $item->slug && $module->id == $permission->module_id){
                                    $permission->delete();
                                    $module->destroy();
                                    $role->permissions()->detach($permission->id);
                                }
                            }
                        }
                    }
                    $item->delete();
                }
        });
    }
}
