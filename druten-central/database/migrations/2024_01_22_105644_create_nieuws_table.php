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
        Schema::create('nieuws', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_iduser");
            $table->foreign('user_iduser')->references('id')->on('users')->onDelete('cascade');
            $table->string("title");
            $table->string("beschrijving");
            $table->binary('image')->nullable();
            $table->date('datum');
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
        Schema::dropIfExists('nieuws');
    }
};