<?php

namespace App\Models\Traits;

use App\Models\Favorite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Favoritable
{
    /**
     * Boot the trait.
     */
    protected static function bootFavoritable()
    {
        static::deleting(function ($model) {
            $model->favorites->each->delete();
        });
    }

    /**
     * An item can be favored.
     *
     * @return MorphMany
     */
    public function favorites(): MorphMany
    {
        return $this->morphMany(Favorite::class, 'favorited')->setEagerLoads([]);
    }

    /**
     * Favorite the current item.
     *
     * @return Model
     */
    public function favorite(): Model
    {
        $attributes = ['user_id' => auth()->id()];

        if (!$this->favorites()->where($attributes)->exists()) {
            return $this->favorites()->create($attributes);
        }
    }

    /**
     * Unfavorite the current item.
     */
    public function unfavorite()
    {
        $attributes = ['user_id' => auth()->id()];

        $this->favorites()->where($attributes)->get()->each->delete();
    }

    /**
     * Determine if the current item has been favorited.
     *
     * @return boolean
     */
    public function isFavorited(): bool
    {
        return !!$this->favorites->where('user_id', auth()->id())->count();
    }

    /**
     * Fetch the favorited status as a property.
     *
     * @return bool
     */
    public function getIsFavoritedAttribute(): bool
    {
        return $this->isFavorited();
    }

    /**
     * Get the number of favorites for the item.
     *
     * @return integer
     */
    public function getFavoritesCountAttribute(): int
    {
        return $this->favorites->count();
    }
}
