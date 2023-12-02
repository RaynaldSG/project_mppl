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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('organizer');
            $table->text('desc_EN');
            $table->text('desc_ID');
            $table->string('location');
            $table->timestamp('start');
            $table->timestamp('end')->nullable();
            $table->string('image')->nullable();
            $table->boolean('use_ticket')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
