<!DOCTYPE html>
<html lang="en-us">

<head>
    <title>AdminPanel</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- STYLESHEETS -->
    <style type="text/css">
        [fuse-cloak],
        .fuse-cloak {
            display: none !important;
        }
        .modal-backdrop{
            position: relative !important;
        }
    </style>
    <!-- Icons.css -->
    <link type="text/css" rel="stylesheet" href="{{ URL::to('/') }}/adminpanel/icons/fuse-icon-font/style.css">
    <!-- Animate.css -->
    <link type="text/css" rel="stylesheet" href="{{ URL::to('/') }}/adminpanel/vendor/animate.css/animate.min.css">
    <!-- PNotify -->
    <link type="text/css" rel="stylesheet" href="{{ URL::to('/') }}/adminpanel/vendor/pnotify/pnotify.custom.min.css">
    <!-- Nvd3 - D3 Charts -->
    <link type="text/css" rel="stylesheet" href="{{ URL::to('/') }}/adminpanel/vendor/nvd3/build/nv.d3.min.css" />
    <!-- Perfect Scrollbar -->
    <link type="text/css" rel="stylesheet" href="{{ URL::to('/') }}/adminpanel/vendor/perfect-scrollbar/css/perfect-scrollbar.min.css" />
    <!-- Fuse Html -->
    <link type="text/css" rel="stylesheet" href="{{ URL::to('/') }}/adminpanel/vendor/fuse-html/fuse-html.min.css" />
    <!-- Main CSS -->
    <link type="text/css" rel="stylesheet" href="{{ URL::to('/') }}/adminpanel/css/main.css">
    <link type="text/css" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- / STYLESHEETS -->

    <!-- JAVASCRIPT -->
    <!-- jQuery -->
    <script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/vendor/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/js/myscript.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/js/add_hall.js"></script>
    <!-- Mobile Detect -->
    <script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/vendor/mobile-detect/mobile-detect.min.js"></script>
    <!-- Perfect Scrollbar -->
    <script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
    <!-- Popper.js -->
    <script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/vendor/popper.js/index.js"></script>
    <!-- Bootstrap -->
    <script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/vendor/bootstrap/bootstrap.min.js"></script>
    <!-- Nvd3 - D3 Charts -->
    <script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/vendor/d3/d3.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/vendor/nvd3/build/nv.d3.min.js"></script>
    <!-- Data tables -->
    <script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/vendor/datatables-responsive/js/dataTables.responsive.js"></script>
    <!-- PNotify -->
    <script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/vendor/pnotify/pnotify.custom.min.js"></script>
    <!-- Fuse Html -->
    <script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/vendor/fuse-html/fuse-html.min.js"></script>
    <!-- Main JS -->
    <script type="text/javascript" src="{{ URL::to('/') }}/adminpanel/js/main.js"></script>
    <!-- / JAVASCRIPT -->
    <script>
        window.Laravel =<?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body class="layout layout-vertical layout-left-navigation layout-below-toolbar">
<main>
    <div id="wrapper">
        @section('body-top')
            @include('layouts.admin_sidebar')
        @show
            <div class="content-wrapper">
                @include('layouts.topbar')

                @yield('content')

            </div>
    </div>
</main>
</body>

</html>