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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('tournament_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->string('email')->nullable();
            $table->string('nomor')->unique();
            $table->string('player1')->nullable();
            $table->string('player2')->nullable();
            $table->string('player3')->nullable();
            $table->string('player4')->nullable();
            $table->string('player5')->nullable();
            $table->string('player6')->nullable();
            $table->string('idPlayer1')->nullable();
            $table->string('idPlayer2')->nullable();
            $table->string('idPlayer3')->nullable();
            $table->string('idPlayer4')->nullable();
            $table->string('idPlayer5')->nullable();
            $table->string('idPlayer6')->nullable();
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
        Schema::dropIfExists('teams');
    }
};
