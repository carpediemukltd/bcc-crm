<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsInDeals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deals', function (Blueprint $table) {
            $table->string('depositing_institution');
            $table->string('state');
            $table->string('submitted_bank');
            $table->string('sub_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deals', function (Blueprint $table) {
            $table->dropColumn('depositing_institution');
            $table->dropColumn('state');
            $table->dropColumn('submitted_bank');
            $table->dropColumn('sub_type');
        });
    }
}
