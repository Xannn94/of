<?php

namespace App\Modules\Tree\Http\Controllers\Admin;

use App\Modules\Admin\Http\Controllers\Admin;
use App\Modules\Tree\Models\Tree;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class IndexController extends Admin
{
    public $perPage = 100;
    /* тут должен быть slug модуля для правильной работы меню */
    public $page = 'tree';
    /* тут должен быть slug группы для правильной работы меню */
    public $pageGroup = 'content';

    public function getModel()
    {
        return new Tree();
    }

    public function getRules($request, $id = false)
    {
        $rules          = [];
        $rules['title'] = 'sometimes|required|max:255';
        $rules['slug']  = [
            'sometimes', 'required', 'regex:/(^[A-Za-z0-9_\-]+$)+/', 'max:60',
            Rule::unique('tree')->ignore($id)->where('lang', lang())
        ];

        return $rules;
    }

    protected function after($entity)
    {
        if (action() == 'store' || action() == 'update') {
            $parentId = (int)Request::get('parent_id');

            if ($parentId && $parentId!=$entity->parent_id) {
                $parent = $this->getModel()->findOrFail($parentId);

                try {
                    $entity->makeChildOf($parent);
                } catch (\Baum\MoveNotPossibleException $e) {
                    redirect()->back()->withErrors([trans('tree::admin.unable_to_move')]);
                }
            }
        }
    }

    public function priority($id, $direction)
    {
        $entity = $this->getModel()->findOrFail($id);

        try {
            if ($direction == 'up') {
                $entity->moveLeft();
            } else {
                $entity->moveRight();
            }
        } catch (\Baum\MoveNotPossibleException $e) {
            redirect()->back();
        }

        $this->after($entity);

        return redirect()->back();
    }
}
