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
        Schema::create('UserHasVragen', function (Blueprint $table) {
            $table->unsignedBigInteger('User_idUser');
            $table->unsignedBigInteger('Vragen_idVragen');
            $table->string('antwoord', 45);
            $table->foreign('User_idUser')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('Vragen_idVragen')->references('idVragen')->on('Feedbackvragen')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback_vragen');
    }
};
