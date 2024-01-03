<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableDocumentManagersAddColumnDocumentGroupId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('document_managers', function (Blueprint $table) {
            $table->unsignedBigInteger('document_group_id')->nullable(false)->default(1);
            $table->foreign('document_group_id')->references('id')->on('document_groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('document_managers', function (Blueprint $table) {
            $table->dropColumn('document_group_id');
        });
    }
}
