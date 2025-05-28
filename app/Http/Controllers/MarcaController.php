<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca; // Asegurate de importar el modelo

class MarcaController extends Controller
{
public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
    ]);

    $marca = Marca::create([
        'nombre' => $request->nombre,
    ]);

    return response()->json($marca); // <- Esto soluciona el error
}
}
