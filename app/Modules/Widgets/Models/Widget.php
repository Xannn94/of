<?php
namespace App\Modules\Widgets\Models;

use App\Models\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;

class Widget extends Model
{
    use Notifiable, Sortable;

    public function scopeOrder($query)
    {
        return $query->orderBy('slug', 'asc');
    }

    public function scopeList($query)
    {
        return $query->where('active', 1)->order();
    }
}
