<?php

namespace App\Http\Controllers;

use App\Models\Platillo;
use App\Models\Local;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    // GET /menu - Menú de Usuario (menu_usuario.html)
    public function index(Request $request)
    {
        if (!Session::has('usuario')) {
            return redirect('/login');
        }

        $usuario  = Session::get('usuario');
        $platillos = Platillo::orderBy('pais')->orderBy('nombre')->get();
        $locales   = Local::orderBy('ciudad')->get();

        return view('menu_usuario', compact('usuario', 'platillos', 'locales'));
    }

    // POST /pedido - Confirmar pedido
    public function confirmarPedido(Request $request)
    {
        if (!Session::has('usuario')) {
            return response()->json(['error' => 'No autenticado'], 401);
        }

        $data = $request->validate([
            'cliente_nombre'    => 'required|string',
            'ciudad_entrega'    => 'required|string',
            'direccion_entrega' => 'required|string',
            'metodo_pago'       => 'required|in:efectivo,transferencia',
            'billetera'         => 'nullable|string',
            'subtotal'          => 'required|numeric|min:0',
            'costo_envio'       => 'required|numeric|min:0',
            'total'             => 'required|numeric|min:0',
            'items'             => 'required|array|min:1',
        ]);

        $usuario = Session::get('usuario');
        $codigo  = 'PED-' . strtoupper(uniqid());

        $pedido = Pedido::create([
            'codigo'            => $codigo,
            'cliente_nombre'    => $data['cliente_nombre'],
            'cliente_email'     => $usuario['gmail'] ?? '',
            'ciudad_entrega'    => $data['ciudad_entrega'],
            'direccion_entrega' => $data['direccion_entrega'],
            'metodo_pago'       => $data['metodo_pago'],
            'billetera'         => $data['billetera'] ?? null,
            'subtotal'          => $data['subtotal'],
            'costo_envio'       => $data['costo_envio'],
            'total'             => $data['total'],
            'estado'            => 'En preparación',
            'items'             => $data['items'],
        ]);

        return response()->json(['success' => true, 'codigo' => $codigo, 'id' => $pedido->id]);
    }

    // GET /pruebas-usuario (Pruebas_usuario.html)
    public function pruebasUsuario()
    {
        $platillos = Platillo::orderBy('nombre')->get();
        return view('pruebas_usuario', compact('platillos'));
    }
}
