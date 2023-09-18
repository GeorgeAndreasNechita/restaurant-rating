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
        Schema::create('german_words', function (Blueprint $table) {
            $table->id();
            $table->string('german_word');
            $table->string('article'); // Der, Die, Das, Den, etc.
            $table->string('english_translation');
            $table->unsignedInteger('correct')->default(0);
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
        Schema::dropIfExists('german_words');
    }
};
