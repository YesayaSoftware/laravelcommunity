<?php

namespace App\Filters;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class PostFilters extends Filters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected array $filters = ['by', 'popular', 'unanswered'];

    /**
     * Filter the query by a given username.
     *
     * @param string $username
     *
     * @return Builder
     */
    protected function by(string $username): Builder
    {
        $user = User::where('name', $username)->firstOrFail();

        return $this->builder->where('user_id', $user->id);
    }

    /**
     * Filter the query according to most popular posts.
     *
     * @return Builder
     */
    protected function popular(): Builder
    {
        $this->builder->getQuery()->orders = [];

        return $this->builder->orderBy('comment_count', 'desc');
    }

    /**
     * Filter the query according to those that are unanswered.
     *
     * @return Builder
     */
    protected function unanswered(): Builder
    {
        return $this->builder->where('comment_count', 0);
    }
}
