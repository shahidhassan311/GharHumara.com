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


        <section class="well" style="border: none !important;">
            <div class="container maincontactcontainer" style="border: 2px solid rgba(212, 175, 54, 0.72);padding: 0px;">
            
            </div>
        </section>


    </main>

    <section class="container" style="padding-bottom: 50px; border: none !important;">
        <div class="col-md-12">
        <h2 style="text-align: center">Who we are</h2>
            <hr style="margin: auto">
            <p style="text-align: justify">Established in 2018, WedDecore is a median based in Pakistan, which brings all wedding planners, venue owners & service vendors to one platform, so couples can get exactly what they want. Our aim is to create an experience that goes beyond expectations. We are one-stop-shop fully equipped to produce a range of events from conception to completion. Fuelled by passion and BIG ideas, WedDecore provides customized, strategic event experiences where families connect with our staff and vendors in ways that are personally relevant and memorable.
            </p>
        </div>
        <div class="col-md-12">
            <h2 style="text-align: center">What is our aim</h2>
            <hr style="margin: auto">
            <p class="" style="text-align: justify">Our approach is mainly focused on the customer's needs and the quality of service. Our team offers the creative vision, professionalism and expertise to create the best – with a constant eye towards detail, quality, originality and results. We aim for your targets and offer extended service to all our clients to build a relationship of a lifetime.</p>
        </div>
        <div class="col-md-12">
            <h2 style="text-align: center">Why WedDecore?</h2>
            <hr style="margin: auto">
            <div class="col-md-4 col-xs-12 table-column">
                <h3 class="table-heading">For Customers</h3>
                <div style="padding: 15px">
                Hassle Free
                <br>Quick &amp; Convenient
                <br>Best Possible Rates
                <br>Variety
                <br>Compare Venues
                <br>Exceptional Customer Service
                </div>
            </div>
            <div class="col-md-4 col-xs-12 table-column">
                <h3 class="table-heading">For Venues</h3>
                <div style="padding: 15px">
                Easy to join
                <br>Minimize Costs
                <br>Brand Exposure
                <br>24*7 Bookings
                <br>Online Presence &amp; Tools
                <br>Exceptional Customer Support
                </div>
            </div>
            <div class="col-md-4 col-xs-12 table-column">
                <h3 class="table-heading">For Vendors</h3>
                <div style="padding: 15px">
                Easy to join
                <br>Minimize Costs
                <br>Brand Exposure
                <br>24*7 Bookings
                <br>Online Presence &amp; Tools
                <br>Exceptional Customer Support
                </div>
            </div>
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