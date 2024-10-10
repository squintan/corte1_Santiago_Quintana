<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Obtener todos los productos
    public function index()
    {
        $productos = Producto::all()->toArray(); // Convertir a arreglo
        return response()->json([
            'message' => 'Lista de productos',
            'productos' => $productos // Devolver como arreglo
        ]);
    }

    // Crear un nuevo producto
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'codigo' => 'required|string|unique:productos,codigo',
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
            'categoria' => 'required|in:comida,mueble,Electrodomestico,ropa',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        // Crear el nuevo producto
        $producto = Producto::create($request->all());

        // Devolver una respuesta con el producto creado
        return response()->json([
            'message' => 'Producto creado con éxito',
            'producto' => $producto
        ], 201);
    }

    // Obtener un producto específico
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return response()->json([
            'message' => 'Producto encontrado',
            'producto' => $producto
        ]);
    }

    // Actualizar un producto específico
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $validatedData = $request->validate([
            'codigo' => 'required|string|unique:productos,codigo,' . $producto->id,
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
            'categoria' => 'required|in:comida,mueble,Electrodomestico,ropa',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $producto->update($validatedData);

        return response()->json([
            'message' => 'Producto actualizado con éxito',
            'producto' => $producto
        ]);
    }

    // Eliminar un producto específico.
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return response()->json([
            'message' => 'Producto eliminado con éxito'
        ], 204);
    }

    public function showName($nombre)
    {
        $producto = Producto::where('nombre', $nombre)->first();

        if (!$producto) {
            return response()->json([
                'message' => 'Producto no encontrado',
                'status' => 404
            ], 404);
        }

        return response()->json([
            'producto' => $producto,
            'status' => 200
        ], 200);
    }


}
