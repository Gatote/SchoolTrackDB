<!-- resources/views/admin/usuarios.blade.php -->

@extends('layouts.app')

@section('content')
    <form action="{{ route('users.index') }}" method="GET">
        <input type="text" name="q" value="{{ $query }}" placeholder="Buscar usuarios...">
        <button type="submit">Buscar</button>
    </form>

    <!-- Mostrar detalles del usuario -->
    <div class="container">
        <h1>Lista de Usuarios</h1>
        @if(session('success'))
            <div id="successMessage" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Tipo de Usuario</th> <!-- Agregamos la columna para el tipo de usuario -->
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->type->name }}</td> <!-- Mostrar el nombre del tipo de usuario -->
                        <td>
                            <!-- Botón para ver detalles del usuario -->
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-secondary">Detalles</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <style>
        .fade {
            animation: fadeOut 1s ease-in-out forwards;
        }

        @keyframes fadeOut {
            0% {
                opacity: 1;
            }
            100% {
                opacity: 0;
                display: none;
            }
        }
    </style>

    <script>
        // Esperar 3 segundos antes de desvanecer el mensaje de éxito
        setTimeout(function() {
            document.getElementById('successMessage').classList.add('fade');
        }, 3000);
    </script>
@endsection
