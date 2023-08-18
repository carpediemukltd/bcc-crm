<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOcrolusBookSummaryCalculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocrolus_book_summary_calculations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('bank_account');
            $table->string('bank_name');
            $table->date('date');
            $table->decimal('begin_balance', 14, 2)->default(0);
            $table->decimal('end_balance', 14, 2)->default(0);
            $table->decimal('negative_days_count', 14, 2)->default(0);
            $table->decimal('transfers_and_funding', 14, 2)->default(0);
            $table->decimal('net_deposit', 14, 2)->default(0);
            $table->decimal('deposit_sum', 14, 2)->default(0);
            $table->decimal('deposit_count', 14, 2)->default(0);
            $table->decimal('average_daily_balance', 14, 2)->default(0);
            $table->decimal('wire_transfer_inflows_by_month', 14, 2)->default(0);
            $table->decimal('internal_transfer_inflows_by_month', 14, 2)->default(0);
            $table->decimal('truck_stop_inflows_by_month', 14, 2)->default(0);
            $table->decimal('other_transfer_inflows_by_month', 14, 2)->default(0);
            $table->decimal('merchant_service_transfer_inflows_by_month', 14, 2)->default(0);
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
        Schema::dropIfExists('ocrolus_book_summary_calculations');
    }
}
