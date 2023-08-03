<?php

use App\Models\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    { {
            Schema::create('role', function (Blueprint $table) {
                $table->id();
                $table->string('nom');
            });
            Schema::table('users', function (Blueprint $table) {
                $table->foreignIdFor(\App\Models\Role::class)->cascadeOnDelete();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role');
        Schema::table('users', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Role::class)->cascadeOnDelete();
        });
    }
};
