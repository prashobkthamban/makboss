<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutoSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mkb_auto_schedule', function (Blueprint $table) {
            $table->increments('auto_schedule_id');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')
                            ->references('customer_id')->on('mkb_customer')
                            ->onDelete('cascade');
            $table->integer('schedule_attender_id')->unsigned();
            $table->foreign('schedule_attender_id')
                            ->references('user_id')->on('mkb_users')
                            ->onDelete('cascade');
            $table->string('repeat_days'); //0-6 0-monday 6-sunday
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
        Schema::dropIfExists('mkb_auto_schedule');
    }
}
