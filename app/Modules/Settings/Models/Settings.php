<?php
namespace App\Modules\Settings\Models;

use Illuminate\Database\Eloquent\Model ;

/**
 * App\Modules\Settings\Models\Settings
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $key
 * @property string $value
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Settings\Models\Settings whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Settings\Models\Settings whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Settings\Models\Settings whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Settings\Models\Settings whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Settings\Models\Settings whereValue($value)
 */
class Settings extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'key','value'
    ];
}
