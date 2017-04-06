<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            // user section
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('isbn')->nullable();
            $table->string('title');
            $table->string('author');
            $table->float('desirable_price')->nullable();
            $table->integer('status')->unsigned();
            $table->string('photo')->nullable();

            // course section
            $table->string('subject');
            $table->integer('course')->unsigned();
            $table->string('course_title');
            $table->string('instructor');
            $table->string('book_dependancy');
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
        Schema::drop('books');
    }
}
