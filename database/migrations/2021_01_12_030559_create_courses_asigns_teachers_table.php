<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesAsignsTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_asigns_teachers', function (Blueprint $table) {
            $table->id();
            $table->integer('departments_id')->unsigned();
            $table->integer('courses_id')->unsigned();
            $table->integer('teachers_id')->unsigned();
            $table->string('semesters_id')->nullable();
            $table->integer('total_course_credit')->unsigned();
            $table->integer('semester_course_credit')->unsigned();
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
        Schema::dropIfExists('courses_asigns_teachers');
    }
}
