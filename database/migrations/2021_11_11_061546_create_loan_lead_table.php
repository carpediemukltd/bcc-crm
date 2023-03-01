<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanLeadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_leads', function (Blueprint $table) {
            $table->id();
            $table->string('loan_type');
            $table->string('loan_type_sub');
            $table->string('loan_amount');
            $table->string('monthly_payment');
            $table->string('loan_term');
            $table->string('interest_rate');
            $table->string('apr_with_fees')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('business');
            $table->string('promo')->nullable();
            $table->string('referral_source');
            $table->string('ghl_contact_id')->nullable();
            $table->string('hubspot_contact_id')->nullable();
            $table->string('hubspot_deal_id')->nullable();            
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
        Schema::dropIfExists('loan_leads');
    }
}
