<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_imports', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->string('file_original_name');
            $table->unsignedBigInteger('added_by');
            $table->integer('records')->default(0);
            $table->integer('records_imported')->default(0);
            $table->integer('duplicate_records')->default(0);
            $table->integer('company_id');
            $table->enum('status', ['inprogress', 'partially_imported', 'completed', 'failed', 'stopped', 'pending'])->default('pending');
            $table->enum('is_file_deleted', ['1', '0'])->default('0')->comment('1=file deleted, 0=file exists');
            $table->timestamps();
            $table->foreign('added_by')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_imports');
    }
}
