<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as ParentModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;


class Model extends ParentModel
{

    protected $guarded = array('id', 'created_at', 'updated_at');

    public static function getTableStatic()
    {
        return with(new static)->getTable();
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            with(new static)->beforeCreate($model);
        });

        static::updating(function ($model) {
            with(new static)->beforeSave($model);
        });

        with(new static)->addGlobalScopes();
    }

    protected function addGlobalScopes()
    {
        if (Schema::hasColumn(self::getTableStatic(), 'lang')) {
            static::addGlobalScope('lang', function (Builder $builder) {
                $builder->where('lang', '=', lang());
            });
        }
    }

    protected function beforeCreate($model)
    {
        $columns = Schema::getColumnListing($model->getTable());

        if (in_array('lang', $columns)) {
            $model->lang = lang();
        }
    }

    protected function beforeSave($model)
    {

    }

    public function scopeAdmin($query)
    {
        return $query->filtered()->order();
    }

    public function scopeFiltered($query)
    {
        return $query;
    }

    public function scopeActive($query)
    {
        return $query->order()->where('active', 1);
    }

    public function scopeOrder($query)
    {
        return $query;
    }
}
