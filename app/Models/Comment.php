<?php

namespace App\Models;

use App\Models\Traits\RecordsActivity;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory, RecordsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body',
        'post_id',
        'user_id'
    ];

    /**
     * A comment belongs to a user.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A comment belongs to a post.
     *
     * @return BelongsTo
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Determine if the comment was just published a moment ago.
     *
     * @return bool
     */
    public function wasJustPublished(): bool
    {
        return $this->created_at->gt(Carbon::now()->subMinute());
    }

    /**
     * Convert created at to timestamps.
     *
     * @return int
     */
    public function getCreatedAtTimestampAttribute(): int
    {
        return $this->created_at->timestamp;
    }

    /**
     * Convert updated at to timestamps.
     *
     * @return int
     */
    public function getUpdatedAtTimestampAttribute(): int
    {
        if($this->updated_at)
            return $this->updated_at->timestamp;
        else
            return 0;
    }

    /**
     * Return the created at in diff for humans format
     *
     * @return mixed
     */
    public function getCreatedAtDateAttribute() {
        return $this->created_at->diffForHumans();
    }
}
