<?php

namespace App\Models\Traits;

use App\Models\Activity;
use ReflectionException;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait RecordsActivity
{
    /**
     * Boot the trait.
     */
    protected static function bootRecordsActivity()
    {
        if (auth()->guest()) return;

        foreach (static::getActivitiesToRecord() as $event) {
            static::$event(function ($model) use ($event) {
                $model->recordActivity($event);
            });
        }
    }

    /**
     * Fetch all model events that require activity recording.
     *
     * @return array
     */
    protected static function getActivitiesToRecord(): array
    {
        return ['created', 'deleting'];
    }

    /**
     * Record new activity for the model.
     *
     * @param string $event
     */
    protected function recordActivity(string $event)
    {
        $this->activity()->create([
            'user_id' => auth()->id(),
            'type' => $this->getActivityType($event)
        ]);
    }

    /**
     * Fetch the activity relationship.
     *
     * @return MorphMany
     */
    public function activity(): MorphMany
    {
        return $this->morphMany(Activity::class, 'subject');
    }

    /**
     * Determine the activity type.
     *
     * @param string $event
     * @return string
     */
    protected function getActivityType(string $event): string
    {
        $type = strtolower((new \ReflectionClass($this))->getShortName());

        return "{$event}_{$type}";
    }
}
