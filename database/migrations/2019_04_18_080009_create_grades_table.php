<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lecture_id');
            $table->unsignedBigInteger('student_id');
            $table->integer('grade');
            $table->timestamps();

            $table->foreign('lecture_id')
                  ->references('id')
                  ->on('lectures')
                  ->onDelete('cascade'); // jei trinsit lectures, issitrins ir grades

            $table->foreign('student_id')
                  ->references('id')
                  ->on('students')
                  ->onDelete('cascade'); // jei trinsit lectures, issitrins ir grades
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grades');
    }
}
