<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Cliente;
use Carbon\Carbon;


class ExcelUploadController extends Controller
{
    public function showUploadForm()
    {
        return view('uploadExcel');
    }

    public function uploadExcel(Request $request)
    {

        
        $request->validate([
            'excelFile' => 'required|mimes:xlsx,xls,csv',
        ]);
        
        $path = $request->file('excelFile')->getRealPath();
        $spreadsheet = IOFactory::load($path);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray(null, true, true, true);
        
        foreach ($rows as $index => $row) {
            if ($index <= 3)
            continue; // Ignorar las dos primeras filas (encabezados)
        
        // Convierte las fechas si están en un formato diferente
        $fechaRecepcion = Carbon::parse($row['B'])->format('Y-m-d');
        $fechaModificado = Carbon::parse($row['H'])->format('Y-m-d');
        
        // Verificar si el cliente ya existe en la base de datos por email
        $existingCliente = Cliente::where('email', $row['C'])->first();
        if ($existingCliente) {
            continue; // Si ya existe, omitir la inserción
        }
        
            Cliente::create([
                'nombre' => $row['D'],
                'email' => $row['C'],
                'telefono' => $row['E'],
                'notas' => $row['F'], // Asumiendo que 'mensaje' se almacena como 'notas'
                'fecha_creado' => $fechaRecepcion,
                'fecha_modificado' => $fechaModificado,
            ]);
        }

        return back()->with('success', 'Archivo cargado e importado a la base de datos con éxito.');
    }
}