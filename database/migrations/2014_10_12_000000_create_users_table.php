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
        Schema::create('role', function (Blueprint $table) {
            $table->id('roleid');
            $table->string('role');
            $table->timestamps();
        });
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('punten')->default('1');
            $table->rememberToken();
            $table->timestamps();
            $table->unsignedBigInteger('role_roleid')->default('1');
            $table->foreign('role_roleid')->references('roleid')->on('role')->onDelete('cascade');
        });
        DB::table('role')->insert([['role' => 'klant'], ['role' => 'bedrijf'], ['role' => 'admin']]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
