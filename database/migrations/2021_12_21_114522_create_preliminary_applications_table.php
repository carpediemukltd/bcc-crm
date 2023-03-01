<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreliminaryApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preliminary_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_lead_id');
            $table->string('business_number')->nullable();
            $table->string('business_start_date')->nullable();
            $table->string('monthly_revenue')->nullable();
            $table->string('tax_id_number')->nullable();
            $table->string('cc_percentage_deposit')->nullable();
            $table->string('existing_loan_advance')->nullable();
            $table->string('liens')->nullable();
            $table->string('rent_or_own')->nullable();
            $table->string('owner_ssn')->nullable();
            $table->string('owner_home_address')->nullable();
            $table->string('ownership_percent')->nullable();
            $table->string('owner_estimated_fico_score')->nullable();
            $table->string('owner_dob')->nullable();
            $table->string('second_owner_first_name')->nullable();
            $table->string('second_owner_last_name')->nullable();
            $table->string('second_owner_phone')->nullable();
            $table->string('second_owner_email')->nullable();
            $table->string('second_owner_ssn')->nullable();
            $table->string('second_owner_address')->nullable();
            $table->string('second_owner_ownership_percent')->nullable();
            $table->string('second_owner_fico_score')->nullable();
            $table->string('second_owner_dob')->nullable();
            $table->string('collateral')->nullable();
            $table->string('collateral_type')->nullable();
            $table->string('total_estimated_value')->nullable();
            $table->string('total_estimated_debt_amount')->nullable();
            $table->text('owner_signature')->nullable();
            $table->text('second_owner_signature')->nullable();
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
        Schema::dropIfExists('preliminary_applications');
    }
}
