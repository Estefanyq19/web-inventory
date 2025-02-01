<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    //función para mostrar la vista del form de login
    public function create()
    {
        return view('auth.login');//Retornamos la vista del inicio de sesión
    }


    //Se maneja el proceso de autenticación del usuario
    public function store(Request $request)
    {
        //Validando los datos del form del login
        $credentials = $request->validate([
            //Ambos campos siempre serán oblitagorios al momento de loguearse
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        //Autentica al usuario con las credenciales que se le han proporcionado
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();//Regenera la sesion para evitar ataques de fijación de sesión
            // Redirige al dashboard (productos)
            return redirect()->route('dashboard');
        }
        // Si las credenciales son incorrectas, redirige con un mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }
    
    // Manejar el cierre de sesión del usuario
    public function destroy(Request $request)
    {
        //Cierra la sesión del usuario autenticado
        Auth::guard('web')->logout();
        $request->session()->invalidate();//Invalida la sesión actual
        $request->session()->regenerateToken();//Regenera el token de la sesión
        return redirect('/');//Redirige a la página principal o de login
    }
}
