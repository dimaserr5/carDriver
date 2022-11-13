<?php

namespace App\Models\api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\api\v1\user
 *
 * @property int $id
 * @property string $username
 * @property string $api_key
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|user newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|user newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|user query()
 * @method static \Illuminate\Database\Eloquent\Builder|user whereApiKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|user whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|user whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|user whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|user whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|user whereUsername($value)
 * @mixin \Eloquent
 */
class user extends Model
{
    protected $fillable = ['username'];
    use HasFactory;

}
