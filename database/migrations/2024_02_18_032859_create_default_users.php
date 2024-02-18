<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('type_users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('type_user_id'); // Agregar columna para la clave foránea
            $table->foreign('type_user_id')->references('id')->on('type_users'); // Definir la relación de clave foránea
        });

        // Insertar los usuarios por defecto
        DB::table('type_users')->insert([
            ['name' => 'admin'],
            ['name' => 'profesor'],
            ['name' => 'alumno'],
        ]);

        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('gatossotag'),
                'type_user_id' => 1, // ID del tipo de usuario admin
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'profesor',
                'email' => 'profesor@gmail.com',
                'password' => bcrypt('gatossotag'),
                'type_user_id' => 2, // ID del tipo de usuario profesor
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'alumno',
                'email' => 'alumno@gmail.com',
                'password' => bcrypt('gatossotag'),
                'type_user_id' => 3, // ID del tipo de usuario alumno
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['type_user_id']);
            $table->dropColumn('type_user_id');
        });

        Schema::dropIfExists('type_users');
    }
};
