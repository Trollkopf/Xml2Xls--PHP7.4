<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXCEL OPERATOR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark-subtle">

    @if (session('success'))
    <div class="alert alert-success d-flex align-items-center position-fixed top-0 start-50 translate-middle-x" style="width: 80%; margin-top: 40px; z-index: 1050; color: green;" role="alert">
        <i class="bi bi-check-circle-fill me-2" style="font-size: 24px; color: green;"></i>
        <div class="flex-grow-1">
            {{ session('success') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


    <div class="container mt-5">
        <div class="shadow-sm p-4 bg-light">

            @yield('content')

        </div>
    </div>
</body>
