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
        Schema::create('book_category', function (Blueprint $table) {
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('category_id');

            // Déclaration des clés étrangères et suppression en cascade
            $table->foreign('book_id')->references('id')->on('book')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');

            // Déclaration de la clé primaire composée
            $table->primary(['book_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_category');
        Schema::table('book_category', function (Blueprint $table) {
            // Suppression des clés étrangères
            $table->dropForeign(['book_id']);
            $table->dropForeign(['category_id']);
        });

    }
};
