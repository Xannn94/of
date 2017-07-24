<?php
namespace App\Modules\Affiliates\Models;

use App\Models\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;

class Affiliates extends Model
{
    use Notifiable, Sortable;

    public function scopeOrder($query)
    {
        return $query->orderBy('priority','desc')->orderBy('created_at','desc');
    }
}
