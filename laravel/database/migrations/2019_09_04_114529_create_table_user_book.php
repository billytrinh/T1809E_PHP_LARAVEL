<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUserBook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_book', function (Blueprint $table) {
            //$table->bigIncrements('id');
            //$table->timestamps();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("book_id");
            $table->unsignedInteger("qty");
        });

        Schema::table("user_book",function (Blueprint $table){
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("book_id")->references("book_id")->on("book");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_book');
    }
}
