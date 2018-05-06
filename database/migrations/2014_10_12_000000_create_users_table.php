<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            //Unique
            $table->increments('id');

            //TODO: figure all roles in the system
            /** User can be
             * - SYSTEM - default user
             * - PROPERTY MANAGER
             * - SERVICE PROVIDER
             * - TENANT
             * - ADMINISTRATOR - Guys doing the settling
             * - ...
            */
            $table->string('role');
            $table->string('sub_role')->nullable(); //for service providers

            //TODO: figure out levels of authority what they can and can't do
            /** User can be of authority
             * - SYSTEM - full authority
             * - 1
             * - 2
             * - 3
             * - ...
            */
            $table->unsignedInteger('authority');

            //TODO: figure out all status needed
            /**
             * User may be
             * - Always Available
             * - Available
             * - Unavailable
             * - Blocked - due to payment or some other stuff
             * - ...
             */
            $table->unsignedInteger('status'); //for any user that has a status

            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('pass');
            $table->string('tel')->nullable();
            $table->string('alt_tel')->nullable();
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
        Schema::dropIfExists('users');
    }
}
