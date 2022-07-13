<?php

namespace App\Models;

use App\Models\Traits\RecordsActivity;
use App\Models\Traits\Thumbnail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
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
        'start_date',
        'end_date',
        'user_id'
    ];

    /**
     * A event belongs to a user.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
