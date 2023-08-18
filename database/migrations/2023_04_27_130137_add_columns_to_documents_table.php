<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->enum('ocrolus_document_status', ['0', '1'])->default('0')->comment('0=PROCESSING, 1=COMPLETED');
            $table->enum('ocrolus_status', ['0', '1'])->default('0')->comment('0=pending, 1=posted to ocrolus');
            $table->string('ocrolus_mixed_doc_id')->nullable();
            $table->string('ocrolus_mixed_doc_pk')->nullable();
            $table->string('ocrolus_mixed_doc_uuid')->nullable();
            $table->integer('ocrolus_doc_page_count')->define(0);
            $table->string('ocrolus_book_uuid')->nullable();
            $table->unsignedBigInteger('ocrolus_book_pk')->nullable();
            $table->string('ocrolus_doc_verification_status')->nullable();
            $table->index(['ocrolus_status', 'ocrolus_document_status']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents', function (Blueprint $table) {
            //
        });
    }
}
