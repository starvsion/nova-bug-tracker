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
            Schema::create($this->prefix . 's', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id');
                $table->string('title');
                $table->string('tags')->nullable();
                $table->longText('description');
                $table->longText('steps_to_reproduce');
                $table->longText('expected_result');
                //will add custom status to next update
                $table->integer('priority')->default(1);
                $table->string('severity');
                $table->enum('status',
                    ['Pending', 'In Progress', 'Fixed', 'Icebox', 'Rejected', 'Won\'t Fix'])
                    ->default('Pending');
                $table->longText('attachment')->nullable();

                //Issue (such as github issue, pivotal tracker issue etc.) URL
                $table->longText('issue_url')->nullable();
                $table->string('product')->nullable();
                //in which feature/module
                $table->string('component')->nullable();
                //either the OS , or the web agent
                $table->string('platform')->nullable();

                //in what version
                $table->string('version')->nullable();
            });

            Schema::create($this->prefix . '_tags', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
            });
        }

        public function down()
        {
            Schema::dropIfExists($this->prefix.'s');
            Schema::dropIfExists($this->prefix.'_tags');

        }
    }