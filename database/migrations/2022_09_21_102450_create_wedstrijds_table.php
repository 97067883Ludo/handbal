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
        Schema::create('wedstrijds', function (Blueprint $table) {
            $table->id();
            $table->string('datum');
            $table->string('tijd');
            $table->string('thuisteam');
            $table->string('uitteam');
            $table->string('scheidsrechter');
            $table->string('tafeldienst');
            $table->string('veld');
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
        Schema::dropIfExists('wedstrijds');
    }
};
