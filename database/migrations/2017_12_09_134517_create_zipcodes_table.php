<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZipcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mkb_zipcodes', function (Blueprint $table) {
            $table->increments('zipcode_id');
            $table->integer('state_id')->unsigned();
            $table->foreign('state_id')
                            ->references('state_id')->on('mkb_states')
                            ->onDelete('cascade');
            $table->string('zipcode_name');
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
        Schema::dropIfExists('mkb_zipcodes');
    }
}
