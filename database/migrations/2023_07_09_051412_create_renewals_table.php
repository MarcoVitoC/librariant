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
      Schema::create('renewals', function (Blueprint $table) {
         $table->id();
         $table->foreignUuid('user_id');
         $table->foreignId('loan_detail_id')->constrained();
         $table->dateTime('renewal_date');
         $table->dateTime('renewed_due_date');
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
      Schema::dropIfExists('renewals');
   }
};
