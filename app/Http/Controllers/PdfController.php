<?php

namespace App\Http\Controllers;

use App\Models\Producto; // Asegúrate de importar el modelo
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function generatePdf()
    {
        // Obtener todos los productos
        $productos = Producto::all()->toArray(); 

        if (empty($productos)) {
            return response()->json(['message' => 'No hay productos para generar el PDF'], 404);
        }

        $data = [
            'title' => 'Listado de productos',
            'products' => $productos // Aquí usamos directamente los productos obtenidos
        ];

        $pdf = PDF::loadView('pdf.producto', $data);
        return $pdf->download('producto.pdf');
    }
}
