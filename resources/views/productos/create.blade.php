<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <h2 class="mb-4">Cargar nuevo producto</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="#">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
                </div>

                <div class="col-md-6">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" step="0.01" name="precio" class="form-control" value="{{ old('precio') }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" name="stock" class="form-control" value="{{ old('stock') }}">
                </div>

                <div class="col-md-6">
                    <label for="serie" class="form-label">Serie</label>
                    <select name="serie" class="form-select">
                        <option value="">-- Seleccionar --</option>
                        <option value="A" {{ old('serie') == 'A' ? 'selected' : '' }}>A</option>
                        <option value="B" {{ old('serie') == 'B' ? 'selected' : '' }}>B</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Listado</label>
                    <select name="listado_id" class="form-select">
                        <option value="">-- Seleccionar --</option>
                        <!-- Agregá tus listados dinámicamente -->
                        <option value="1">Listado 1</option>
                        <option value="2">Listado 2</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Marca</label>
                    <select name="marca_id" class="form-select">
                        <option value="">-- Seleccionar --</option>
                        @foreach ($marcas as $marca)
                            <option value="{{ $marca->id }}" {{ old('marca_id') == $marca->id ? 'selected' : '' }}>
                                {{ $marca->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Rubro</label>
                    <select name="rubro_id" class="form-select">
                        <option value="">-- Seleccionar --</option>
                        @foreach ($rubros as $rubro)
                            <option value="{{ $rubro->id }}" {{ old('rubro_id') == $rubro->id ? 'selected' : '' }}>
                                {{ $rubro->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Subrubro</label>
                    <select name="subrubro_id" class="form-select">
                        <option value="">-- Seleccionar --</option>
                        @foreach ($subrubros as $subrubro)
                            <option value="{{ $subrubro->id }}" {{ old('subrubro_id') == $subrubro->id ? 'selected' : '' }}>
                                {{ $subrubro->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Grupo</label>
                    <select name="grupo_id" class="form-select">
                        <option value="">-- Seleccionar --</option>
                        @foreach ($grupos as $grupo)
                            <option value="{{ $grupo->id }}" {{ old('grupo_id') == $grupo->id ? 'selected' : '' }}>
                                {{ $grupo->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Sector</label>
                    <select name="sector_id" class="form-select">
                        <option value="">-- Seleccionar --</option>
                        @foreach ($sectors as $sector)
                            <option value="{{ $sector->id }}" {{ old('sector_id') == $sector->id ? 'selected' : '' }}>
                                {{ $sector->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <button type="reset" class="btn btn-secondary me-2">Limpiar</button>
                <button type="submit" class="btn btn-primary">Guardar producto</button>
            </div>
        </form>
    </div>
</body>
</html>
