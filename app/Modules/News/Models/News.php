<?php
namespace App\Modules\News\Models;

use App\Models\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;
use App\Models\Image;

class News extends Model
{
    use Notifiable, Sortable, Image;

    public function scopeOrder($query)
    {
        return $query->orderBy('date', 'desc');
    }
}
