<?php

namespace App\Models;

use Illuminate\Support\Facades\Request;

trait Filters{

    public function scopeFiltered($query){
        foreach ($this->filters as $input=>$filter){
            if (isset(Request::get('filters')[$input]) && Request::get('filters')[$input]){
                $where = str_replace('?', Request::get('filters')[$input], $filter[2]);
                $query->where($filter[0], $filter[1], $where);
            }
        }
        return $query;
    }
}