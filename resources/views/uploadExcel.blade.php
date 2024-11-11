@extends('layouts.app')

@section('content')
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
            <p class="text-muted text-success">Previsualización del archivo subido</p>
            <canvas id="excelPreviewCanvas" class="border" width="1100px" height="400"></canvas>
        </div>
    </div>

    <script>
        document.getElementById('excelFile').addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const data = new Uint8Array(e.target.result);
                    const workbook = XLSX.read(data, { type: 'array' });
                    const firstSheetName = workbook.SheetNames[0];
                    const worksheet = workbook.Sheets[firstSheetName];
                    const sheetData = XLSX.utils.sheet_to_json(worksheet, { header: 1 });
    
                    displaySheetData(sheetData);
                };
                reader.readAsArrayBuffer(file);
            }
        });
    
        function displaySheetData(sheetData) {
            const canvas = document.getElementById('excelPreviewCanvas');
            const ctx = canvas.getContext('2d');
            ctx.clearRect(0, 0, canvas.width, canvas.height);
    
            ctx.font = '14px Arial';
            let y = 20; // Initial Y position
    
            sheetData.forEach((row, rowIndex) => {
                let x = 10; // Initial X position
                row.forEach((cell) => {
                    ctx.fillText(cell !== undefined ? cell : '', x, y);
                    x += 100; // Increment X position for each cell
                });
                y += 20; // Increment Y position for each row
                if (y > canvas.height - 20) {
                    ctx.fillText('... (Más datos no visibles)', x, y);
                    return; // Stop rendering if data exceeds canvas height
                }
            });
        }
    </script>

@endsection