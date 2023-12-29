<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomSmtpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_smtps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('host');
            $table->string('username');
            $table->string('password');
            $table->integer('port');
            $table->string('encryption_type');
            $table->string('reply_to');
            $table->string('username_display');
            $table->softDeletes();
            $table->timestamps();

            // relations
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_smtps');
    }
}
