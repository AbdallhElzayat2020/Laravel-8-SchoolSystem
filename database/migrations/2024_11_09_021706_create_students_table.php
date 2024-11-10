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
            $table->text('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->foreignId('gender_id')->references('id')->on('genders')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('nationality_id')->references('id')->on('nationalities')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('blood_id')->references('id')->on('type__bloods')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Grade_id')->references('id')->on('grades')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Classroom_id')->references('id')->on('classrooms')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('section_id')->references('id')->on('sections')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('parent_id')->references('id')->on('my__parents')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('academic_year');
            $table->date('Date_Birth');
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