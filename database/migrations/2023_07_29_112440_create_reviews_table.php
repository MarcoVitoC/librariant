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
         $table->foreignUuid('user_id');
         $table->foreignId('book_id');
         $table->integer('rating');
         $table->integer('like_count')->default(0);
         $table->integer('dislike_count')->default(0);
         $table->text('review')->nullable();
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
