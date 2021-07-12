<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->nullable();
            $table->dateTime('activity_date')->nullable();
            $table->string('tech_name')->nullable();
            $table->string('work_location')->nullable();
            $table->string('ticket_number')->nullable();
            $table->string('activity_description')->nullable();
            $table->string('travel_cost')->nullable();
            $table->string('working_hours')->nullable();
            $table->string('equipment_cost')->nullable();
            $table->string('total_payment')->nullable();
            $table->dateTime('invoice_date')->nullable();
            $table->string('bank_details')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
