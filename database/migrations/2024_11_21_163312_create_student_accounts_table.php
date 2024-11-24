<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAccountsTable extends Migration
{

    public function up()
    {
        Schema::create('student_accounts', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('type');

            $table->foreignId('fee_invoice_id')->nullable()->references('id')->on('fee_invoives')->onDelete('cascade');
            $table->foreignId('receipt_id')->nullable()->references('id')->on('receipt_students')->onDelete('cascade');
            $table->foreignId('processing_id')->nullable()->references('id')->on('processing_fees')->onDelete('cascade');
            $table->foreignId('payment_id')->nullable()->references('id')->on('payments')->onDelete('cascade');

            $table->foreignId('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->decimal('Debit', 10, 2)->nullable();
            $table->decimal('credit', 10, 2)->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_accounts');
    }
}
