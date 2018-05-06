<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            //Unique
            $table->increments('id');

            //All this are useful for location algorithms
            $table->string('country')->nullable();
            $table->string('county_or_state')->nullable();
            $table->string('city')->nullable();
            $table->string('street_address')->nullable();
            $table->string('landmarks')->nullable(); //will be separated by spaces (has no danger)

            //Geo-location
            $table->string('latitude');
            $table->string('longitude');

            //polymorphic relationship
            $table->morphs('locatable');

            //Record Metadata fields
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('modified_by');
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
        Schema::dropIfExists('locations');
    }
}
