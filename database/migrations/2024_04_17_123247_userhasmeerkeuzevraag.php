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
        Schema::create('userhasmeerkeuzevraag', function (Blueprint $table) {
            $table->id("id");
            $table->unsignedBigInteger('User_idUser');
            $table->unsignedBigInteger('Vragen_idVragen');
            $table->foreign('User_idUser')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('Vragen_idVragen')->references('id')->on('meerkeuzevragen')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
