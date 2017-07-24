<?php
namespace App\Modules\Regions\Http\ViewComposers;

use Illuminate\View\View;
use App\Modules\Regions\Models\Regions;

class RegionsComposer
{
    protected $repository;

    public function __construct(Regions $repository){
        $this->repository = $repository;
    }

    public function compose(View $view){
        $model      = new Regions();
        $keyed      = [];
        $regions    = $model->where('active',1)->get();

        foreach ($regions as $region){
            $keyed[$region->id] = $region->title;
        }

        $view->with('regions', $keyed);
    }
}