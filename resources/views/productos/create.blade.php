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

        <form action="{{ route('marcas.store') }}" method="POST">
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

                <!-- Paso 1: Select de marca con botón "+" -->
                <div class="col-md-4">
                    <label class="form-label">Marca</label>
                    <div class="d-flex">
                        <select name="marca_id" id="marca_id" class="form-select me-2">
                            <option value="">-- Seleccionar --</option>
                            @foreach ($marcas as $marca)
                                <option value="{{ $marca->id }}" {{ old('marca_id') == $marca->id ? 'selected' : '' }}>
                                    {{ $marca->nombre }}
                                </option>
                            @endforeach
                        </select>
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#crearMarcaModal">+</button>
                    </div>
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

    <!-- Paso 2: Modal para crear marca -->
    <div class="modal fade" id="crearMarcaModal" tabindex="-1" aria-labelledby="crearMarcaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="formCrearMarca">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="crearMarcaModalLabel">Crear nueva Marca</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nombre_marca" class="form-label">Nombre de la marca</label>
                            <input type="text" class="form-control" id="nombre_marca" name="nombre" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts Bootstrap + Paso 3: AJAX -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('formCrearMarca').addEventListener('submit', function(e) {
            e.preventDefault();

            const nombre = document.getElementById('nombre_marca').value;

            fetch("{{ route('marcas.store') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ nombre })
            })
            .then(response => response.json())
            .then(data => {
                if (data.id && data.nombre) {
                    // Agregar la nueva marca al select
                    const select = document.getElementById('marca_id');
                    const option = document.createElement('option');
                    option.value = data.id;
                    option.text = data.nombre;
                    option.selected = true;
                    select.appendChild(option);

                    // Cerrar modal y limpiar
                    const modal = bootstrap.Modal.getInstance(document.getElementById('crearMarcaModal'));
                    modal.hide();
                    document.getElementById('formCrearMarca').reset();
                } else {
                    alert('Error al crear la marca.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Hubo un error en el envío.');
            });
        });
    </script>
</body>
</html>
