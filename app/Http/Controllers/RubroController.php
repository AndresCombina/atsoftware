<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rubro; // Asegurate de importar el modelo

class RubroController extends Controller
{
public function store(Request $request)
{
    $request->merge(json_decode($request->getContent(), true));

    $request->validate([
        'nombre' => 'required|string|max:255',
    ]);

    $rubro = Rubro::create([
        'nombre' => $request->nombre,
    ]);

    return response()->json($rubro);
}

}
