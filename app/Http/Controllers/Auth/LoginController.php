<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validar los datos del formulario de inicio de sesión
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar autenticar al usuario
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Si el usuario está autenticado, redirigir a la vista home
            return redirect()->route('home');
        }

        // Si las credenciales son incorrectas, volver al formulario de inicio de sesión con un mensaje de error
        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Cerrar sesión del usuario
        $request->session()->invalidate(); // Invalidar la sesión
        $request->session()->regenerateToken(); // Regenerar el token de sesión

        return redirect('/'); // Redirigir a la página de inicio u otra página deseada
    }
}
