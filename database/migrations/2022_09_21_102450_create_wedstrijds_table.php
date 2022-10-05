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
            $table->string('wedstrijd_nummer');
            $table->string('datum');
            $table->string('tijd');
            $table->string('thuisteam');
            $table->string('uitteam');
            $table->string('scheidsrechter_1')->nullable();
            $table->string('scheidsrechter_2')->nullable();
            $table->string('tafeldienst')->nullable();
            $table->string('veld')->nullable();
            $table->string('begeleider_jeugdspelleider')->nullable();
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
