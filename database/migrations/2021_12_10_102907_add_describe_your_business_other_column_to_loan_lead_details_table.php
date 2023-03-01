<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescribeYourBusinessOtherColumnToLoanLeadDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loan_lead_details', function (Blueprint $table) {
            $table->text('describe_your_business_other')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('loan_lead_details', function (Blueprint $table) {
            $table->dropColumn('describe_your_business_other');
            //
        });
    }
}
