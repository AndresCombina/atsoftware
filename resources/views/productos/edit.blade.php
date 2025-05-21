<h1>Editar producto</h1>

@if ($errors->any())
    <div style="color: red; margin-bottom: 20px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('productos.update', $producto->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}"><br><br>

    <label>Marca:</label><br>
    <select name="marca_id">
        <option value="">-- Seleccionar --</option>
        @foreach ($marcas as $marca)
            <option value="{{ $marca->id }}" {{ old('marca_id', $producto->marca_id) == $marca->id ? 'selected' : '' }}>
                {{ $marca->nombre }}
            </option>
        @endforeach
    </select><br><br>

    <label>Rubro:</label><br>
    <select name="rubro_id">
        <option value="">-- Seleccionar --</option>
        @foreach ($rubros as $rubro)
            <option value="{{ $rubro->id }}" {{ old('rubro_id', $producto->rubro_id) == $rubro->id ? 'selected' : '' }}>
                {{ $rubro->nombre }}
            </option>
        @endforeach
    </select><br><br>

    <label>Subrubro:</label><br>
    <select name="subrubro_id">
        <option value="">-- Seleccionar --</option>
        @foreach ($subrubros as $subrubro)
            <option value="{{ $subrubro->id }}" {{ old('subrubro_id', $producto->subrubro_id) == $subrubro->id ? 'selected' : '' }}>
                {{ $subrubro->nombre }}
            </option>
        @endforeach
    </select><br><br>

    <label>Grupo:</label><br>
    <select name="grupo_id">
        <option value="">-- Seleccionar --</option>
        @foreach ($grupos as $grupo)
            <option value="{{ $grupo->id }}" {{ old('grupo_id', $producto->grupo_id) == $grupo->id ? 'selected' : '' }}>
                {{ $grupo->nombre }}
            </option>
        @endforeach
    </select><br><br>

    <label>Sector:</label><br>
    <select name="sector_id">
        <option value="">-- Seleccionar --</option>
        @foreach ($sectors as $sector)
            <option value="{{ $sector->id }}" {{ old('sector_id', $producto->sector_id) == $sector->id ? 'selected' : '' }}>
                {{ $sector->nombre }}
            </option>
        @endforeach
    </select><br><br>

    <label>Serie:</label><br>
    <select name="serie">
        <option value="">-- Seleccionar --</option>
        <option value="A" {{ old('serie', $producto->serie) == 'A' ? 'selected' : '' }}>A</option>
        <option value="B" {{ old('serie', $producto->serie) == 'B' ? 'selected' : '' }}>B</option>
    </select><br><br>

    <label>Precio:</label><br>
    <input type="number" step="0.01" name="precio" value="{{ old('precio', $producto->precio) }}"><br><br>

    <label>Stock:</label><br>
    <input type="number" name="stock" value="{{ old('stock', $producto->stock) }}"><br><br>

    <button type="submit">Actualizar producto</button>
</form>
