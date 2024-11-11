<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Cliente;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;



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
            if ($index < 4)
                continue; // Ignorar las primeras tres filas (índices 0, 1 y 2)

            if (Cliente::where('email', $row['C'])->exists()) {
                continue; // Si ya existe, omitir la inserción
            }

            // Verifica si la fecha es numérica (para .xls) o está en formato de texto
            if (is_numeric($row['B'])) {
                $fechaRecepcion = Date::excelToDateTimeObject($row['B'])->format('Y-m-d');
            } else {
                $fechaRecepcion = \DateTime::createFromFormat('d/m/Y', $row['B']) ? \DateTime::createFromFormat('d/m/Y', $row['B'])->format('Y-m-d') : null;
            }

            if (is_numeric($row['H'])) {
                $fechaModificado = Date::excelToDateTimeObject($row['H'])->format('Y-m-d');
            } else {
                $fechaModificado = \DateTime::createFromFormat('d/m/Y', $row['H']) ? \DateTime::createFromFormat('d/m/Y', $row['H'])->format('Y-m-d') : null;
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