<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBankColumnsToInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {

            $table->string('bank_name')->nullable()->after('bank_details');
            $table->string('bank_city')->nullable()->after('bank_details');
            $table->string('account_title')->nullable()->after('bank_details');
            $table->string('iban')->nullable()->after('bank_details');
            $table->string('account_number')->nullable()->after('bank_details');
            $table->string('swift_code')->nullable()->after('bank_details');
            $table->string('paypal_id')->nullable()->after('bank_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
