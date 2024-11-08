<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XML to XLS Converter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">XML to XLS Converter</h1>
        <div class="card shadow-sm p-4 mb-4">
            <form action="/convert" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="xml_url" class="form-label">URL</label>
                    <input type="text" class="form-control" id="xml_url" name="xml_url" placeholder="Enter the XML URL">
                </div>
                <div class="mb-3">
                    <label for="xls_name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="xls_name" name="xls_name" placeholder="Enter the XLS name">
                </div>
                <div class="mb-3">
                    <label for="fields" class="form-label">Select fields to import:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="fields[]" value="id" id="field-id" checked>
                        <label class="form-check-label" for="field-id">ID</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="fields[]" value="date" id="field-date" checked>
                        <label class="form-check-label" for="field-date">Fecha</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="fields[]" value="ref" id="field-ref" checked>
                        <label class="form-check-label" for="field-ref">Ref</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="fields[]" value="price" id="field-price" checked>
                        <label class="form-check-label" for="field-price">Tarifa</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="fields[]" value="new_build" id="field-new_build" checked>
                        <label class="form-check-label" for="field-new_build">Nueva Construcci&oacute;n</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="fields[]" value="type" id="field-type" checked>
                        <label class="form-check-label" for="field-type">Tipo</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="fields[]" value="town" id="field-town" checked>
                        <label class="form-check-label" for="field-town">Ciudad</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="fields[]" value="province" id="field-province" checked>
                        <label class="form-check-label" for="field-province">Provincia</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="fields[]" value="country" id="field-country" checked>
                        <label class="form-check-label" for="field-country">Pa&iacute;s</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="fields[]" value="location_detail" id="field-location_detail" checked>
                        <label class="form-check-label" for="field-location_detail">Localizaci&oacute;n</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="fields[]" value="beds" id="field-beds" checked>
                        <label class="form-check-label" for="field-beds">Dormitorios</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="fields[]" value="baths" id="field-baths" checked>
                        <label class="form-check-label" for="field-baths">Aseos</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="fields[]" value="pool" id="field-pool" checked>
                        <label class="form-check-label" for="field-pool">Piscina</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="fields[]" value="surface_area.built" id="field-built" checked>
                        <label class="form-check-label" for="field-built">Construcci&oacute;n</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="fields[]" value="surface_area.plot" id="field-plot" checked>
                        <label class="form-check-label" for="field-plot">Parcela</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="fields[]" value="energy_rating.consumption" id="field-consumption" checked>
                        <label class="form-check-label" for="field-consumption">Consumo</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="fields[]" value="energy_rating.emissions" id="field-emissions" checked>
                        <label class="form-check-label" for="field-emissions">Emisiones</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="fields[]" value="url.es" id="field-url" checked>
                        <label class="form-check-label" for="field-url">Enlace</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Convertir</button>
            </form>
        </div>
    <form action="/convert" method="POST">
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
        <button type="submit" class="btn btn-danger">RedSP</button>
    </form>
    <br>
    <form action="/convert" method="POST">
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
        <button type="submit" class="btn btn-danger">RedSP Especial</button>
    </form>
<br>

<a href="{{route('upload.view')}}" class="btn btn-info">Subir Excel</a> 
</body>

</html>
