<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableDocumentManagerUserAddColumnDueDateAndDocumentUploaded extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('document_manager_user', function (Blueprint $table) {
            $table->string('due_date');
            $table->tinyInteger('document_uploaded')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('document_manager_user', function (Blueprint $table) {
            $table->dropColumn('due_date');
            $table->dropColumn('document_uploaded');
        });
    }
}
