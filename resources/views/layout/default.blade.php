<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Blog</title>

    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/orders.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/fontawesome5/css/all.min.css') }}">

    <style>
        @media only screen and (min-width: 992px){
            body {
                height: 100%;
                background-image: url('{{ asset('assets/frontend/assets/images/blog-bg.jpg') }}');
                background-repeat: repeat;
                background-size:contain;
            }
        }
    </style>
</head>

<body>


<div class="container-fluid main">
    @yield('body')
</div>


<script src="{{ asset('assets/frontend/assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/js/bootstrapjs/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/js/countries/dist/countries.js') }}"></script>
<script>
    document.addEventListener("load", loadCountries());
</script>
</body>
</html>
