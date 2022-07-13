<?php

namespace App\Models;

use App\Models\Traits\RecordsActivity;
use App\Models\Traits\Thumbnail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Newsletter extends Model
{
    use HasFactory, RecordsActivity, Thumbnail;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'title',
        'body',
        'thumbnail',
        'user_id',
        'status'
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($newsletter) {
            $newsletter->update(['slug' => $newsletter->title]);
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
     * Get a string path for the thread.
     *
     * @return string
     */
    public function path(): string
    {
        return route('newsletter.show', $this->slug);
    }

    /**
     * A newsletter belongs to a user.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
