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
        Schema::create('coupons_has_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_iduser");
            $table->foreign('user_iduser')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger("coupons_idcoupons");
            $table->foreign('coupons_idcoupons')->references('id')->on('coupons')->onDelete('cascade');
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
        Schema::dropIfExists('coupons_has_user');
    }
};
