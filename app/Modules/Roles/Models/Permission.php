<?php
namespace App\Modules\Roles\Models;

use App\Models\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;

class Permission extends Model
{
    use Notifiable, Sortable;

    public $timestamps = false;

    public function role()
    {
        return $this->belongsToMany(Roles::class,'permission_roles');
    }

    public function module()
    {
        return $this->hasOne(Modules::class, 'id', 'module_id');
    }
}
