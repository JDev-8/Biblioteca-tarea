<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Usuario;
use App\Models\SeguridadUsuario;

class AuthController extends Controller
{
  public function showLoginForm()
    {
        return view('usuarios.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('nombre_usuario', 'contrasenia');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/libros');
        }

        $usuario = Usuario::where('nombre_usuario', $credentials['nombre_usuario'])->first();

        if ($usuario && Hash::check($credentials['contrasenia'], $usuario->contrasenia)) {
        Auth::login($usuario); // Inicia la sesión manualmente
        return redirect('/libros');
    }

        return back()->withErrors(['nombre_usuario' => 'Credenciales incorrectas.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function showResetForm()
    {
        return view('usuarios.reseteo');
    }

    public function resetPassword(Request $request)
    {
        $usuario = Usuario::where('nombre_usuario', $request->nombre_usuario)->first();

        if (!$usuario) {
            return back()->withErrors(['nombre_usuario' => 'Usuario no encontrado.']);
        }

        $seguridad = SeguridadUsuario::where('usuario_id', $usuario->usuario_id)->first();

        if (!$seguridad ||
            $seguridad->respuesta_primera_pregunta_seguridad !== $request->respuesta_primera_pregunta_seguridad ||
            $seguridad->respuesta_segunda_pregunta_seguridad !== $request->respuesta_segunda_pregunta_seguridad) {
            return back()->withErrors(['respuestas' => 'Respuestas incorrectas.']);
        }

        $usuario->contrasenia = Hash::make($request->nueva_contrasenia);
        $usuario->save();

        return redirect('/login')->with('success', 'Contraseña restablecida correctamente.');
    }

    public function showRegistrationForm()
    {
        return view('usuarios.register');
    }

     public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'cedula' => 'required',
            'telefono' => 'required',
            'nombre_usuario' => 'required|unique:usuarios',
            'contrasenia' => 'required|min:8',
            'primera_pregunta_seguridad' => 'required',
            'respuesta_primera_pregunta_seguridad' => 'required',
            'segunda_pregunta_seguridad' => 'required',
            'respuesta_segunda_pregunta_seguridad' => 'required',
        ]);

         $data = $request->except('imagen_usuario');

        if ($request->hasFile('imagen_usuario')) {
          $nombre = Str::slug($request->nombre_usuario);
          $extension = $request->file('imagen_usuario')->getClientOriginalExtension();
          $nombreArchivo = $nombre . '.' . $extension;
          $path = $request->file('imagen_usuario')->storeAs('usuarios', $nombreArchivo, 'public');
          $data['imagen_usuario'] = $path;
        }

        $data['contrasenia'] = Hash::make($request->contrasenia);
        $data['rol'] = "lector";
        $data['activo'] = true;
        $usuario = Usuario::create($data);


        SeguridadUsuario::create([
            'usuario_id' => $usuario->usuario_id,
            'primera_pregunta_seguridad' => $request->primera_pregunta_seguridad,
            'respuesta_primera_pregunta_seguridad' => $request->respuesta_primera_pregunta_seguridad,
            'segunda_pregunta_seguridad' => $request->segunda_pregunta_seguridad,
            'respuesta_segunda_pregunta_seguridad' => $request->respuesta_segunda_pregunta_seguridad,
        ]);

        return redirect('/login')->with('success', 'Usuario registrado correctamente.');
    }
}
