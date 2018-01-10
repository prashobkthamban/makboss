<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    /*
        user_status 0 -> user blocked
                    1 -> user active
    */
    public function up()
    {
        Schema::create('mkb_users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')
                            ->references('company_id')->on('mkb_company')
                            ->onDelete('cascade');
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
            $table->integer('role_id')->unsigned()->nullable();
            $table->foreign('role_id')
                            ->references('role_id')->on('mkb_role')
                            ->onDelete('cascade');
            $table->integer('user_creater_id')->unsigned()->nullable();
            $table->foreign('user_creater_id')
                            ->references('user_id')->on('mkb_users')
                            ->onDelete('cascade');
            $table->integer('user_assigner_id')->unsigned()->nullable();
            $table->foreign('user_assigner_id')
                            ->references('user_id')->on('mkb_users')
                            ->onDelete('cascade');
            $table->integer('user_assign_to_id')->unsigned()->nullable();
            $table->foreign('user_assign_to_id')
                            ->references('user_id')->on('mkb_users')
                            ->onDelete('cascade');
            $table->string('user_firstname');
            $table->string('user_lastname')->nullable();
            $table->string('user_email');
            $table->string('user_mobile');
            $table->string('user_telephone');
            $table->string('user_address');
            $table->string('user_latitude');
            $table->string('user_longitude');
            $table->string('username');
            $table->string('password');
            $table->string('user_image');
            $table->string('user_key');
            $table->date('user_last_blocked_on')->nullable();
            $table->date('user_last_deleted_on')->nullable();
            $table->integer('user_role');
            $table->integer('user_status');
            $table->string('block_string')->nullable();
            $table->integer('show_status');
            $table->timestamp('blocked_on')->nullable();
            $table->integer('delete_status');
            $table->timestamp('deleted_at')->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->foreign('deleted_by')
                            ->references('user_id')->on('mkb_users')
                            ->onDelete('cascade');
            $table->integer('modified_by')->unsigned()->nullable();
            $table->foreign('modified_by')
                            ->references('user_id')->on('mkb_users')
                            ->onDelete('cascade');
            $table->integer('blocked_by')->unsigned()->nullable();
            $table->foreign('blocked_by')
                            ->references('user_id')->on('mkb_users')
                            ->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('mkb_users');
    }
}
