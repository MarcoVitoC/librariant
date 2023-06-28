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
      Schema::create('users', function (Blueprint $table) {
         $table->uuid('id')->primary();
         $table->foreignId('role_id')->default('0');
         $table->string('full_name');
         $table->string('username')->unique();
         $table->string('gender');
         $table->date('date_of_birth');
         $table->string('phone_number')->unique();
         $table->string('address');
         $table->string('email')->unique();
         $table->integer('books_borrowed')->default(0);
         $table->integer('penalty')->default(0);
         $table->timestamp('email_verified_at')->nullable();
         $table->string('password');
         $table->rememberToken();
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
      Schema::dropIfExists('users');
   }
};
