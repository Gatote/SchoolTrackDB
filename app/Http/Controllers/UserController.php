<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TypeUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q'); // Obtén el término de búsqueda del formulario

        // Busca usuarios usando Algolia
        $users = User::search($query)->paginate(10);

        return view('admin.users', compact('users', 'query'));
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $typeUsers = TypeUser::all(); // Obtener todos los tipos de usuario
        return view('admin.edituser', compact('user', 'typeUsers'));
    }
    public function update(Request $request, string $id)
{
    // Validar los datos del formulario
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'type_user_id' => 'required|exists:type_users,id', // Asegúrate de que type_users sea el nombre correcto de la tabla
    ]);

    // Encontrar el usuario que se va a actualizar
    $user = User::findOrFail($id);

    // Actualizar los campos con los datos validados
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->type_user_id = $validatedData['type_user_id'];

    // Guardar los cambios en la base de datos
    $user->save();

    // Redireccionar a la vista de detalles o a donde desees
    return redirect()->route('users.index')->with('success', '¡Los datos del usuario han sido actualizados!');
}

}
