<?php
namespace App\Modules\Regions\Models;

use App\Models\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;

class Regions extends Model
{
    use Notifiable, Sortable;

    public function scopeOrder($query){
        return $query->orderBy('priority','desc');
    }
}
