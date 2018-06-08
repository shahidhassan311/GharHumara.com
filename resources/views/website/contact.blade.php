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
                <div class="col-md-12" style="padding: 0px">

                    <h2 class="mainheadingcontact">CONTACT</h2>
                </div>


                <div class="col-md-12 contactbox">
                    <div class="col-md-8 contactboxdiv">
                        <div class="col-md-12 firstfield">
                        <div class="col-md-3">
                            <label for="name">Name*</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text">
                        </div>
                        </div>
                        <div class=" col-md-12 secondfield">
                            <div class="col-md-3">
                                <label for="email">Email*</label>
                            </div>
                            <div class="col-md-9">
                                <input type="email">
                            </div>
                        </div>
                        <div class="col-md-12 thirdfield">
                            <div class="col-md-3">
                                <label for="subject">Subject*</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-md-12 fourthfield">
                            <div class="col-md-3">
                                <label for="message">Message*</label>
                            </div>
                            <div class="col-md-9">
                                <textarea name="message" id="" cols="82" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 fourthfield">
                           <button type="submit" class="btn btn-danger sendbtn">SEND</button>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <h3>CONTACT US</h3>

                        <h5>Phone</h5>
                        <span>+92-3333949650</span>

                        <h5>Email</h5>
                        <span>info@weddecore.com</span>

                        <h5>Address</h5>
                        <span>Suite # 101 First Floor Progressive Square
P.E.C.H.S block 6 shahrah-e-faisal Karachi, Pakistan</span>


                        <img class="mailicon" src="/website/images/mailicon.png" alt="">
                    </div>
                </div>
            </div>
        </section>


    </main>

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