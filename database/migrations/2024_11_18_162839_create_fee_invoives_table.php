<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeInvoivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_invoives', function (Blueprint $table) {
            $table->id();
            $table->date('invoice_date');
            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Grade_id')->constrained('grades')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('Classroom_id')->constrained('classrooms')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('fee_id')->constrained('fees')->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('amount', 10, 2);
            $table->longText('description')->nullable();
            $table->timestamps();




            // $table->id();
            // $table->date('invoice_date');
            // $table->foreignId('student_id')->references('id')->on('students')->onDelete('cascade');
            // $table->foreignId('Grade_id')->references('id')->on('Grades')->onDelete('cascade');
            // $table->foreignId('Classroom_id')->references('id')->on('Classrooms')->onDelete('cascade');
            // $table->foreignId('fee_id')->references('id')->on('fees')->onDelete('cascade');
            // $table->decimal('amount',8,2);
            // $table->string('description')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fee_invoives');
    }
}