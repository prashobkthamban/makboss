<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTargetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mkb_target', function (Blueprint $table) {
            $table->increments('target_id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                            ->references('user_id')->on('mkb_users')
                            ->onDelete('cascade');
            $table->integer('target_creater_id')->unsigned();
            $table->foreign('target_creater_id')
                            ->references('user_id')->on('mkb_users')
                            ->onDelete('cascade');
            $table->integer('target_modifier_id')->unsigned();
            $table->foreign('target_modifier_id')
                            ->references('user_id')->on('mkb_users')
                            ->onDelete('cascade');
            $table->string('target_amount');
            $table->date('target_from_on');
            $table->date('target_to_on');
            $table->integer('target_status');
            $table->integer('delete_status');
            $table->timestamp('deleted_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mkb_target');
    }
}
