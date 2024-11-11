<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXCEL OPERATOR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body class="bg-dark-subtle">

    @if (session('success'))
        <div class="alert alert-success d-flex align-items-center position-fixed top-0 start-50 translate-middle-x fade show mt-4 px-4"
            style="z-index: 1050; color: green;" role="alert">
            <i class="bi bi-check-circle-fill me-2" style="font-size: 24px; color: green;"></i>
            <div class="flex-grow-1">
                {{ session('success') }}
            </div>
        </div>
        <script>
            setTimeout(function() {
                let alertElement = document.querySelector('.alert');
                if (alertElement) {
                    alertElement.classList.remove('show');
                    alertElement.classList.add('fade-out');
                    setTimeout(() => alertElement.remove(), 500); // Remove after fade-out animation
                }
            }, 3000); // 3 seconds delay
        </script>
    @endif


    <div class="container mt-5">
        <div class="shadow-sm p-4 bg-light">

            @yield('content')

        </div>
    </div>
</body>
