<?php
namespace App\Modules\Roles\Models;

use App\Models\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;

class Modules extends Model
{
    use Notifiable, Sortable;

    public $timestamps = false;

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
