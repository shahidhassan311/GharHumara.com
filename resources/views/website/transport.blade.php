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
    <link href="{{ URL::to('/') }}/website/css/gallery.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('/') }}/website/css/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">

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
        <section class="container" style="border: none !important;text-align: center;">
            <div class="col-md-12 col-xs-12" style="text-align: center">
                <img class="service-images-portion1" src="public/website/images/icon-transport.png" alt="">
            </div>
            <div class="col-md-12 col-xs-12">
                <h4 class="service-heading">Transport</h4><br>
                <p class="service-content">Don't stress on how to get to the venue with all those guests. WedDecore's staff can also arrange transport for you & your guests.</p>
            </div>
        </section>

<div class="row" style="margin: 0">
            <div class="w3-content w3-display-container" style="max-width: none !important;">
                <div>
                <img class="mySlides" src="/public/website/images/sample_cars/car1.jpg" style="width:100%">
                <img class="mySlides" src="/public/website/images/sample_cars/car2.jpg" style="width:100%">
                <img class="mySlides" src="/public/website/images/sample_cars/car3.jpg" style="width:100%">
                <img class="mySlides" src="/public/website/images/sample_cars/car4.jpg" style="width:100%">

                <button class="w3-button w3-black w3-display-left transport-button" onclick="plusDivs(-1)">&#10094;</button>
                <button class="w3-button w3-black w3-display-right transport-button" onclick="plusDivs(1)">&#10095;</button>
                </div>

                <div class="w3-display-middle w3-container w3-padding-16 w3-black transport-form" style="background-color: #00000080 !important;width: 70%">
                    <div class="col-lg-12 col-xs-12 col-sm-12" style="padding: 15px;">
                        <div class="form-group col-sm-3 col-xs-12">
                            <label>Name</label>
                            <input name="name" placeholder="Name" value="" class="form-control" id="name" type="text">
                        </div>
                        <div class="form-group col-sm-3 col-xs-12">
                            <label for="exampleInputEmail1">Phone</label>
                            <input class="form-control" id="phone" placeholder="Phone" value="" name="phone" type="phone">
                        </div>
                        <div class="form-group col-sm-3 col-xs-12">
                            <label for="exampleInputEmail1">Email Address</label>
                            <input class="form-control" id="email" name="email" placeholder="Email Address" value="" type="email">
                        </div>
                        <div class="form-group col-sm-3 col-xs-12" style="margin-right:0px !important;">
                            <label for="exampleInputEmail1">Your Address</label>
                            <input class="form-control" id="email" name="email" placeholder="" value="" type="email">
                        </div>
                    </div>
                    <div class="col-lg-12 col-xs-12 col-sm-12" style="margin-top:-20px !important; padding: 15px;">
                        <div class="form-group col-sm-3 col-xs-12"> <label>Vehicle Type</label>
                            <select name="cat_id" id="cat_id" class="form-control" required="">
                                <option value="">Select Category</option>
                                <option value="2">Cars</option>
                                <option value="3">Jeeps / Suvs</option>
                                <option value="5">Luxury Cars</option>
                                <option value="1">Vans</option>
                                <option value="6">Buses</option>
                                <option value="7">Bullet Proof</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-3 col-xs-12">
                            <label>Vehicle Model</label>
                            <span id="carlst">
                                <select name="car_id" id="car_id" class="form-control" required="">
                                    <option value="">Select Type First</option>
                                </select>
                            </span>
                        </div>
                        <div class="form-group col-sm-3 col-xs-12">
                            <label for="exampleInputEmail1">Date</label>
                            <input id="date_out" name="date_out" class="form-control" required="required" value="">
                        </div>
                        <div class="form-group col-sm-3 col-xs-12" style="margin-right:0px !important;">
                            <label for="exampleInputEmail1">Event Venue</label>
                            <input id="return_date" name="return_date" class="form-control" required="required" value="">
                        </div>
                        <div class="col-lg-12 col-xs-12 col-sm-12" style="float: left;margin-top: 12px;">
                            <div class="col-xs-8" style="float: left;margin-top: 18px;">
                                <ul>
                                    <li style="display: inline-block"><i class="fa fa-check"></i>No Hidden Charges &nbsp;</li>
                                    <li style="display: inline-block"><i class="fa fa-check"></i>Low Price Guaranteed &nbsp;</li>
                                    <li style="display: inline-block"><i class="fa fa-check"></i>24/7 Support</li>
                                </ul>
                            </div>
                            <div class="col-xs-3" style="background-color: black;width: auto;padding: 8px;margin-top: 10px">
                                <input id="bCache" value="" type="hidden">
                                <input value="Request Booking" name="btnGetQuote" type="submit" style="background-color: black;border: black;">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

    <div class="col-xs-12">
    <div class="col-xs-2"></div>
            <div class="col-xs-8">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="theme-card">
                        <a href="/transport_detail">
                        <img src="/public/website/images/sample_cars/car1.jpg" alt="" class="theme-image">
                        <div class="w3-display-topright w3-large w3-container w3-padding-16" style="background-color: #d4af36;right: 15px;top: 10px;">
                            Rs.5,000
                        </div>
                        <div class="" style="padding: 2px 16px;">
                            <h4><b>Beetle</b></h4>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="theme-card">
                        <a href="/transport_detail">
                        <img src="/public/website/images/sample_cars/car2.jpg" alt="" class="theme-image">
                        <div class="w3-display-topright w3-large w3-container w3-padding-16" style="background-color: #d4af36;right: 15px;top: 10px;">
                            Rs.5,000
                        </div>
                        <div class="" style="padding: 2px 16px;">
                            <h4><b>Civic</b></h4>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="theme-card">
                        <a href="/transport_detail">
                        <img src="/public/website/images/sample_cars/car3.jpg" alt="" class="theme-image">
                        <div class="w3-display-topright w3-large w3-container w3-padding-16" style="background-color: #d4af36;right: 15px;top: 10px;">
                            Rs.5,000
                        </div>
                        <div class="" style="padding: 2px 16px;">
                            <h4><b>Corolla</b></h4>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="theme-card">
                        <a href="/transport_detail">
                        <img src="/public/website/images/sample_cars/car4.jpg" alt="" class="theme-image">
                        <div class="w3-display-topright w3-large w3-container w3-padding-16" style="background-color: #d4af36;right: 15px;top: 10px;">
                            Rs.5,000
                        </div>
                        <div class="" style="padding: 2px 16px;">
                            <h4><b>City</b></h4>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="theme-card">
                        <a href="/transport_detail">
                        <img src="/public/website/images/sample_cars/car1.jpg" alt="" class="theme-image">
                        <div class="w3-display-topright w3-large w3-container w3-padding-16" style="background-color: #d4af36;right: 15px;top: 10px;">
                            Rs.5,000
                        </div>
                        <div class="" style="padding: 2px 16px;">
                            <h4><b>Mercedes</b></h4>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="theme-card">
                        <a href="/transport_detail">
                        <img src="/public/website/images/sample_cars/car2.jpg" alt="" class="theme-image">
                        <div class="w3-display-topright w3-large w3-container w3-padding-16" style="background-color: #d4af36;right: 15px;top: 10px;">
                            Rs.5,000
                        </div>
                        <div class="" style="padding: 2px 16px;">
                            <h4><b>Mirage</b></h4>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="theme-card">
                        <a href="/transport_detail">
                        <img src="/public/website/images/sample_cars/car3.jpg" alt="" class="theme-image">
                        <div class="w3-display-topright w3-large w3-container w3-padding-16" style="background-color: #d4af36;right: 15px;top: 10px;">
                            Rs.5,000
                        </div>
                        <div class="" style="padding: 2px 16px;">
                            <h4><b>Mehran</b></h4>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="theme-card">
                        <a href="/transport_detail">
                        <img src="/public/website/images/sample_cars/car4.jpg" alt="" class="theme-image">
                        <div class="w3-display-topright w3-large w3-container w3-padding-16" style="background-color: #d4af36;right: 15px;top: 10px;">
                            Rs.5,000
                        </div>
                        <div class="" style="padding: 2px 16px;">
                            <h4><b>Cultus</b></h4>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="theme-card">
                        <a href="/transport_detail">
                        <img src="/public/website/images/sample_cars/car1.jpg" alt="" class="theme-image">
                        <div class="w3-display-topright w3-large w3-container w3-padding-16" style="background-color: #d4af36;right: 15px;top: 10px;">
                            Rs.5,000
                        </div>
                        <div class="" style="padding: 2px 16px;">
                            <h4><b>Audi A4</b></h4>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
    <div class="col-xs-2"></div>
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
<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        if (n > x.length) {slideIndex = 1}
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex-1].style.display = "block";
    }
</script>

</body>
</html>