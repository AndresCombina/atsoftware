<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - AT Software</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    {{-- Menú superior --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">AT Software</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Proveedores</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Stock</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Compras</a></li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Contenido --}}
    <div class="container py-5">
        <h1 class="mb-4">Dashboard de Gestión</h1>

        {{-- Tarjetas resumen --}}
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">Total Proveedores</h5>
                        <p class="card-text fs-4">58</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Stock Disponible</h5>
                        <p class="card-text fs-4">1.342</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning">
                    <div class="card-body">
                        <h5 class="card-title">Compras del Mes</h5>
                        <p class="card-text fs-4">$278.000</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Gráficos --}}
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">Stock por Categoría</div>
                    <div class="card-body">
                        <canvas id="stockChart" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">Compras últimos 6 meses</div>
                    <div class="card-body">
                        <canvas id="comprasChart" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctxStock = document.getElementById('stockChart').getContext('2d');
        new Chart(ctxStock, {
            type: 'doughnut',
            data: {
                labels: ['Lubricantes', 'Filtros', 'Baterías', 'Otros'],
                datasets: [{
                    label: 'Stock',
                    data: [400, 250, 150, 120],
                    backgroundColor: ['#0d6efd', '#198754', '#ffc107', '#6c757d']
                }]
            }
        });

        const ctxCompras = document.getElementById('comprasChart').getContext('2d');
        new Chart(ctxCompras, {
            type: 'line',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
                datasets: [{
                    label: 'Compras ($)',
                    data: [120000, 95000, 130000, 80000, 150000, 278000],
                    borderColor: '#0d6efd',
                    backgroundColor: 'rgba(13,110,253,0.1)',
                    tension: 0.4,
                    fill: true
                }]
            }
        });
    </script>
</body>
</html>
