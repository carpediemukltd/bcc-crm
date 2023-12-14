<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketingCampaignReportingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketing_campaign_reportings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('marketing_campaign_sequence_id');
            $table->unsignedBigInteger('custom_smtp_id');
            $table->enum('email_sent', [0,1])->default(0);
            $table->dateTime('sent_date')->nullable();
            $table->text('sent_data')->nullable();
            $table->enum('email_open', [0,1])->default(0);
            $table->dateTime('opened_date')->nullable();
            $table->text('open_data')->nullable();
            $table->enum('email_failed', [0,1])->default(0);
            $table->text('failed_data')->nullable();
            $table->enum('email_verified', [0,1])->default(0);
            $table->enum('bounced', ['1', '0'])->default('0');
            $table->timestamps();
            //relations 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('marketing_campaign_sequence_id', 'fk_campaign_sequence_id')->references('id')->on('marketing_campaign_sequences')->onDelete('cascade');
            $table->foreign('custom_smtp_id')->references('id')->on('custom_smtps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marketing_campaign_reportings');
    }
}
