<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeColumnToOcrolusBookSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ocrolus_book_summaries', function (Blueprint $table) {
            $table->enum('type', ['statement', 'form'])->default('statement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ocrolus_book_summaries', function (Blueprint $table) {
            //
        });
    }
}
