<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antwoord', function (Blueprint $table) {
            $table->id('antwoordID');
            $table->unsignedBigInteger('vraagID');
            $table->string('AntwoordTekst');
            $table->boolean('IsCorrect');
            $table->foreign('vraagID')->references('idmeerkeuzevraag')->on('meerkeuzevragen')->onDelete('cascade');
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
        Schema::dropIfExists('antwoorden');
    }
};
