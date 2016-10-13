<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->increments('user_id');
            $table->increments('group_id');
            
            /** keys */
            $table->primary(['user_id', 'group_id']);
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
        Schema::drop('memberships');
    }
}
