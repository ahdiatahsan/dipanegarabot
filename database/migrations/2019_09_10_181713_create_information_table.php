<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('body');
            $table->unsignedInteger('information_category_id');
            $table->unsignedInteger('file_id')->nullable();
            $table->timestamps();

            $table->foreign('information_category_id')->references('id')->on('information_categories')->onDelete('cascade');
            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('information', function (Blueprint $table) {
            $table->dropForeign('information_category_id');
            $table->dropForeign('file_id');
        });
    }
}
