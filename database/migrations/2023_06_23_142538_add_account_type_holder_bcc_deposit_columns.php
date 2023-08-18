<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAccountTypeHolderBccDepositColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ocrolus_book_summary_calculations', function (Blueprint $table) {
            $table->string('account_type')->nullable();
            $table->string('account_holder')->nullable();
            $table->decimal('bcc_net_deposit', 14, 2)->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ocrolus_book_summary_calculations', function (Blueprint $table) {
            //
        });
    }
}
