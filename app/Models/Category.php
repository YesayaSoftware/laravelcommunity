<?php

namespace App\Models;

use App\Models\Traits\RecordsActivity;
use App\Models\Traits\Thumbnail;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, RecordsActivity, Thumbnail;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'name',
        'description',
        'thumbnail',
        'user_id'
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['user'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['is_subscribed_to', 'subscription_count', 'thumbnail_url'];

    /**
     * A category belongs to a user.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    /**
     * A category has many posts.
     *
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($category) {
            $category->update([
                'slug' => $category->name
            ]);
        });
    }

    /**
     * Get the route key name for Laravel.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Set the proper slug attribute.
     *
     * @param string $value
     */
    public function setSlugAttribute(string $value)
    {
        if (static::whereSlug($slug = Str::slug($value))->exists())
            $slug = "{$slug}-{$this->id}";

        $this->attributes['slug'] = $slug;
    }

    /**
     * Subscribe a user to the current category.
     *
     * @param  int|null $userId
     *
     * @return Model
     */
    public function subscribe($userId = null): Model
    {
        $attributes = ['user_id' => $userId ?: auth()->id()];

        if (! $this->subscriptions()->where($attributes)->exists())
            return $this->subscriptions()->create($attributes);

    }

    /**
     * Unsubscribe a user from the current category.
     *
     * @param int|null $userId
     */
    public function unsubscribe($userId = null)
    {
        $subscription = $this->subscriptions()
            ->where('user_id', $userId ?: auth()->id())->first();

        Activity::where('subject_id', $subscription->id)->delete();

        $this->subscriptions()
            ->where('user_id', $userId ?: auth()->id())->delete();

    }

    /**
     * Category can have many subscriptions.
     *
     * @return HasMany
     */
    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    /**
     * Determine if the current user is subscribed to the category.
     *
     * @return boolean
     */
    public function getIsSubscribedToAttribute(): bool
    {
        return $this->subscriptions()
            ->where('user_id', auth()->id())
            ->exists();
    }

    /**
     * Count the number of subscribers to a particular category.
     *
     * @return int
     */
    public function getSubscriptionCountAttribute(): int
    {
        return $this->subscriptions()->count();
    }
}
