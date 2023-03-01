<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnHubspotContactIdInPreliminaryOwners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('preliminary_owners', function (Blueprint $table) {
            $table->string('hubspot_con_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('preliminary_owners', function (Blueprint $table) {
            $table->dropIfExists('hubspot_con_id');
        });
    }
}
