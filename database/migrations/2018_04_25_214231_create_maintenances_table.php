<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenances', function (Blueprint $table) {
            //Unique
            $table->increments('id');
            $table->unsignedInteger('user_id'); //Person who made the claim
            $table->unsignedInteger('unit_id');

            /**
             * Status can be
             *  1) Very Bad
             *  2) Bad
             *  3) Medium
             *  4) Good
             *  5) Very Good
             *
            */
            $table->unsignedInteger('overall_status');
            $table->string('overall_description');
            $table->unsignedInteger('wall_status');
            $table->string('wall_description');
            $table->unsignedInteger('floor_status');
            $table->string('floor_description');
            $table->unsignedInteger('window_status');
            $table->string('window_description');
            $table->unsignedInteger('plumbing_status');
            $table->string('plumbing_description');
            $table->unsignedInteger('electricity_status');
            $table->string('electricity_description');
            $table->unsignedInteger('other_status');
            $table->string('other_description');

            //Record Metadata fields
            $table->unsignedInteger('created_by'); //Can help us retrieve the user that created it.
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
        Schema::dropIfExists('maintenances');
    }
}
