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
        Schema::create('book_sells', function (Blueprint $table) {
            $table->id();
            $table->integer('book_id');
            $table->integer('volunteer_id');
            $table->integer('soled_quantity');
            $table->integer('price');
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->string('remarks');
            $table->timestamps();
        });
    }

    /** soled_date
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_sells');
    }
};
