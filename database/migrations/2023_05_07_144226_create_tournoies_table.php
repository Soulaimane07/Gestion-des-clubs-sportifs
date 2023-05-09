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
        Schema::create('tournoies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('desc');
            $table->string('image')->nullable();
            $table->date('dateDebut');
            $table->date('dateFin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tournoies');
    }
};
