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
            $table->id();
            $table->unsignedBigInteger('testament_id');
            $table->integer('position');
            $table->string('name');
            $table->string('abbreviation');
            $table->timestamps();

            $table->foreign('testament_id')->references('id')->on('testaments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign('books_testament_id_foreign');
        });

        Schema::dropIfExists('books');
    }
};
