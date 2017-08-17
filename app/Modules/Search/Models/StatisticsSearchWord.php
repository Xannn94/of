<?php

namespace App\Modules\Search\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Modules\Search\Models\StatisticsSearchWord
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $date
 * @property string $lang
 * @property string $ip
 * @property string $query
 * @property int $results
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Search\Models\StatisticsSearchWord whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Search\Models\StatisticsSearchWord whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Search\Models\StatisticsSearchWord whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Search\Models\StatisticsSearchWord whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Search\Models\StatisticsSearchWord whereQuery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Search\Models\StatisticsSearchWord whereResults($value)
 */
class StatisticsSearchWord extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
