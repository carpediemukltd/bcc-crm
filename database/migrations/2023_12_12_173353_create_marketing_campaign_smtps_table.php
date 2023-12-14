<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketingCampaignSmtpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketing_campaign_smtps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('custom_smtp_id');
            $table->unsignedBigInteger('marketing_campaign_id');
            $table->softDeletes();
            $table->timestamps();

            // relations
            $table->foreign('custom_smtp_id')->references('id')->on('custom_smtps')->onDelete('cascade');
            $table->foreign('marketing_campaign_id')->references('id')->on('marketing_campaigns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marketing_campaign_smtps');
    }
}
