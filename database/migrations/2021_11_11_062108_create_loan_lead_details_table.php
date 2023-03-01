<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanLeadDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_lead_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_lead_id');
            $table->string('business_duration')->nullable();
            $table->text('business_location')->nullable();
            $table->string('business_location_suit')->nullable();
            $table->string('entity_type')->nullable();
            $table->string('owner_us_citizen')->nullable();
            $table->string('is_your_revenue_more_than_150k')->nullable();
            $table->string('is_your_fico_score_above_650')->nullable();
            $table->string('is_your_business_profitable_or_break_even')->nullable();
            $table->string('are_your_clients_consumers_or_businesses')->nullable();
            $table->string('do_you_have_commercial_accounts_receivables')->nullable();
            $table->string('describe_your_business')->nullable();
            $table->text('what_type_of_credit_facility_are_you_seeking')->nullable();
            $table->text('tangible_assets')->nullable();
            $table->text('longterm_liabilities')->nullable();
            $table->text('eligibility_result')->nullable();
            $table->enum('status', [
                'completed',
                'active',
                'deleted',
            ])->default('active');
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
        Schema::dropIfExists('loan_lead_details');
    }
}
