<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOcrolusBookLevelFraudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocrolus_book_level_fraud', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('document_id');
            $table->longText('fraud');
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('no action');
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
        Schema::dropIfExists('ocrolus_book_level_fraud');
    }
}
