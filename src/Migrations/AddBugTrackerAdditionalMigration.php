<?php

    namespace Starvsion\NovaBugTracker\Migration;

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;

    class AddBugTrackerMigration
    {
        private $prefix;

        public function __construct()
        {
            $this->prefix = config('bug_tracker.table_name', 'bug_tracker');
        }

        public function up()
        {
            Schema::create($this->prefix . '_bug_tags', function (Blueprint $table) {

                $table->unsignedBigInteger('bug_tracker_id');
                $table->unsignedBigInteger('tag_id');

                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists($this->prefix . '_bug_tags');
        }
    }