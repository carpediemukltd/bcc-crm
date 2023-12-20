<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketingCampaignUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketing_campaign_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('marketing_campaign_id');
            $table->enum('email_verified', ['0', '1'])->default('0');
            $table->enum('email_sent', ['0', '1'])->default('0');
            $table->enum('email_failed', ['0', '1'])->default('0');
            $table->enum('email_opened', ['0', '1'])->default('0');
            $table->enum('email_bounced', ['0', '1'])->default('0');
            $table->string('uuid')->nullable();
            $table->timestamps();
            // relations
            $table->foreign('marketing_campaign_id')->references('id')->on('marketing_campaigns')->onDelete('no action');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marketing_campaign_users');
    }
}
