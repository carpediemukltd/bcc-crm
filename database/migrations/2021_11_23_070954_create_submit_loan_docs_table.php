<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmitLoanDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submit_loan_docs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_lead_id');
            $table->text('loan_doc_signature')->nullable();
          
            $table->enum('status', [
                'active',
                'inactive',
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
        Schema::dropIfExists('submit_loan_docs');
    }
}
