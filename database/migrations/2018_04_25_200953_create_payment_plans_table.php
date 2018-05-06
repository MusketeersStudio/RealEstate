<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_plans', function (Blueprint $table) {
            //Unique
            $table->increments('id');

            $table->integer('deposit');
            $table->integer('monthly_price');
            $table->integer('water_deposit')->nullable();
            $table->integer('electricity_deposit')->nullable();
            $table->integer('agent_payment')->nullable();
            $table->integer('other_payment')->nullable();

            //polymorphic relationship
            $table->morphs('payable');

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
        Schema::dropIfExists('payment_plans');
    }
}
