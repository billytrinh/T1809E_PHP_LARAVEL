<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableBook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('book', function (Blueprint $table) {
            $table->foreign("author_id")->references("author_id")->on("author");
            $table->foreign("nxb_id")->references("nxb_id")->on("nxb");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book', function (Blueprint $table) {
            $table->dropForeign(["author_id"]);
            $table->dropForeign(["nxb_id"]);
        });
    }
}
