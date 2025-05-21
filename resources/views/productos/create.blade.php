<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-4">
        <h1>Crear Producto</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('productos.store') }}" method="POST">
    @csrf

    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="{{ old('nombre') }}"><br><br>

    <label>Marca:</label><br>
    <select name="marca_id">
        <option value="">Seleccionar</option>
        @foreach ($marcas as $marca)
            <option value="{{ $marca->id }}" {{ old('marca_id') == $marca->id ? 'selected' : '' }}>
                {{ $marca->nombre }}
            </option>
        @endforeach
    </select><br><br>

    <label>Rubro:</label><br>
    <select name="rubro_id">
        <option value="">Seleccionar</option>
        @foreach ($rubros as $rubro)
            <option value="{{ $rubro->id }}" {{ old('rubro_id') == $rubro->id ? 'selected' : '' }}>
                {{ $rubro->nombre }}
            </option>
        @endforeach
    </select><br><br>

    <label>Subrubro:</label><br>
    <select name="subrubro_id">
        <option value="">Seleccionar</option>
        @foreach ($subrubros as $subrubro)
            <option value="{{ $subrubro->id }}" {{ old('subrubro_id') == $subrubro->id ? 'selected' : '' }}>
                {{ $subrubro->nombre }}
            </option>
        @endforeach
    </select><br><br>

    <label>Grupo:</label><br>
    <select name="grupo_id">
        <option value="">Seleccionar</option>
        @foreach ($grupos as $grupo)
            <option value="{{ $grupo->id }}" {{ old('grupo_id') == $grupo->id ? 'selected' : '' }}>
                {{ $grupo->nombre }}
            </option>
        @endforeach
    </select><br><br>

    <label>Serie:</label><br>
    <input type="text" name="serie" value="{{ old('serie') }}"><br><br>

    <label>Sector:</label><br>
    <select name="sector_id">
        <option value="">Seleccionar</option>
        @foreach ($sectors as $sector)
            <option value="{{ $sector->id }}" {{ old('sector_id') == $sector->id ? 'selected' : '' }}>
                {{ $sector->nombre }}
            </option>
        @endforeach
    </select><br><br>

    <label>Stock:</label><br>
    <input type="number" name="stock" value="{{ old('stock', 0) }}"><br><br>

    <label>Precio:</label><br>
    <input type="text" name="precio" value="{{ old('precio') }}"><br><br>

    <button type="submit">Guardar</button>
</form>

<br>
<a href="{{ route('productos.index') }}">Volver al listado</a>

    </div>
</body>
</html>
