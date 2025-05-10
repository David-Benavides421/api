<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index() {
        return response()->json(Producto::all());
    }

    public function show($id) {
        // Se usa find() en el video, findOrFail() es más robusto
        $producto = Producto::find($id);
        // Podría añadirse manejo de error si no se encuentra
        return response()->json($producto);
    }
    public function store(Request $request,) {
        $producto = Producto::create($request->all());
        
        return response()->json($producto, 201); // 201 Created
    }

    public function update(Request $request, $id) {
        $producto = Producto::findOrFail($id); // Encuentra o falla con 404
        $producto->update($request->all());
        return response()->json($producto, 200); // 200 OK
    }

    public function destroy($id) {
        $producto = Producto::findOrFail($id); // Encuentra o falla con 404
        $producto->delete();
        return response()->json(null, 204); // 204 No Content
    }

}
