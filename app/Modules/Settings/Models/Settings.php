<?php
namespace App\Modules\Settings\Models;

use Illuminate\Database\Eloquent\Model ;

/**
 * App\Modules\Settings\Models\Settings
 *
 * @mixin \Eloquent
 */
class Settings extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'key','value'
    ];
}
