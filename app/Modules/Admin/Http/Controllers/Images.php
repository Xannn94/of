<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Facades\Uploader;
use App\Facades\Route;

abstract class Images extends Controller
{
    public $routePrefix = false;
    public $indexView = 'admin::images.index';
    public $configField = 'image';

    abstract public function getParentModel();
    abstract public function getModel();

    public function __construct()
    {
        parent::__construct();

        $module = Route::getModule();

        if ($module) {
            if (! $this->routePrefix){
                $this->routePrefix = 'admin.'.$module . '.images.';
            }
        }
    }

    public function index($id)
    {
        $entity     = $this->getParentModel()->find($id);
        $entities   = $entity->images()->order()->get();

        return view($this->indexView, [
            'entities'      => $entities,
            'routePrefix'   => $this->routePrefix,
            'parent'        => $entity,
            'config'        => $this->getConfig()
        ]);
    }

    public function store(Request $request, $parent)
    {
        $entity = $this->getParentModel()->findOrFail($parent);

        if ($request->hasFile($this->configField)) {
            foreach ($request->file($this->configField) as $item) {
                $validator = Validator::make(
                    [$this->configField => $item],
                    [$this->configField => $this->getConfig()['validator']]
                );

                if ($validator->fails()) {
                    return response()->json(['state' => 'error', 'message' => $validator->errors()->first()], 200);
                }
            }

            $files = $request->file($this->configField);

            foreach ($files as $file) {
                if (Uploader::upload($file, $this->getConfig())) {
                    $image = $this->getModel();
                    $image->{$this->getConfig()['field']} = Uploader::getName();
                    $image->position = 0;
                    $image->parent()->associate($entity);
                    $image->save();
                }
            }
        }

        return response()->json(['state' => 'success']);

    }

    public function update(Request $request, $parent, $id)
    {
        if ($request->input('item')) {
            foreach ($request->input('item') as $pos => $id) {
                $entity = $this->getModel()->find($id);
                $entity->position = $pos + 1;
                $entity->save();
            }
        }
    }

    public function destroy($parent, $id)
    {
        $entity = $this->getModel()->find($id);

        if (Uploader::delete($entity->{$this->getConfig()['field']}, $this->getConfig())) {
            $entity->delete();
        }
    }

    protected function getConfig()
    {
        $config = module_config('uploads');
        if (isset($config[$this->configField])) {
            return $config[$this->configField];
        }
    }
}
