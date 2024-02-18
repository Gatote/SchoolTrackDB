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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
        // Asignar al usuario con id 2 como profesor de los cursos con id 1, 2 y 3
        DB::table('teachers')->insert([
            ['user_id' => 2, 'course_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'course_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'course_id' => 3, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
