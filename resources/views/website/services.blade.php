<!DOCTYPE html>
<html lang="en">
<head>
    <title>WedDecore | Venue Portal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link rel="icon" href="/website/images/favicon.ico" type="image/x-icon">
    <link href="{{ URL::to('/') }}/website/css/grid.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/website/css/style.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/website/css/camera.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/website/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/website/css/jquery.fancybox.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/website/css/owl-carousel.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/website/css/subscribe-form.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/website/css/form.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('/') }}/website/css/w3.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/website/css/contact.css">

    <link rel="icon" href="/website/images/WDlogo.png" type="image/gif">

    <style type="text/css">.fancybox-margin {
            margin-right: 17px;
        }</style>
</head>

<body>
<div class="page">

    @include('website.header')



    <main>


        <section class="well" style="border: none !important; margin-bottom: 10px !important;">
            <div class="container maincontactcontainer" style="border: 2px solid rgba(212, 175, 54, 0.72);padding: 0px;">

            </div>
        </section>


    </main>

    <section class="container" style="padding-bottom: 50px; border: none !important;text-align: center;">
        <div class="col-md-12">
            <h2>WEDDECORE SERVICES</h2>
            <hr style="margin: auto">
            @foreach ($vendor_service as $key => $vendor_services)
                <div class="col-md-12 col-xs-12 service-div">
                    <div class="col-md-3 col-xs-12">
                        <img class="service-images-portion1" src="{{ URL::to('/') }}/uploads/{{ $vendor_services->image }}" alt="">
                    </div>
                    <div class="col-md-9 col-xs-12">
                        <h4 class="service-heading">{{ $vendor_services->service_type }}</h4>
                        <p class="service-content">{{ $vendor_services->details }}</p>
                    </div>
                </div>
            @endforeach
        </div>


    </section>
    <div style="padding-bottom: 19px">
        <div class="container maincontactcontainer" style="border: 2px solid rgba(212, 175, 54, 0.72);padding-bottom: 0px;">

        </div>
    </div>




    <!--========================================================
                              FOOTER
    =========================================================-->
    <!--footer-->
    @include('website.footer')
</div>


<script src="{{ URL::to('/') }}/website/js/jquery.js"></script>
<script src="{{ URL::to('/') }}/website/js/jquery-migrate-1.2.1.js"></script>
<script src="{{ URL::to('/') }}/website/js/device.min.js"></script>
<script src="{{ URL::to('/') }}/website/js/bootstrap.min.js"></script>


</body>
</html>