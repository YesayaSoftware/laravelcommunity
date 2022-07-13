<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Activity extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'subject_id',
        'subject_type',
        'type'
    ];

    /**
     * Fetch the associated subject for the activity.
     *
     * @return MorphTo
     */
    public function subject(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * An activity is created by a particular user.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Fetch an activity feed for the given user.
     *
     * @param User $user
     * @param int $take
     *
     * @return Collection;
     */
    public static function feed(User $user, $take = 50): Collection
    {
        return static::where('user_id', $user->id)
            ->latest()
            ->with('subject')
            ->take($take)
            ->get()
            ->groupBy(function ($activity) {
                return $activity->created_at->format('Y-m-d');
            });
    }
}
