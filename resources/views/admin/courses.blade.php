@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cursos</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista de Cursos</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($courses as $course)
                            <tr>
                                <td>{{ $course->id }}</td>
                                <td>{{ $course->title }}</td>
                                <td>{{ $course->description }}</td>
                                <td>
                                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-primary">Ver Detalles</a>
                                    <!-- Agrega más acciones según tus necesidades -->
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">No hay cursos disponibles.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
