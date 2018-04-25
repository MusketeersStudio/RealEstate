<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            //Unique
            $table->increments('id');
            $table->unsignedInteger('manager_id');
            /**
             * Properties can be
             * - operational
             * - under-Maintenance -: whole building under maintenance
             * - inactive -: no sells or money coming through for a specific time
             * - destroyed/no longer viable
             */
            $table->unsignedInteger('status');
            $table->unsignedInteger('property_type_id');

            $table->string('name');
            $table->string('description')->nullable();
            $table->string('unit_prefix');
            $table->string('total_units');

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
        Schema::dropIfExists('properties');
    }
}
