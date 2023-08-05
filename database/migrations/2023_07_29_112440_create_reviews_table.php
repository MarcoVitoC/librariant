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
      Schema::create('reviews', function (Blueprint $table) {
         $table->id();
         $table->foreignUuid('user_id')->constrained();
         $table->foreignId('book_id')->constrained();
         $table->integer('rating');
         $table->text('review')->nullable();
         $table->integer('like_count')->default(0);
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
      Schema::dropIfExists('reviews');
   }
};
