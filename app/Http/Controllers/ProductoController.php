<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
{
    $productos = \App\Models\Producto::all();
    return view('productos.index', compact('productos'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create()
{
    $marcas = \App\Models\Marca::all();
    $rubros = \App\Models\Rubro::all();
    $subrubros = \App\Models\Subrubro::all();
    $grupos = \App\Models\Grupo::all();
    $sectors = \App\Models\Sector::all();

    return view('productos.create', compact('marcas', 'rubros', 'subrubros', 'grupos', 'sectors'));
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
public function store(Request $request)
{
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'marca_id' => 'nullable|exists:marcas,id',
        'rubro_id' => 'nullable|exists:rubros,id',
        'subrubro_id' => 'nullable|exists:subrubros,id',
        'grupo_id' => 'nullable|exists:grupos,id',
        'serie' => 'nullable|string|max:1', // A o B
        'sector_id' => 'nullable|exists:sectors,id',
        'precio' => 'nullable|numeric',
        'stock' => 'nullable|integer',
    ]);

    \App\Models\Producto::create($validated);

    return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function edit($id)
{
    $producto = Producto::findOrFail($id);
    $marcas = Marca::all();
    $rubros = Rubro::all();
    $subrubros = Subrubro::all();
    $grupos = Grupo::all();
    $sectors = Sector::all();

    return view('productos.edit', compact(
        'producto', 'marcas', 'rubros', 'subrubros', 'grupos', 'sectors'
    ));
}


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'precio' => 'required|numeric',
        'marca_id' => 'required|exists:marcas,id',
        'rubro_id' => 'required|exists:rubros,id',
        'subrubro_id' => 'required|exists:subrubros,id',
        'grupo_id' => 'required|exists:grupos,id',
        'sector_id' => 'required|exists:sectors,id',
    ]);

    $producto = Producto::findOrFail($id);

    $producto->update([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'precio' => $request->precio,
        'marca_id' => $request->marca_id,
        'rubro_id' => $request->rubro_id,
        'subrubro_id' => $request->subrubro_id,
        'grupo_id' => $request->grupo_id,
        'sector_id' => $request->sector_id,
    ]);

    return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
