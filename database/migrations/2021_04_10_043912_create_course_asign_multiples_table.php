<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseAsignMultiplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_asign_multiples', function (Blueprint $table) {
            $table->id();
            $table->string('student_first_name');
            $table->string('student_last_name');
            $table->integer('semesters_id');
            $table->integer('departments_id');
            $table->integer('courses_id');
            $table->double('full_mark');
            $table->double('pass_mark');
            $table->double('subjecting_mark');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_asign_multiples');
    }
}
