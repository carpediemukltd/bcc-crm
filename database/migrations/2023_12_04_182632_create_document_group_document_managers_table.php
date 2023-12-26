<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentGroupDocumentManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_group_document_manager', function (Blueprint $table) {
            $table->unsignedBigInteger('document_group_id');
            $table->unsignedBigInteger('document_manager_id');
            $table->timestamps();

            $table->foreign('document_group_id')->references('id')->on('document_groups')->onDelete('cascade');
            $table->foreign('document_manager_id')->references('id')->on('document_managers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_group_document_manager');
    }
}
