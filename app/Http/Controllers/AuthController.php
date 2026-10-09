<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // GET /
    public function index()
    {
        return view('index');
    }

    // GET /login
    public function showLogin()
    {
        if (Session::has('usuario')) {
            $user = Session::get('usuario');
            return redirect($user['rol'] === 'admin' ? '/admin' : '/menu');
        }
        return view('login');
    }

    // POST /login
    public function login(Request $request)
    {
        $request->validate([
            'usuario'   => 'required|string',
            'password'  => 'required|string',
        ]);

        $input = trim($request->usuario);
        $pass  = $request->password;

        // Acceso admin (contraseña 12345, abre panel de administrador)
        if (($input === 'admin' || $input === 'administrador' || strtolower($input) === 'admin@elviejohogar.com') && ($pass === '12345' || $pass === 'admin' || $pass === 'admin123')) {
            Session::put('usuario', ['nombre' => 'Administrador', 'rol' => 'admin', 'gmail' => 'admin@elViejoHogar.com', 'ciudad' => 'Córdoba']);
            return redirect('/admin');
        }

        // Acceso cliente (contraseña 12345, abre menú)
        if (($input === 'cliente' || $input === 'cliente1' || strtolower($input) === 'cliente@gmail.com') && ($pass === '12345' || $pass === 'cliente' || $pass === 'cliente123')) {
            Session::put('usuario', ['nombre' => 'Cliente', 'rol' => 'cliente', 'gmail' => 'cliente@gmail.com', 'ciudad' => 'Córdoba']);
            return redirect('/menu');
        }

        // Buscar en la BD por gmail o nombre
        $usuario = Usuario::where('gmail', $input)
                          ->orWhere('nombre', $input)
                          ->first();

        if ($usuario && Hash::check($pass, $usuario->password)) {
            Session::put('usuario', [
                'id'          => $usuario->id,
                'nombre'      => $usuario->nombre . ' ' . $usuario->apellido,
                'rol'         => $usuario->rol,
                'gmail'       => $usuario->gmail,
                'ciudad'      => $usuario->ciudad,
                'nacionalidad'=> $usuario->nacionalidad,
            ]);
            return redirect($usuario->rol === 'admin' ? '/admin' : '/menu');
        }

        return back()->withErrors(['error' => 'Usuario o contraseña incorrectos.'])->withInput(['usuario' => $input]);
    }

    // GET /registro
    public function showRegistro()
    {
        if (Session::has('usuario')) {
            return redirect('/menu');
        }
        return view('crear_usuario');
    }

    // POST /registro
    public function registro(Request $request)
    {
        $request->validate([
            'nombre'          => 'required|string|max:100',
            'apellido'        => 'required|string|max:100',
            'gmail'           => 'required|email|ends_with:@gmail.com',
            'nacionalidad'    => 'required|string',
            'ciudad'          => 'required|string|max:100',
            'password'        => 'required|string|min:4|confirmed',
        ], [
            'gmail.ends_with' => 'El correo debe tener terminación @gmail.com',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.min'    => 'La contraseña debe tener al menos 4 caracteres.',
        ]);

        // Verificar si el gmail ya existe
        if (Usuario::where('gmail', $request->gmail)->exists()) {
            return back()->withErrors(['gmail' => 'Ya existe una cuenta con ese Gmail.'])->withInput();
        }

        $usuario = Usuario::create([
            'nombre'       => $request->nombre,
            'apellido'     => $request->apellido,
            'gmail'        => $request->gmail,
            'nacionalidad' => $request->nacionalidad,
            'ciudad'       => $request->ciudad,
            'password'     => Hash::make($request->password),
            'rol'          => 'cliente',
        ]);

        // Auto-login
        Session::put('usuario', [
            'id'           => $usuario->id,
            'nombre'       => $usuario->nombre . ' ' . $usuario->apellido,
            'rol'          => 'cliente',
            'gmail'        => $usuario->gmail,
            'ciudad'       => $usuario->ciudad,
            'nacionalidad' => $usuario->nacionalidad,
        ]);

        return redirect('/menu')->with('success', '¡Bienvenido ' . $usuario->nombre . '! Tu cuenta fue creada.');
    }

    // GET /logout
    public function logout()
    {
        Session::forget('usuario');
        return redirect('/');
    }
}
