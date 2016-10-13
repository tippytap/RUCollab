<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('message_id');
            $table->increments('user_id');
            $table->increments('group_id');
            $table->dateTime('time_created');
            $table->string('message_string');
            
            /** keys */
            $table->foreign('user_id')
            ->references('user_id')->on('users')
            ->onDelete('cascade');
            $table->foreign('group_id')
            ->references('group_id')->on('groups')
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
        Schema::drop('messages');
    }
}
