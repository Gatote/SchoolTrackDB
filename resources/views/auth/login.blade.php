<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión - SchoolTrack</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Scripts JavaScript -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        body, html {
            height: 100%;
        }
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .login-form {
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <h2 class="text-center">Iniciar sesión</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control">
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Contraseña</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password" class="form-control">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
                    <label for="remember" class="form-check-label">Recuérdame</label>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        {{ $errors->first() }}
                    </div>
                @endif
            </form>
            <div class="form-links mt-3">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                @endif
                <a href="{{ route('register') }}">¿No tienes una cuenta? Regístrate</a>
            </div>
        </div>
    </div>
</body>
</html>
