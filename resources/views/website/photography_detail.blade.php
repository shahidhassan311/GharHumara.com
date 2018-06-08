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

    <section style="background-color: #f7f2df !important; padding: 20px 0">
    <div class="col-xs-12" style="margin-bottom: 20px;height: fit-content">
        <h2 style="text-align: center">Chaudry Faisal Farrukh</h2>
        <hr style="margin: auto">
    </div>

    <div class="row">
        <div class="col-md-1 col-xs-12"></div>
        <div class="col-md-10 col-sm-12" style="margin-top: 60px">
        <div class="col-md-3" style="margin-bottom: 20px">
            <div class="photography-detail" style="text-align: center; border: 1px solid #d4af36;margin-top: 150px">
            <h4 class="service-heading">Photo Pahari</h4>
            <p>AVERAGE PRICE</p>
            <p>75,000</p>
            <p>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
            </p>
            </div>
        </div>
        <div class="col-md-6">
            <p style="text-align: center">
            <img src="/public/website/images/chaudry.jpeg" style="width: 100%">
            </p>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12" style="height: 100%">
            <h5 class="service-heading" style="margin: 10px 0px">Contact Agent</h5>
            <div class="col-md-12 col-sm-3 col-xs-12" style="padding: 0px">
                <div class="col-md-4 col-sm-12 col-xs-4" style="padding: 0px 5px 0 0"><img src="http://weddecore.com/website/images/icon-boy.jpg"></div>
                <div class="col-md-8 col-sm-12 col-xs-8" style="padding: 0px">
                    <div style="font-size: 18px">WedDecore Customer Support:<br> +92 333 33323806</div>
                </div>
            </div>
            <div class="col-md-12 col-sm-9 col-xs-12" style="padding: 0px">
                <form action="">
                    <div class="form-group" style="height: 38px;margin-top: 10px">
                        <input class="form-control" id="email" placeholder="Enter email" name="email" style="float: left" type="email">

                    </div>
                    <div class="form-group">
                        <input class="form-control" id="pwd" placeholder="Enter password" name="pwd" type="password">
                    </div>
                    <div class="form-group">
                        <textarea type="password" class="form-control" placeholder="Enter password" name="pwd"></textarea>
                    </div>
                    <div class="checkbox">
                        <label><input name="remember" type="checkbox"> I want to discuss budget</label>
                    </div>
                    <button type="submit" class="btn btn-danger sendbtn" style="width: 100%;margin: 0px !important;">Contact Agent
                    </button>
                    <p style="font-size: 13px;margin: 3px 0px !important;text-align: justify">By pressing
                        request info, you agree that WedDecore and vendors may contact you
                        via phone/text about your inquiry, which may involve the use of automated means. You
                        are not required to consent as a condition of availing any service, or booking
                        venue. Message/data rates may apply. You also agree to our <a>Terms of Use</a>.
                    </p>
                </form>
            </div>
        </div>
        <div class="col-xs-12">
            <h4 class="service-heading" style="text-align: left">About Chaudry Faisal:</h4>
            <p>My passion and my background are rooted in photojournalism. Telling stories with images is what I feel my purpose with a camera is. I approach a wedding day like it was a newspaper assignment, making images that will resonate for years to come in a very real, uncontrolled manner. Your story is important, whether in my hometown or halfway across the globe, I want to tell it so your grand kids can one day know who you really were.</p>
        </div>
            <div class="col-xs-12" style="margin-bottom: 20px">
                <h2 style="text-align: center">Portfolio</h2>
                <hr style="margin: auto">
            </div>
        </div>
        <div class="col-md-1 col-xs-12"></div>
    </div>

    <div class="w3-content w3-display-container">
        <img class="mySlides" src="/public/website/images/gallery/Gallery-6.jpg" style="width:100%">
        <img class="mySlides" src="/public/website/images/gallery/Gallery-7.jpg" style="width:100%">
        <img class="mySlides" src="/public/website/images/gallery/Gallery-8.jpg" style="width:100%">
        <img class="mySlides" src="/public/website/images/gallery/Gallery-9.jpg" style="width:100%">

        <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
        <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
    </div>

    </section>

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