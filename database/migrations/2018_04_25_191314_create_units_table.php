<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            //Unique
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('property_id');
            $table->unsignedInteger('unit_type_id');
            /**
             * Unit can be
             * - available/empty
             * - under-Maintenance
             * - accommodated
             * - destroyed/no longer viable
             */
            $table->unsignedInteger('status');

            $table->string('description')->nullable();
            $table->string('name');


            //Record Metadata fields
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
        Schema::dropIfExists('units');
    }
}
