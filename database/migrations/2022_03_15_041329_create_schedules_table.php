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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tournament_id');
            $table->string('day')->nullable();
            $table->string('slug')->unique();
            $table->date('date')->nullable();

            $table->string('match')->nullable();
            $table->string('map')->nullable();
            $table->string('time')->nullable();

            $table->string('idRoom')->nullable();
            $table->string('passRoom')->nullable();


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
        Schema::dropIfExists('schedules');
    }
};
