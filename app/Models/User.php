<?php

namespace App\Models;

use App\Queries\DayLogQuery;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property string $id
 * @property string $name
 * @property int $step_goal
 * @property string $email
 * @property string $password
 * @property Carbon $email_verified_at
 * @property string $remember_token
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Collection<DayLog> $day_logs
 * @property DayLog $current_day_log
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    protected $fillable = [
        'name',
        'step_goal',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function dayLogs(): HasMany
    {
        return $this->hasMany(DayLog::class);
    }

    public function currentDayLog(): HasOne
    {
        return $this->hasOne(DayLog::class)
            ->where(fn (DayLogQuery $query) => $query->whereDateToday());
    }
}
