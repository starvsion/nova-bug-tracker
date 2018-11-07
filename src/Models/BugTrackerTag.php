<?php

namespace Starvsion\NovaBugTracker\Models;

use Illuminate\Database\Eloquent\Model;

    class BugTrackerTag extends Model
    {
        public function __construct(array $attributes = [])
        {
            parent::__construct($attributes);
            $this->table = config('bug_tracker.table_prefix', 'bug_tracker').'_tags';
        }
    }
