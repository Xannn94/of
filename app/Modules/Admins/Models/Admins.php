<?php
namespace App\Modules\Admins\Models;

use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use App\Models\Model;

class Admins extends Model
{
    use Notifiable, Sortable;

    public function scopeOrder($query){
        return $query;
    }
}
