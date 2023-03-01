<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnFiletypeInSubmitLoanDocs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('submit_loan_docs', function (Blueprint $table) {
            $table->enum('file_type', [
                'loan',
                'personal',
            ])->default('loan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('submit_loan_docs', function (Blueprint $table) {
            $table->dropColumn('file_type');
        });
    }
}
