<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mkb_customer', function (Blueprint $table) {
            $table->increments('customer_id');
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
            $table->integer('payment_terms_id')->unsigned();
            $table->foreign('payment_terms_id')
                            ->references('payment_terms_id')->on('mkb_payment_terms')
                            ->onDelete('cascade');
            $table->integer('approved_by')->unsigned()->nullable();
            $table->foreign('approved_by')
                            ->references('user_id')->on('mkb_users')
                            ->onDelete('cascade');
            $table->timestamp('approved_on')->nullable();
            $table->integer('customer_creator_id')->unsigned();
            $table->foreign('customer_creator_id')
                            ->references('user_id')->on('mkb_users')
                            ->onDelete('cascade');
            $table->integer('customer_assigner_id')->unsigned();
            $table->foreign('customer_assigner_id')
                            ->references('user_id')->on('mkb_users')
                            ->onDelete('cascade');
            $table->integer('customer_assigned_to_id')->unsigned();
            $table->foreign('customer_assigned_to_id')
                            ->references('user_id')->on('mkb_users')
                            ->onDelete('cascade');
            $table->string('customer_name');
            $table->string('customer_contact_name');
            $table->string('customer_email');
            $table->string('customer_mobile');
            $table->string('customer_telephone');
            $table->string('customer_address');
            $table->string('customer_credit_limit');
            $table->string('customer_latitude');
            $table->string('customer_longitude');
            $table->timestamp('customer_last_blocked_on');
            $table->timestamp('customer_last_deleted_on');
            $table->timestamp('customer_payment_terms_id_modified_on');
            $table->timestamp('customer_credit_limit_modified_on');
            $table->integer('customer_status');
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
        Schema::dropIfExists('mkb_customer');
    }
}
