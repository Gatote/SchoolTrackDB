@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $course->title }}</h1>
    <p>{{ $course->description }}</p>
    
    <div class="card mt-4">
        <div class="card-header">
            Maestros Asignados
        </div>
        <div class="card-body">
            @if ($course->teachers->count() > 0)
                <ul>
                    @foreach ($course->teachers as $teacher)
                        <li>{{ $teacher->user->name }}</li>
                    @endforeach
                </ul>
            @else
                <p>No hay maestros asignados a este curso.</p>
            @endif
        </div>
    </div>
    
    <a href="{{ route('courses.index') }}" class="btn btn-primary mt-4">Regresar</a>
</div>
@endsection
