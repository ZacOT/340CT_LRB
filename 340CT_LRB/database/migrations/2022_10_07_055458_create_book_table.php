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
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('book_title');
            $table->string('book_author');
            $table->date('publication_date');
            $table->string('ISBN_13',13)->unique();
            $table->string('book_description');
            $table->binary('book_cover_img');
            $table->double('trade_price');
            $table->double('retail_price');
            $table->integer('book_stock');
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
        Schema::dropIfExists('books');
    }
};
