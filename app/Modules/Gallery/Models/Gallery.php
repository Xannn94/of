<?php

namespace App\Modules\Gallery\Models;

use App\Models\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;
use App\Models\Image as Img;

class Gallery extends Model
{
    use Notifiable, Sortable, Img;

    protected $table = 'gallery';

    public function scopeOrder($query)
    {
        return $query->orderBy('priority', 'desc')->orderBy('date', 'desc');
    }

    public function images()
    {
        return $this->hasMany("App\Modules\Gallery\Models\Image", 'parent_id', 'id');
    }

    public function getTitleAttribute()
    {
        return $this->{'title_' . lang()};
    }

    public function setTitleAttribute($value)
    {
        $this->{'title_' . lang()} = $value;
    }

    public function getPreviewAttribute()
    {
        return $this->{'preview_' . lang()};
    }

    public function setPreviewAttribute($value)
    {
        $this->{'preview_' . lang()} = $value;
    }

    public function getContentAttribute()
    {
        return $this->{'content_' . lang()};
    }

    public function setContentAttribute($value)
    {
        $this->{'content_' . lang()} = $value;
    }
}
