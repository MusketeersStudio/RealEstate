<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leases', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('unit_id');
            $table->unsignedInteger('tenant_id');
            $table->unsignedInteger('payment_details_id');
            /**
             * Lease can be
             * - Paid
             * - Not paid
             * - terminated
             * - suspended -: not fully terminated
             *
            */
            $table->unsignedInteger('status');

            $table->timestamp('duration');
            $table->date('start_date');
            $table->date('end_date');

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
        Schema::dropIfExists('leases');
    }
}
