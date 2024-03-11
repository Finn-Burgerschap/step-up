<?php

namespace App\Models;

use App\Queries\DayLogQuery;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property string $id
 * @property string $user_id
 * @property Carbon $date
 * @property int $steps
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property User $user
 *
 * @method static DayLogQuery query()
 */
class DayLog extends Model
{
    use HasUuids;

    protected $fillable = [
        'user_id',
        'date',
        'steps'
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function newEloquentBuilder($query): DayLogQuery
    {
        return new DayLogQuery($query);
    }
}
