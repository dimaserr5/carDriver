<?php

namespace App\Models\api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\api\v1\car
 *
 * @property int $id
 * @property string $name
 * @property string $gos_number
 * @property int|null $userid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|car newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|car newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|car query()
 * @method static \Illuminate\Database\Eloquent\Builder|car whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|car whereGosNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|car whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|car whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|car whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|car whereUserid($value)
 * @mixin \Eloquent
 */
class car extends Model
{
    use HasFactory;

}
