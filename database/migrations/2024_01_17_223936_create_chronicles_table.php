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
        Schema::create('chronicles', function (Blueprint $table) {
            $table->foreignId('character_id')->constrained('characters');
            $table->foreignId('quest_id')->constrained('quests');
            $table->primary(['character_id', 'quest_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chronicles');
    }
};
