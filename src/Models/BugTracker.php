<?php

    namespace Starvsion\NovaBugTracker\Models;

    use Illuminate\Database\Eloquent\Model;

    class BugTracker extends Model
    {

        protected $casts = [
            'tags' => 'array'
        ];

        public function __construct(array $attributes = [])
        {
            parent::__construct($attributes);
            $this->table = config('bug_tracker.table_prefix', 'bug_tracker').'_s';
        }

        public function tags ()
        {
            return $this->hasMany(BugTrackerTag::class)
                ->using(BugTag::class);
        }
    }