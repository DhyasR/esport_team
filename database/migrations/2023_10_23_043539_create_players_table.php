<?php

use App\Models\Team;
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
        Schema::create(
            'players',
            function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->string('player_name');
                $table->string('email');
                $table->string('phone');
                $table->text('player_note');
                $table->foreignIdFor(Team::class);
            }
        );
    }

    /**
     * Reverse the migrations
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
