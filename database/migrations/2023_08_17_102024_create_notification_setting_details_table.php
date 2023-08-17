<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationSettingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_setting_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('notification_settings_id');
            $table->unsignedBigInteger('stage_id');
            $table->foreign('notification_settings_id')->references('id')->on('notification_settings')->onDelete('cascade'); 
            $table->foreign('stage_id')->references('id')->on('stages')->onDelete('cascade'); 
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
        Schema::dropIfExists('notification_setting_details');
    }
}
