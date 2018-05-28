<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $guarded = [];

    /**
         * Fetch the associated subject for the activity.
         *
         * @return \Illuminate\Database\Eloquent\Relations\MorphTo
         */
    public function subject()
    {
        return $this->morphTo();
    }

}
