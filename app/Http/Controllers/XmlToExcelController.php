<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class XmlToExcelController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function convert(Request $request)
    {
        // dd($request);
        $xmlUrl = $request->input('xml_url');
        $selectedFields = $request->input('fields');
        $xlsName = $request->input('xls_name');

        // Title fields array
        $fieldTitles = [
            'id' => 'ID',
            'date' => 'Fecha',
            'ref' => 'REF',
            'price' => 'Tarifa',
            'new_build' => 'Nueva vivienda',
            'type' => 'Tipo',
            'town' => 'Ciudad',
            'province' => 'Provincia',
            'country' => 'País',
            'location_detail' => 'Localización',
            'beds' => 'Habitaciones',
            'baths' => 'Aseos',
            'pool' => 'Piscina',
            'surface_area.built' => 'Superficie construida',
            'surface_area.plot' => 'Parcela',
            'energy_rating.consumption' => 'Consumo',
            'energy_rating.emissions' => 'Emisiones',
            'url.es' => 'Enlace'
        ];

        $booleanFields = ['new_build', 'pool'];

        $xmlContent = file_get_contents($xmlUrl);
        $xml = simplexml_load_string($xmlContent);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header
        $col = 'A';
        foreach ($selectedFields as $field) {
            $title = isset($fieldTitles[$field]) ? $fieldTitles[$field] : $field;
            $sheet->setCellValue($col . '1', $title);
            // Set bold header
            $sheet->getStyle($col . '1')->getFont()->setBold(true);
            // Set automatic column width
            $sheet->getColumnDimension($col)->setAutoSize(true);
            $col++;
        }

        // Set data
        $row = 2;
        foreach ($xml->property as $property) {
            $col = 'A';
            foreach ($selectedFields as $field) {
                // Check for nested fields
                if (strpos($field, '.') !== false) {
                    $parts = explode('.', $field);
                    $value = $property;
                    foreach ($parts as $part) {
                        $value = $value->{$part};
                    }
                } else {
                    $value = $property->{$field};
                }

                // Convert boolean fields
                if (in_array($field, $booleanFields)) {
                    $value = ((string) $value === '1') ? 'Sí' : 'No';
                }

                // Format price fields
                if ($field === 'price') {
                    $value = number_format((float) $value, 0, '', '.') . ' €';
                }

                // Format date fields
                if ($field === 'date') {
                    $date = new \DateTime((string) $value);
                    $value = $date->format('d-m-Y');
                }

                // Ensure 'ref' is treated as a string and preserve leading zeros
                if ($field === 'ref') {
                    $value = (string) $value;  // Convert to string to preserve leading zeros
                }

                // Handle hyperlink field
                if ($field === 'url.es') {
                    $value = (string) $value;

                    // Fix URL by replacing double slashes (//) after "properties"
                    $correctedUrl = str_replace('//', '/', $value);

                    // Set the hyperlink with the corrected URL
                    $sheet->setCellValue($col . $row, 'Enlace');
                    $sheet->getCell($col . $row)->getHyperlink()->setUrl($correctedUrl);
                } else {
                    $sheet->setCellValue($col . $row, (string) $value);
                }
                $col++;
            }
            $row++;
        }

        // Create auto filter
        $sheet->setAutoFilter($sheet->calculateWorksheetDimension());

        // Freeze first row
        $sheet->freezePane('A2');

        // Generate file name with current date
        $currentDate = date('d-m-Y');
        $fileName = $xlsName . '_' . $currentDate . '.xlsx';

        $writer = new Xlsx($spreadsheet);
        // dd($fileName);
        $writer->save($fileName);

        return response()->download($fileName)->deleteFileAfterSend(true);
    }
}