<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_first_name')->nullable();
            $table->string('student_last_name')->nullable();
            $table->string('student_id'); 
            $table->string('username')->nullable(); 
            $table->string('password')->nullable(); 
            $table->integer('departments_id')->unsigned();
            $table->integer('courses_id')->unsigned();
            $table->integer('semesters_id')->unsigned();
            $table->integer('divisions_id')->unsigned();
            $table->integer('districts_id')->unsigned();
            $table->integer('upozilas_id')->unsigned();
            $table->string('village_name')->nullable();
            $table->string('student_email')->nullable();
            $table->string('student_mobile')->nullable();
            $table->string('student_picture')->nullable();
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
        Schema::dropIfExists('students');
    }
}
