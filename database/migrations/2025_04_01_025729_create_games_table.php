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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->float('price');
            $table->text('description')->nullable();
            $table->string('image')->default('images/default.png');
            $table->integer('total_sales')->default(0);
            $table->date('release_date')->nullable();
            $table->string('publisher');
            $table->string('developer');
            $table->string('category');

        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
