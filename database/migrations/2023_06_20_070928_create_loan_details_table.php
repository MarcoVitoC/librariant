<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('loan_details', function (Blueprint $table) {
         $table->id();
         $table->foreignId('loan_header_id')->constrained();
         $table->foreignId('book_id')->constrained();
         $table->foreignId('status_id')->default('2');
         $table->dateTime('loan_due_date');
         $table->dateTime('loan_returned_date');
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
      Schema::dropIfExists('loan_details');
   }
};
