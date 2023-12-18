<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketingCampaignSequencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketing_campaign_sequences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('marketing_campaign_id');
            $table->integer('wait_for')->default(1);
            $table->string('subject');
            $table->text('body');
            $table->enum('status', [
                'inactive',
                'active',
                'completed',
                'deleted',
            ])->default('inactive');
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
        Schema::dropIfExists('marketing_campaign_sequences');
    }
}
