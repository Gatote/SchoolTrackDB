@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Usuario</h1>
    <div class="card">
        <div class="card-body">
            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
            <div class="mb-3">
                {!! Form::label('name', 'Nombre', ['class' => 'form-label']) !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                {!! Form::label('email', 'Correo electrónico', ['class' => 'form-label']) !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                {!! Form::label('type_user_id', 'Tipo de Usuario', ['class' => 'form-label']) !!}
                {!! Form::select('type_user_id', $typeUsers->pluck('name', 'id'), null, ['class' => 'form-select']) !!}
                @error('type_user_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

                <!-- Agrega más campos según los datos del usuario que desees mostrar -->
                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                <a href="{{route('users.index')}}" class="btn btn-danger">Cancelar</a>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

