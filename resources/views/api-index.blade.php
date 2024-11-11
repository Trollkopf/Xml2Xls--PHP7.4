@extends('layouts.app')

@section('content')
    <h1 class="text-center mb-4 text-success">Descargar Excel</h1>
    <div class="card shadow-sm p-4 bg-danger-subtle">
        <div class="d-grid gap-2">
            @php
                $forms = [
                    [
                        'url' => 'https://www.oleinternational.com/kyero/general/thomasbesthomes/',
                        'name' => 'Web',
                        'includeUrlEs' => true,
                    ],
                    [
                        'url' => 'https://xml.redsp.net/file/403/23r917h0551/general-zone-1-kyero.xml',
                        'name' => 'RedSP',
                        'includeUrlEs' => false,
                    ],
                    [
                        'url' => 'https://xml.redsp.net/file/403/23r917h0551/special-zone-1-kyero.xml',
                        'name' => 'RedSp Special',
                        'includeUrlEs' => false,
                    ],
                    [
                        'url' => 'https://app.vendomia.es/feed/xml/all/106/4cde8b2f744e822eb87ecef9bfac714c',
                        'name' => 'Oceanside',
                        'includeUrlEs' => false,
                    ],
                    [
                        'url' => 'https://procesos.apinmo.com/portal/kyeroagencias3/6689-kyero-IYBg5qtA-reventas1.xml',
                        'name' => 'United Real State',
                        'includeUrlEs' => false,
                    ],

                ];

                $fields = [
                    'id',
                    'date',
                    'ref',
                    'price',
                    'new_build',
                    'type',
                    'town',
                    'province',
                    'country',
                    'location_detail',
                    'beds',
                    'baths',
                    'pool',
                    'surface_area.built',
                    'surface_area.plot',
                    'energy_rating.consumption',
                    'energy_rating.emissions',
                ];
            @endphp

            @foreach ($forms as $form)
                <form action="{{ route('convert.xml.to.excel') }}" method="POST">
                    @csrf
                    <input type="text" id="xml_url" name="xml_url" value="{{ $form['url'] }}" hidden>
                    <input type="text" id="xls_name" name="xls_name" value="{{ $form['name'] }}" hidden>
                    @foreach ($fields as $field)
                        <input type="checkbox" name="fields[]" value="{{ $field }}" checked hidden>
                    @endforeach
                    @if ($form['includeUrlEs'])
                        <input type="checkbox" name="fields[]" value="url.es" checked hidden>
                    @endif
                    <div class="d-grid">
                        <button type="submit" class="btn btn-danger btn-lg">{{ $form['name'] }}</button>
                    </div>
                </form>
            @endforeach
        </div>
    </div>

    <div class="container mt-5">
        <h1 class="text-center mb-4 text-primary">Subir Excel "Clientes"</h1>
        <div class="card shadow-sm p-4 bg-info-subtle">
            <form action="{{ route('upload.excel') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="excelFile" class="form-label">Seleccione un archivo Excel</label>
                    <input type="file" name="excelFile" id="excelFile" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Cargar y Procesar</button>
            </form>
        </div>
    </div>
@endsection
