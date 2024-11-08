<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Archivo Excel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Subir Archivo Excel</h2>
        <div class="card shadow-sm p-4">
            <form action="{{ route('upload.excel') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="excelFile" class="form-label">Seleccione un archivo Excel</label>
                    <input type="file" name="excelFile" id="excelFile" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Cargar y Procesar</button>
            </form>
        </div>
        
        <!-- Opción para hacer que el objeto sea 'drawable' -->
        <div class="mt-5 text-center">
            <p class="text-muted">Asegúrese de que el archivo sea visible para su previsualización si es necesario.</p>
            <canvas id="excelPreviewCanvas" class="border" width="600" height="400"></canvas>
        </div>
    </div>

    <script>
        document.getElementById('excelFile').addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                // Aquí podría ir un código para previsualizar el archivo si fuera necesario
                console.log('Archivo seleccionado:', file.name);
            }
        });
    </script>
</body>

</html>
