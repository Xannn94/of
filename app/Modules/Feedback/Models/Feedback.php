<?php
namespace App\Modules\Feedback\Models;

use App\Models\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;

class Feedback extends Model
{
    use Notifiable, Sortable;

    protected $fillable = [
        'date','email', 'name', 'message', 'ip'
    ];

    public function imagePrefixPath()
    {
        return '/uploads/reviews/';
    }

    public function scopeOrder($query)
    {
        return $query->orderBy('date', 'desc');
    }
}
