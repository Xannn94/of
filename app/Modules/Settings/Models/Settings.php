<?php
namespace App\Modules\Settings\Models;

use Illuminate\Database\Eloquent\Model ;

class Settings extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'key','value'
    ];
}
