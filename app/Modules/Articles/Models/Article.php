<?php
namespace App\Modules\Articles\Models;

use App\Models\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;
use App\Models\Image;
use App\Models\Filters;

class Article extends Model
{
    use Notifiable, Sortable, Image, Filters;

    public $filters = [
        'title'=> ['title', 'LIKE', '%?%']
    ];

    public function scopeOrder($query)
    {
        return $query->orderBy('priority', 'desc')->orderBy('date', 'desc');
    }
}
