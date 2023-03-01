<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTodaysdateColToPreliminaryApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('preliminary_applications', function (Blueprint $table) {
            $table->string('todaysdate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('preliminary_applications', function (Blueprint $table) {
            $table->dropIfExists('todaysdate');
        });
    }
}
