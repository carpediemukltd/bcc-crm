<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomLeadLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_lead_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_lead_id');
            $table->unsignedBigInteger('loan_lead_detail_id')->nullable();
            $table->text('exception')->nullable();
            $table->string('type')->nullable();
            $table->enum('status', [
                'succeeded',
                'failed',
                'deleted',
            ])->default('succeeded');
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
        Schema::dropIfExists('custom_lead_logs');
    }
}
