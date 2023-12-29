<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketingCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketing_campaigns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('stage_id')->nullable();
            $table->string('name');
            $table->dateTime('start_date');
            $table->enum('status', [
                'draft',
                'active',
                'completed',
                'paused',
                'inprogress'
            ])->default('draft');
            $table->enum('type', [
                'automate',
                'manual'
            ])->default('manual');
            $table->string('uuid')->nullable();
            $table->softDeletes();
            $table->timestamps();
            //relations
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('no action');
            $table->foreign('stage_id')->references('id')->on('stages')->onDelete('no action');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marketing_campaigns');
    }
}
