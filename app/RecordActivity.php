<?php


namespace App;


trait RecordActivity
{
    protected static function bootRecordsActivity()
    {
        if (auth()->guest()) return;

        foreach (static::getActivitiesToRecord() as $event) {
            static::$event(function ($model) use ($event) {
                $model->recordActivity($event);
            });
        }

    }

    protected function recordActivity($event)
    {
        $this->activity()->create([
            'user_id' => auth()->id(),
            'type' => $this->getActivityType($event)
        ]);
    }

    /**
    +     * Fetch all model events that require activity recording.
    +     *
    +     * @return array
    +     */
    protected static function getActivitiesToRecord()
    {
        return ['created'];
    }

    public function activity()
    {

        return $this->morphMany('App\Activity','subject');

    }

    protected function getActivityType($event)
    {
        $type = strtolower((new \ReflectionClass($this))->getShortName());

        return "{$event}_{$type}";
    }


}