<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_types', function (Blueprint $table) {
            //Unique
            $table->increments('id');

            $table->string('size')->nullable();
            $table->unsignedInteger('bedrooms')->nullable();
            $table->unsignedInteger('bathrooms')->nullable();
            $table->unsignedInteger('kitchens')->nullable();
            $table->unsignedInteger('sitting_rooms')->nullable();
            $table->unsignedInteger('car_spaces')->nullable();

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
        Schema::dropIfExists('unit_types');
    }
}
