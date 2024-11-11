@extends('layouts.app')

@section('content')
    <h1 class="text-center mb-4 text-success">Descargar Excel</h1>
    <div class="card shadow-sm p-4 bg-success-subtle">
        <div class="d-grid gap-2">
            <form action="{{route('convert.xml.to.excel')}}" method="POST">
                @csrf
                <input type="text" id="xml_url" name="xml_url" value="https://www.oleinternational.com/kyero/general/thomasbesthomes/" hidden>
                <input type="text" id="xls_name" name="xls_name" value="Web" hidden>
                <input type="checkbox" name="fields[]" value="id" checked hidden>
                <input type="checkbox" name="fields[]" value="date" checked hidden>
                <input type="checkbox" name="fields[]" value="ref" checked hidden>
                <input type="checkbox" name="fields[]" value="price" checked hidden>
                <input type="checkbox" name="fields[]" value="new_build" checked hidden>
                <input type="checkbox" name="fields[]" value="type" checked hidden>
                <input type="checkbox" name="fields[]" value="town" checked hidden>
                <input type="checkbox" name="fields[]" value="province" checked hidden>
                <input type="checkbox" name="fields[]" value="country" checked hidden>
                <input type="checkbox" name="fields[]" value="location_detail" checked hidden>
                <input type="checkbox" name="fields[]" value="beds" checked hidden>
                <input type="checkbox" name="fields[]" value="baths" checked hidden>
                <input type="checkbox" name="fields[]" value="pool" checked hidden>
                <input type="checkbox" name="fields[]" value="surface_area.built" checked hidden>
                <input type="checkbox" name="fields[]" value="surface_area.plot" checked hidden>
                <input type="checkbox" name="fields[]" value="energy_rating.consumption" checked hidden>
                <input type="checkbox" name="fields[]" value="energy_rating.emissions" checked hidden>
                <input type="checkbox" name="fields[]" value="url.es" checked hidden>
                <div class="d-grid">
                    <button type="submit" class="btn btn-success btn-lg">Web</button>
                </div>
            </form>
            <form action="{{route('convert.xml.to.excel')}}" method="POST">
                @csrf
                <input type="text" id="xml_url" name="xml_url"
                    value="https://xml.redsp.net/file/403/23r917h0551/general-zone-1-kyero.xml" hidden>
                <input type="text" id="xls_name" name="xls_name" value="RedSP" hidden>
                <input type="checkbox" name="fields[]" value="id" checked hidden>
                <input type="checkbox" name="fields[]" value="date" checked hidden>
                <input type="checkbox" name="fields[]" value="ref" checked hidden>
                <input type="checkbox" name="fields[]" value="price" checked hidden>
                <input type="checkbox" name="fields[]" value="new_build" checked hidden>
                <input type="checkbox" name="fields[]" value="type" checked hidden>
                <input type="checkbox" name="fields[]" value="town" checked hidden>
                <input type="checkbox" name="fields[]" value="province" checked hidden>
                <input type="checkbox" name="fields[]" value="country" checked hidden>
                <input type="checkbox" name="fields[]" value="location_detail" checked hidden>
                <input type="checkbox" name="fields[]" value="beds" checked hidden>
                <input type="checkbox" name="fields[]" value="baths" checked hidden>
                <input type="checkbox" name="fields[]" value="pool" checked hidden>
                <input type="checkbox" name="fields[]" value="surface_area.built" checked hidden>
                <input type="checkbox" name="fields[]" value="surface_area.plot" checked hidden>
                <input type="checkbox" name="fields[]" value="energy_rating.consumption" checked hidden>
                <input type="checkbox" name="fields[]" value="energy_rating.emissions" checked hidden>
                <div class="d-grid">
                    <button type="submit" class="btn btn-success btn-lg">RedSp</button>
                </div>
            </form>
            <form action="{{route('convert.xml.to.excel')}}" method="POST">
                @csrf
                <input type="text" id="xml_url" name="xml_url"
                    value="https://xml.redsp.net/file/403/23r917h0551/special-zone-1-kyero.xml" hidden>
                <input type="text" id="xls_name" name="xls_name" value="RedSP_Especial" hidden>
                <input type="checkbox" name="fields[]" value="id" checked hidden>
                <input type="checkbox" name="fields[]" value="date" checked hidden>
                <input type="checkbox" name="fields[]" value="ref" checked hidden>
                <input type="checkbox" name="fields[]" value="price" checked hidden>
                <input type="checkbox" name="fields[]" value="new_build" checked hidden>
                <input type="checkbox" name="fields[]" value="type" checked hidden>
                <input type="checkbox" name="fields[]" value="town" checked hidden>
                <input type="checkbox" name="fields[]" value="province" checked hidden>
                <input type="checkbox" name="fields[]" value="country" checked hidden>
                <input type="checkbox" name="fields[]" value="location_detail" checked hidden>
                <input type="checkbox" name="fields[]" value="beds" checked hidden>
                <input type="checkbox" name="fields[]" value="baths" checked hidden>
                <input type="checkbox" name="fields[]" value="pool" checked hidden>
                <input type="checkbox" name="fields[]" value="surface_area.built" checked hidden>
                <input type="checkbox" name="fields[]" value="surface_area.plot" checked hidden>
                <input type="checkbox" name="fields[]" value="energy_rating.consumption" checked hidden>
                <input type="checkbox" name="fields[]" value="energy_rating.emissions" checked hidden>
                <div class="d-grid">
                    <button type="submit" class="btn btn-success btn-lg">RedSp Special</button>
                </div>
            </form>
            <form action="{{route('convert.xml.to.excel')}}" method="POST">
                @csrf
                <input type="text" id="xml_url" name="xml_url"
                    value="https://app.vendomia.es/feed/xml/all/106/4cde8b2f744e822eb87ecef9bfac714c" hidden>
                <input type="text" id="xls_name" name="xls_name" value="Oceanside" hidden>
                <input type="checkbox" name="fields[]" value="id" checked hidden>
                <input type="checkbox" name="fields[]" value="date" checked hidden>
                <input type="checkbox" name="fields[]" value="ref" checked hidden>
                <input type="checkbox" name="fields[]" value="price" checked hidden>
                <input type="checkbox" name="fields[]" value="new_build" checked hidden>
                <input type="checkbox" name="fields[]" value="type" checked hidden>
                <input type="checkbox" name="fields[]" value="town" checked hidden>
                <input type="checkbox" name="fields[]" value="province" checked hidden>
                <input type="checkbox" name="fields[]" value="country" checked hidden>
                <input type="checkbox" name="fields[]" value="location_detail" checked hidden>
                <input type="checkbox" name="fields[]" value="beds" checked hidden>
                <input type="checkbox" name="fields[]" value="baths" checked hidden>
                <input type="checkbox" name="fields[]" value="pool" checked hidden>
                <input type="checkbox" name="fields[]" value="surface_area.built" checked hidden>
                <input type="checkbox" name="fields[]" value="surface_area.plot" checked hidden>
                <input type="checkbox" name="fields[]" value="energy_rating.consumption" checked hidden>
                <input type="checkbox" name="fields[]" value="energy_rating.emissions" checked hidden>
                <div class="d-grid">
                    <button type="submit" class="btn btn-success btn-lg">Oceanside</button>
                </div>
            </form>
            <form action="{{route('convert.xml.to.excel')}}" method="POST">
                @csrf
                <input type="text" id="xml_url" name="xml_url"
                    value="https://procesos.apinmo.com/portal/kyeroagencias3/6689-kyero-IYBg5qtA-reventas1.xml" hidden>
                <input type="text" id="xls_name" name="xls_name" value="United_Real_State" hidden>
                <input type="checkbox" name="fields[]" value="id" checked hidden>
                <input type="checkbox" name="fields[]" value="date" checked hidden>
                <input type="checkbox" name="fields[]" value="ref" checked hidden>
                <input type="checkbox" name="fields[]" value="price" checked hidden>
                <input type="checkbox" name="fields[]" value="new_build" checked hidden>
                <input type="checkbox" name="fields[]" value="type" checked hidden>
                <input type="checkbox" name="fields[]" value="town" checked hidden>
                <input type="checkbox" name="fields[]" value="province" checked hidden>
                <input type="checkbox" name="fields[]" value="country" checked hidden>
                <input type="checkbox" name="fields[]" value="location_detail" checked hidden>
                <input type="checkbox" name="fields[]" value="beds" checked hidden>
                <input type="checkbox" name="fields[]" value="baths" checked hidden>
                <input type="checkbox" name="fields[]" value="pool" checked hidden>
                <input type="checkbox" name="fields[]" value="surface_area.built" checked hidden>
                <input type="checkbox" name="fields[]" value="surface_area.plot" checked hidden>
                <input type="checkbox" name="fields[]" value="energy_rating.consumption" checked hidden>
                <input type="checkbox" name="fields[]" value="energy_rating.emissions" checked hidden>
                <div class="d-grid">
                    <button type="submit" class="btn btn-success btn-lg">United Real State</button>
                </div>
            </form>
        </div>
    </div>


    <div class="container mt-5">
        <h2 class="text-center mb-4 text-primary">Subir Excel "Clientes"</h2>
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
