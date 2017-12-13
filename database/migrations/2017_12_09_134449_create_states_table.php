<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mkb_states', function (Blueprint $table) {
            $table->increments('state_id');
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')
                            ->references('country_id')->on('mkb_country')
                            ->onDelete('cascade');
            $table->string('state_name');
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
        Schema::dropIfExists('mkb_states');
    }
}
