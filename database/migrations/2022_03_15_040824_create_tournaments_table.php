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
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id');
            $table->foreignId('user_id');
            $table->text('title');
            $table->string('slug')->unique();
            $table->text('prize');
            $table->string('image')->nullable();
            $table->date('registrationDate');
            $table->date('matchDate');
            $table->date('matchAndDate');
            $table->string('time');
            $table->string('slot');
            $table->text('location');
            $table->text('body');
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('tournaments');
    }
};
