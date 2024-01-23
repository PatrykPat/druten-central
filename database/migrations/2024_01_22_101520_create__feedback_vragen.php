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
        Schema::create('feedbackvragen', function (Blueprint $table) {
            $table->id("id");
            $table->string("title");
            $table->string("beschrijving");
            $table->integer("puntenTeVerdienen");
            $table->unsignedBigInteger('user_userid'); // Define the column before the foreign key
            $table->foreign('user_userid')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('feedback_vragen');
    }
};
