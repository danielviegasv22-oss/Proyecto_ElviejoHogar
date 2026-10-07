<?php

namespace App\Http\Controllers;

use App\Models\Platillo;
use App\Models\Local;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    private function checkAdmin()
    {
        $user = Session::get('usuario');
        if (!$user || $user['rol'] !== 'admin') {
            abort(403, 'Acceso no autorizado.');
        }
        return $user;
    }

    // GET /admin - Panel Admin (Pruebas_add.html)
    public function index()
    {
        $admin    = $this->checkAdmin();
        $platillos = Platillo::orderBy('pais')->orderBy('nombre')->get();
        $pedidos  = Pedido::orderBy('created_at', 'desc')->get();
        $locales  = Local::orderBy('ciudad')->get();

        return view('pruebas_add', compact('admin', 'platillos', 'pedidos', 'locales'));
    }

    // -------------------- PLATILLOS --------------------

    // POST /admin/platillos
    public function storePlatillo(Request $request)
    {
        $this->checkAdmin();
        $data = $request->validate([
            'nombre'      => 'required|string|max:200',
            'pais'        => 'required|string',
            'precio'      => 'required|numeric|min:0',
            'ciudad'      => 'required|string|max:100',
            'local'       => 'required|string|max:200',
            'calle'       => 'required|string|max:200',
            'descripcion' => 'required|string',
            'imagen'      => 'nullable|string|max:500',
        ]);
        $data['bandera'] = Platillo::flagFor($data['pais']);
        Platillo::create($data);
        return response()->json(['success' => true]);
    }

    // PUT /admin/platillos/{id}
    public function updatePlatillo(Request $request, $id)
    {
        $this->checkAdmin();
        $platillo = Platillo::findOrFail($id);
        $data = $request->validate([
            'nombre'      => 'required|string|max:200',
            'pais'        => 'required|string',
            'precio'      => 'required|numeric|min:0',
            'ciudad'      => 'required|string|max:100',
            'local'       => 'required|string|max:200',
            'calle'       => 'required|string|max:200',
            'descripcion' => 'required|string',
            'imagen'      => 'nullable|string|max:500',
        ]);
        $data['bandera'] = Platillo::flagFor($data['pais']);
        $platillo->update($data);
        return response()->json(['success' => true]);
    }

    // DELETE /admin/platillos/{id}
    public function destroyPlatillo($id)
    {
        $this->checkAdmin();
        Platillo::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }

    // -------------------- LOCALES --------------------

    // POST /admin/locales
    public function storeLocal(Request $request)
    {
        $this->checkAdmin();
        $data = $request->validate([
            'nombre'       => 'required|string|max:200',
            'ciudad'       => 'required|string|max:100',
            'calle'        => 'required|string|max:200',
            'telefono'     => 'required|string|max:50',
            'medios_pago'  => 'required|string',
            'costo_envio'  => 'required|numeric|min:0',
        ]);
        Local::create($data);
        return response()->json(['success' => true]);
    }

    // PUT /admin/locales/{id}
    public function updateLocal(Request $request, $id)
    {
        $this->checkAdmin();
        $local = Local::findOrFail($id);
        $data = $request->validate([
            'nombre'       => 'required|string|max:200',
            'ciudad'       => 'required|string|max:100',
            'calle'        => 'required|string|max:200',
            'telefono'     => 'required|string|max:50',
            'medios_pago'  => 'required|string',
            'costo_envio'  => 'required|numeric|min:0',
        ]);
        $local->update($data);
        return response()->json(['success' => true]);
    }

    // DELETE /admin/locales/{id}
    public function destroyLocal($id)
    {
        $this->checkAdmin();
        Local::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }

    // -------------------- PEDIDOS --------------------

    // GET /admin/pedidos - JSON para AJAX
    public function getPedidos()
    {
        $this->checkAdmin();
        return response()->json(Pedido::orderBy('created_at', 'desc')->get());
    }

    // PUT /admin/pedidos/{id}/estado
    public function updateEstadoPedido(Request $request, $id)
    {
        $this->checkAdmin();
        $pedido = Pedido::findOrFail($id);
        $request->validate(['estado' => 'required|in:En preparación,En camino,Entregado']);
        $pedido->update(['estado' => $request->estado]);
        return response()->json(['success' => true]);
    }

    // -------------------- DATOS --------------------

    // GET /admin/platillos - JSON para AJAX
    public function getPlatillos()
    {
        $this->checkAdmin();
        return response()->json(Platillo::orderBy('pais')->orderBy('nombre')->get());
    }

    // GET /admin/locales - JSON para AJAX
    public function getLocales()
    {
        $this->checkAdmin();
        return response()->json(Local::orderBy('ciudad')->get());
    }
}
