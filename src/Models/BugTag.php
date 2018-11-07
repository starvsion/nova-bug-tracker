<?php

    namespace Starvsion\NovaBugTracker\Models;

    use Illuminate\Database\Eloquent\Relations\Pivot;

    class BugTag extends Pivot
    {

        public function __construct(array $attributes = [])
        {
            parent::__construct($attributes);
            $this->table = config('bug_tracker.table_prefix', 'bug_tracker').'_s';
        }

        public function bug()
        {
            return $this->belongsTo(BugTag::class);
        }

        public function tag()
        {
            return $this->belongsTo(BugTag::class);
        }
    }