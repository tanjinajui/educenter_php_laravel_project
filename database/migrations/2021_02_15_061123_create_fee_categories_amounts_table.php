<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeCategoriesAmountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_categories_amounts', function (Blueprint $table) {
            $table->id();
            $table->string('student_first_name');
            $table->string('student_last_name');
            $table->string('student_email');
            $table->integer('fee_categories_id');
            $table->string('dates');
            $table->integer('years_id');
            $table->string('months_id')->nullable();
           

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
        Schema::dropIfExists('fee_categories_amounts');
    }
}
