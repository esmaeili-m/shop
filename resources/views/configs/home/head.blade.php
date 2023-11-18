<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>
        {{env('WEBSITE_NAME') ?? ''}} | @yield('title')
    </title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('dashboard/assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- Plugins Core Css -->
    <link href="{{asset('dashboard/assets/css/app.min.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/assets/js/bundles/materialize-rtl/materialize-rtl.min.css')}}" rel="stylesheet">
    <!-- Custom Css -->
    <link href="{{asset('dashboard/assets/css/style.css')}}" rel="stylesheet" />
    <!-- You can choose a theme from css/styles instead of get all themes -->
    <link href="{{asset('dashboard/assets/css/styles/all-themes.css')}}" rel="stylesheet" />
    <style>
        .pointer{
            cursor: pointer;
        }
        .my-swal-with {
            width: 300px !important;
            border-radius: 10px;
            font-size: 8px/* Set the width to 400 pixels */
        }
    </style>
    @livewireStyles
</head>
