<?php
namespace App\Modules\Colors\Models;

use App\Models\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;


class Colors extends Model
{
    use Notifiable, Sortable;

    public $timestamps = false;

    public function scopeOrder($query){
        return $query;
    }

}
