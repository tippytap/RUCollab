<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->increments('user_id');
            $table->increments('task_id');
            
            /** keys */
            $table->primary(['user_id', 'task_id']);
            $table->foreign('user_id')
            ->references('user_id')->on('users')
            ->onDelete('cascade');
            $table->foreign('task_id')
            ->references('task_id')->on('tasks')
            ->onDelete('cascade');

        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('assignments');
    }
}
