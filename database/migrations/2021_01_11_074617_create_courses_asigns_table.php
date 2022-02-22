<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesAsignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_asigns', function (Blueprint $table) {
           $table->id();
            $table->integer('departments_id')->unsigned();
            $table->integer('courses_id')->unsigned();
            $table->integer('teachers_id')->unsigned();
            $table->integer('taken_credit')->nullable();
            $table->string('course_code')->nullable();
            $table->integer('course_credit')->unsigned();
            $table->integer('semesters_id')->unsigned();
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
        Schema::dropIfExists('courses_asigns');
    }
}
