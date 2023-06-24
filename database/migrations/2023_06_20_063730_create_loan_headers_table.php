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
      Schema::create('loan_headers', function (Blueprint $table) {
         $table->id();
         $table->uuid('user_id')->constrained('users');
         $table->foreignId('status_id')->default('0');
         $table->timestamp('loan_date')->useCurrent();
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
      Schema::dropIfExists('loan_headers');
   }
};
