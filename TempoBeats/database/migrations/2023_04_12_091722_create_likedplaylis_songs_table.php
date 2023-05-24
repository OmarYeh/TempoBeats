<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('likedplaylis_songs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('likedplaylist_id');
            $table->unsignedBigInteger('song_id');
            $table->foreign('likedplaylist_id')->references('id')->on('liked_playlists')->onDelete('cascade');
            $table->foreign('song_id')->references('id')->on('songs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likedplaylis_songs');
    }
};
