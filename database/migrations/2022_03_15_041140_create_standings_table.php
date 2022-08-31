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
        Schema::create('standings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id');
            $table->foreignId('tournament_id');
            $table->text('title')->nullable();
            $table->string('matchWL')->nullable();
            $table->string('win_rate')->nullable();
            $table->string('chicken')->nullable();
            $table->string('rank_point')->nullable();
            $table->string('kill_point')->nullable();
            $table->string('aggregate')->nullable();
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
        Schema::dropIfExists('standings');
    }
};
