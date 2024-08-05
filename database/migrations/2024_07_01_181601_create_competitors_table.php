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
            $table->uuid('team_id')->primary();
        });
        Schema::create('competitor_classes', function (Blueprint $table) {  
            $table->uuid('class_id')->primary();
            $table->timestamps();
            $table->string('class_name', length:50);
        });

        Schema::create('competitors', function (Blueprint $table) {
            $table->string('first_name', length:40);
            $table->string('last_name', length:50);
            $table->uuid('competitor_id')->primary();
            $table->timestamps();
          
        });

        Schema::create('events', function (Blueprint $table) {
            $table->string('event_name', length:50);
            $table->uuid('event_id')->primary();
            $table->timestamps();
            $table->date('event_date');
            $table->string('event_description', length:255);
            $table->string('event_rules', length:255);
        });
        
        Schema::create('competitions', function (Blueprint $table) {
            $table->uuid('competition_id')->primary();
            $table->timestamps();
            $table->integer('competition_max_points');
            $table->string('competition_name', length:50);
            $table->string('competition_description', length:255);
        });

        Schema::create('event_competitor_class', function (Blueprint $table) {
            $table->timestamps();
            $table->foreignUuid('event_id')->references('event_id')->on('events');
            $table->foreignUuid('competitor_id')->references('competitor_id')->on('competitors');
            $table->foreignUuid('class_id')->references('class_id')->on('competitor_classes');
            $table->primary(['event_id', 'competitor_id', 'class_id']);
        });
        Schema::create('event_competitor_team', function (Blueprint $table) {
            $table->timestamps();
            $table->foreignUuid('event_id')->references('event_id')->on('events');
            $table->foreignUuid('competitor_id')->references('competitor_id')->on('competitors');
            $table->foreignUuid('team_id')->references('team_id')->on('teams');
            $table->primary(['event_id', 'competitor_id', 'team_id']);
        });

        Schema::create('event_competitor_start_number', function (Blueprint $table) {
            $table->timestamps();
            $table->foreignUuid('event_id')->references('event_id')->on('events');
            $table->foreignUuid('competitor_id')->references('competitor_id')->on('competitors');
            $table->integer('competitor_start_number');
            $table->primary(['event_id', 'competitor_id', 'competitor_start_number']);
        });

        Schema::create('event_competitor_start_number_team_class', function (Blueprint $table){
            $table->timestamps();
            $table->foreignUuid('event_id')->references('event_id')->on('events');
            $table->foreignUuid('competitor_id')->references('competitor_id')->on('competitors');
            $table->foreignUuid('team_id')->references('team_id')->on('teams');
            $table->foreignUuid('class_id')->references('class_id')->on('competitor_classes');
            $table->integer('competitor_start_number');
            $table->primary(['event_id', 'competitor_id']);
        });

        Schema::create('event_competitor_competition', function (Blueprint $table) {
            $table->timestamps();
            $table->foreignUuid('competition_id')->references('competition_id')->on('competitions');
            $table->foreignUuid('event_id')->references('event_id')->on('events');
            $table->foreignUuid('competitor_id')->references('competitor_id')->on('competitors');
            $table->integer('points');
            $table->primary(['competition_id', 'event_id', 'competitor_id']);
        });
        DB::statement('ALTER TABLE event_competitor_competition ADD COLUMN list_of_points INTEGER[10]');


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitors');
    }
};
