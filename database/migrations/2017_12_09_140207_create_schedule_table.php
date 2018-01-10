<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mkb_schedule', function (Blueprint $table) {
            $table->increments('schedule_id');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')
                            ->references('customer_id')->on('mkb_customer')
                            ->onDelete('cascade');
            $table->integer('schedule_attender_id')->unsigned();
            $table->foreign('schedule_attender_id')
                            ->references('user_id')->on('mkb_users')
                            ->onDelete('cascade');
            $table->integer('schedule_creater_id')->unsigned();
            $table->foreign('schedule_creater_id')
                            ->references('user_id')->on('mkb_users')
                            ->onDelete('cascade');
            $table->string('schedule_report_latitude');
            $table->string('schedule_report_longitude');
            $table->string('schedule_report_sale_value');
            $table->string('schedule_report_collection');
            $table->string('schedule_report_notes');
            $table->string('schedule_description');
            $table->date('schedule_from_on');
            $table->date('schedule_to_on');
            $table->timestamp('schedule_reported_on');
            $table->integer('schedule_status');
            $table->string('visit_photos');
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
        Schema::dropIfExists('mkb_schedule');
    }
}
