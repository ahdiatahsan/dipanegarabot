<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('room_id');
            $table->unsignedInteger('lecture_hour_id');
            $table->unsignedInteger('lecturer_id');
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('status');
            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreign('lecture_hour_id')->references('id')->on('lecture_hours')->onDelete('cascade');
            $table->foreign('lecturer_id')->references('id')->on('lecturers')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lectures', function (Blueprint $table) {
            $table->dropForeign('room_id');
            $table->dropForeign('lecture_hour_id');
            $table->dropForeign('lecturer_id');
            $table->dropForeign('course_id');
        });
    }
}
