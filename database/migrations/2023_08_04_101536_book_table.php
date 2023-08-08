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
            $table->string('title');
            $table->string('author');
            $table->date('publication_date')->nullable();
            $table->string('ISBN')->unique();            
            $table->string('cover');  // Utiliser le type "string" pour le chemin vers le fichier de couverture du livre
            $table->text('summary'); // Utiliser le type "text" pour stocker un résumé plus long
            $table->integer('status')->default(0);
            $table->timestamps();
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
