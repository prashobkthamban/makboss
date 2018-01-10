<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mkb_expense', function (Blueprint $table) {
            $table->increments('expense_id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                            ->references('user_id')->on('mkb_users')
                            ->onDelete('cascade');
            $table->string('expense_amount');
            $table->timestamp('expense_date');
            $table->string('expense_note');
            $table->string('expense_photos');
            $table->integer('delete_status');
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('mkb_expense');
    }
}
