<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_managers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('pass');
            $table->string('tel');
            $table->string('alt_tel');
            $table->string('national_id');

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
        Schema::dropIfExists('property_managers');
    }
}
