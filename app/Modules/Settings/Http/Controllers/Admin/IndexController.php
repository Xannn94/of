<?php

namespace App\Modules\Settings\Http\Controllers\Admin;

use App\Modules\Admin\Http\Controllers\Admin;
use App\Modules\Settings\Models\Settings;
use Illuminate\Http\Request;

class IndexController extends Admin
{
    public function getModel()
    {
        return new Settings();
    }

    public function edit($id)
    {
        abort(404);
    }

    public function create()
    {
        abort(404);
    }

    public function index()
    {
        abort(404);
    }

    public function store(Request $request)
    {

        $settings = $request->get('settings');
        foreach ($settings as $key=>$value){
            $entity         = Settings::firstOrCreate(['key'=>$key]);
            $entity->value  = $value;
            $entity->save();
        }
        return redirect()->back();
    }

    public function update(Request $request, $id){
        abort(404);
    }
}
