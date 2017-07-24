<?php

namespace App\Modules\Affiliates\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Affiliates\Models\Affiliates;

class IndexController extends Controller
{
    public function getModel()
    {
        return new Affiliates;
    }

    public function index()
    {
        return view(
            $this->getIndexViewName(),
            [
                'items'         => $this->getModel()->active()->get(),
                'routePrefix'   => $this->routePrefix
            ]);
    }

    public function bigMap(){
        $items  = [];
        $i      = 0;

        foreach ($this->getModel()->active()->get() as $item){
            $items[$i][0] = $item->id;
            $items[$i][1] = $item->lat;
            $items[$i][2] = $item->lng;
            $items[$i][3] = $item->zoom;
            $items[$i][4] = $item->title;
            $items[$i][5] = $item->address;
            $items[$i][6] = $item->work_time;
            $items[$i][7] = $item->work_break;
            $i++;
        }

        $result = collect($items);

        return view('affiliates::big-map')->with([
            'items'         => json_encode($result),
            'routePrefix'   => $this->routePrefix
        ]);
    }

    public function map($id){
        $entity = Affiliates::where('id',$id)->first();
        echo view('affiliates::map',['entity' => $entity]);
        die;
    }


}