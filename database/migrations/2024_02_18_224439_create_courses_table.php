<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamps();
        });
        DB::table('courses')->insert([
            [
                'title' => 'Introducción a la Programación',
                'description' => 'Este curso cubre los conceptos básicos de la programación.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Desarrollo Web con Laravel',
                'description' => 'Aprende a desarrollar aplicaciones web utilizando el framework Laravel.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Fundamentos de Machine Learning',
                'description' => 'Curso introductorio sobre los fundamentos del aprendizaje automático.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
