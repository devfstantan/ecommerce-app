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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('sku')->unique();
            $table->boolean('is_published')->default(false);

            $table->integer('scores_total')->default(0);
            $table->integer('scores_count')->default(0);
            $table->float('rating')->default(0);

            $table->float('price');

            $table->string('image')->nullable();
            $table->text('description')->default('');


            $table->timestamps();

            $table->index('rating');
            $table->index('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
