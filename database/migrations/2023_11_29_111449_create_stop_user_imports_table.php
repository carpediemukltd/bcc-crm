<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStopUserImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stop_user_imports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_imports_id');
            $table->timestamps();
            $table->foreign('user_imports_id')->references('id')->on('user_imports');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stop_user_imports');
    }
}
