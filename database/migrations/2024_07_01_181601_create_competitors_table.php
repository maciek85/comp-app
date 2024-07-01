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
        Schema::create('teams', function (Blueprint $table) {
            $table->string('team_name', length:50);
            $table->timestamps();
            $table->uuid('team_id');
        });
        Schema::create('competitor_classes', function (Blueprint $table) {  
            $table->uuid('class_id');
            $table->timestamps();
            $table->string('class_name', length:50);
        });

        Schema::create('competitors', function (Blueprint $table) {
            $table->string('first_name', length:40);
            $table->string('last_name', length:50);
            $table->uuid('competitor_id');
            $table->timestamps();
            $table->foreignUuid('team_id');
            $table->foreignUuid('class_id');
        });



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitors');
    }
};
