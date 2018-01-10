<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    /*
        company_status  0 -> company blocked
                        1 -> company active
                        2 -> on trial run
    */
    public function up()
    {
        Schema::create('mkb_company', function (Blueprint $table) {
            $table->increments('company_id');
            $table->string('company_type');
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')
                            ->references('country_id')->on('mkb_country')
                            ->onDelete('cascade');
            $table->integer('state_id')->unsigned();
            $table->foreign('state_id')
                            ->references('state_id')->on('mkb_states')
                            ->onDelete('cascade');
            $table->integer('zipcode_id')->unsigned();
            $table->foreign('zipcode_id')
                            ->references('zipcode_id')->on('mkb_zipcodes')
                            ->onDelete('cascade');
            $table->string('company_name');
            $table->string('company_website');
            $table->integer('user_quota');
            $table->integer('used_quota');
            $table->timestamp('quota_updated_on');
            $table->timestamp('company_last_deleted_on');
            $table->timestamp('company_last_blocked_on');
            $table->string('company_blocked_reason');
            $table->string('company_deleted_reason');
            $table->integer('company_status');
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
        Schema::dropIfExists('mkb_company');
    }
}
