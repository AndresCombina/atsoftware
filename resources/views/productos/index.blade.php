<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Lista de Productos</h1>
            <a href="{{ route('productos.create') }}" class="btn btn-success">+ Crear Producto</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Rubro</th>
                        <th>Subrubro</th>
                        <th>Grupo</th>
                        <th>Serie</th>
                        <th>Sector</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->marca->nombre ?? '-' }}</td>
                            <td>{{ $producto->rubro->nombre ?? '-' }}</td>
                            <td>{{ $producto->subrubro->nombre ?? '-' }}</td>
                            <td>{{ $producto->grupo->nombre ?? '-' }}</td>
                            <td>{{ $producto->serie ?? '-' }}</td>
                            <td>{{ $producto->sector->nombre ?? '-' }}</td>
                            <td>{{ $producto->stock ?? 0 }}</td>
                            <td>${{ number_format($producto->precio, 2, ',', '.') }}</td>
                            <td class="text-center">
                                <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if($productos->isEmpty())
                        <tr>
                            <td colspan="10" class="text-center text-muted">No hay productos cargados.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
