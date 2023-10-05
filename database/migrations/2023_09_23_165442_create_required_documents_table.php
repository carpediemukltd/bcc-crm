<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequiredDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('required_documents', function (Blueprint $table) {
            $table->id();
            $table->string("document_name")->nullable();
            $table->string("document_type")->nullable();
            $table->string("file_group_name")->nullable();
            $table->tinyInteger("status")->default(1)->nullable()->comment("0 => file inactive not needed, 1 => active required");
            $table->bigInteger("created_by")->default(0)->nullable()->comment("who added this file requirement");
            $table->timestamps();
            $table->index("document_type");
            $table->index("file_group_name");
            $table->index("status");
            $table->index("create_by");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('required_documents');
    }
}
