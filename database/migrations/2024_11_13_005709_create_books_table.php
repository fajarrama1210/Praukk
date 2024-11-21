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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('shelf_id');
            $table->string('title');
            $table->string('writer');
            $table->string('publisher');
            $table->year('publish_year');
            $table->string('code');
            $table->integer('stock');

            $table->foreign('category_id')->references('id')->on('book_categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('shelf_id')->references('id')->on('book_shelf')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
