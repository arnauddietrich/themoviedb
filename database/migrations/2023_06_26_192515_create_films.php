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
        Schema::create('films', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->boolean('adult');
            $table->string('backdrop_path')->nullable();
            $table->string('title')->nullable();
            $table->string('original_language')->nullable();
            $table->string('original_title')->nullable();
            $table->longText('overview')->nullable();
            $table->string('poster_path')->nullable();
            $table->string('media_type')->nullable();
            $table->json('genre_ids')->nullable();
            $table->float('popularity', 8, 3)->nullable();
            $table->string('release_date')->nullable();
            $table->string('first_air_date')->nullable();
            $table->boolean('video')->nullable();
            $table->float('vote_average', 5, 3)->nullable();
            $table->integer('vote_count')->nullable();
            $table->json('origin_country')->nullable();
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
        Schema::dropIfExists('films');
    }
};
