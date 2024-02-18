@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Contenido de la página Home</h1>
        <p>Bienvenido {{ Auth::user()->name }}</p>

        <!-- Más contenido de Lorem Ipsum -->
    </div>
@endsection
