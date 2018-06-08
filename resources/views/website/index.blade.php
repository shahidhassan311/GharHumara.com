<!DOCTYPE html>
<html lang="en">
<head>
    <title>WedDecore | Venue Portal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link href="{{ URL::to('/') }}/website/css/grid.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/website/css/style.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/website/css/camera.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/website/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/website/css/jquery.fancybox.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/website/css/owl-carousel.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/website/css/subscribe-form.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/website/css/form.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('/') }}/website/css/w3.css">

    <link rel="icon" href="/website/images/tab-icon.png" type="image/gif">

    <style type="text/css">.fancybox-margin {
            margin-right: 17px;
        }</style>
</head>

<body>
<div class="page">



    @include('website.header')

    <main>


        <div class="w3-content w3-section" style="max-width:100%">
            <img class="mySlides" src="/website/images/banners/banner1.jpg" style="width:100%;">
            <img class="mySlides" src="/website/images/banners/banner2.jpg" style="width:100%;">
            <img class="mySlides" src="/website/images/banners/banner3.jpg" style="width:100%;">



        </div>


        <section class="well center">

            <div class="container ">

                <h2>Welcome to WedDecore</h2>


                <hr style="margin: auto">


                <p class="ins1">
                    Make Your Weddings & Events Special With WedDecore. Find and Book Halls, Banquets and Lawns
                    With Pakistan's Largest Online Listing Portal.
                </p>
                <div class="row">

                    <div class="col-md-3 col-sm-3 col-xs-12 aboutussec  wow fadeInLeft">

                        <img src="/website/images/firstsection/wedding_image1.jpg" alt="" style="border-radius: 10px">

                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-12 aboutussec wow fadeInLeft">

                        <img src="/website/images/firstsection/wedding_image2.jpg" alt="" style="border-radius: 10px">

                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-12 aboutussec wow fadeInLeft">

                        <img src="/website/images//firstsection/wedding_image3.jpg" alt="" style="border-radius: 10px">

                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-12 aboutussec wow fadeInRight">

                        <img src="/website/images/firstsection/wedding_image4.jpg" alt="" style="border-radius: 10px">

                    </div>

                </div>

                <hr>

            </div>

        </section>

        <section class="well3 center bg-primary sets2" style="background-image: url(/website/images/middle.jpg) !important;">
            <div class="container">
                <h2 style="color: black">
                    What is WedDecore.com
                </h2>
                <hr style="margin: auto">

                <p class="ins1" style="color: black;font-weight: bold;
    font-size: 20px;">
                    WedDecore.com is Pakistan's leading Wedding Planner Portal. We connect Wedding Planners and Hall
                    owners to
                    Customers Across the country
                </p>
                <a href="/about" class="btn sendbtn">Learn More</a>
                <hr style="margin: auto">

            </div>
        </section>


        <section class="well center">

            <div class="container services-container">

                <h2>DISCOVER WEDDECORE</h2>


                <hr style="margin: auto">


                <div class="col-md-12 col-xs-12" style="margin-top: 35px">
                    <div class="col-md-3 col-xs-12 content-box" >
                        <a href="/venue">
                        <div class="col-md-12 col-xs-12">
                            <img class="service-images-portion1" src="public/website/images/icon-venue.png" alt="">
                        </div>
                        <div class="col-md-12 col-xs-12" style="padding: 0px">
                            <h4 class="main-service-heading">Venue</h4>
                            <p class="main-service-content">Booking a perfect venue on perfect date is the biggest hassle. WedDecore brings all wedding venues to a single screen on our Website/Mobile App.</p>
                        </div>
                            </a>
                    </div>
                    <div class="col-md-3 col-xs-12 content-box" >
                        <a href="/catering">
                        <div class="col-md-12 col-xs-12">
                            <img class="service-images-portion1" src="public/website/images/icon-catering.png" alt="">
                        </div>
                        <div class="col-md-12 col-xs-12" style="padding: 0px">
                            <h4 class="main-service-heading">Catering</h4>
                            <p class="main-service-content">Catering for your special day is a privilege. Reach your guest's heart through their stomach using WedDecore's Catering Service.</p>
                        </div>
                            </a>
                    </div>
                    <div class="col-md-3 col-xs-12 content-box" >
                        <a href="/decoration">
                        <div class="col-md-12 col-xs-12">
                            <img class="service-images-portion1" src="public/website/images/icon-decoration.png" alt="">
                        </div>
                        <div class="col-md-12 col-xs-12" style="padding: 0px">
                            <h4 class="main-service-heading">Decoration</h4>
                            <p class="main-service-content">We strive to do justice to special occasions. WedDecore not only books your event venue, but also provides you with multiple decoration plans.</p>
                        </div>
                            </a>
                    </div>
                    <div class="col-md-3 col-xs-12 content-box" >
                        <a href="/card">
                            <div class="col-md-12 col-xs-12">
                                <img class="service-images-portion1" src="public/website/images/icon-wcard.png" alt="" style="width: 85px;height: 85px">
                            </div>
                            <div class="col-md-12 col-xs-12" style="padding: 0px">
                                <h4 class="main-service-heading">Wedding Cards</h4>
                                <p class="main-service-content">We strive to do justice to special occasions. WedDecore not only books your event venue, but also provides you with multiple decoration plans.</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12" style="margin-top: 35px">
                    <div class="col-md-3 col-xs-12 content-box" >
                        <a href="/photography">
                        <div class="col-md-12 col-xs-12">
                            <img class="service-images-portion1" src="public/website/images/icon-photography.png" alt="">
                        </div>
                        <div class="col-md-12 col-xs-12" style="padding: 0px">
                            <h4 class="main-service-heading">Photography</h4>
                            <p class="main-service-content">Make your special day memorable with WedDecore's Photography Service, which allows you to capture precious moments and preserve them forever.</p>
                        </div>
                            </a>
                    </div>
                    <div class="col-md-3 col-xs-12 content-box" >
                        <a href="/floral">
                        <div class="col-md-12 col-xs-12">
                            <img class="service-images-portion1" src="public/website/images/icon-floral.png" alt="">
                        </div>
                        <div class="col-md-12 col-xs-12" style="padding: 0px">
                            <h4 class="main-service-heading">Floral</h4>
                            <p class="main-service-content">Everyone is so busy during the event. Let WedDecore worry about all floral arrangements with WedDecore's Floral Service.</p>
                        </div>
                            </a>
                    </div>
                    <div class="col-md-3 col-xs-12 content-box" >
                        <a href="/styling">
                        <div class="col-md-12 col-xs-12">
                            <img class="service-images-portion1" src="public/website/images/icon-makeup.png" alt="">
                        </div>
                        <div class="col-md-12 col-xs-12" style="padding: 0px">
                            <h4 class="main-service-heading">Bride/Groom Styling</h4>
                            <p class="main-service-content">Look precious on your most special day. Stand out among the rest with help of WedDecore's Bride/Groom Styling Service.</p>
                        </div>
                            </a>
                    </div>
                    <div class="col-md-3 col-xs-12 content-box" >
                        <a href="/transport">
                        <div class="col-md-12 col-xs-12">
                            <img class="service-images-portion1" src="public/website/images/icon-transport.png" alt="">
                        </div>
                        <div class="col-md-12 col-xs-12" style="padding: 0px">
                            <h4 class="main-service-heading">Transport</h4>
                            <p class="main-service-content">Don't stress on how to get to the venue with all those guests. WedDecore's staff can also arrange transport for you & your guests.</p>
                        </div>
                            </a>
                    </div>
                </div>


            </div>

        </section>



        <section class="well3 center bg-primary sets2" style="background-image: url(/website/images/111.jpg) !important;">
            <div class="container">
                <h2 style="color: black">
                    Gallery
                </h2>
                <hr style="margin: auto">

                <div class="row box-hover">

                    <div class="col-md-3 wow fadeInLeft">
                        <a href="#" data-toggle="modal" data-target="#1" class="thumb circle-box" data-fancybox-group="1">
                            <img src="/website/images/Gallery_1.jpg">
                        </a>
                        <div class="modal fade" id="1" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content" style="background-color: #d4af36">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/website/images/Gallery_1_orignal.jpg">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 wow fadeInLeft">
                        <a href="#" data-toggle="modal" data-target="#2" class="thumb circle-box" data-fancybox-group="1">
                            <img src="/website/images/Gallery_2.jpg">
                        </a>
                        <div class="modal fade" id="2" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content" style="background-color: #d4af36">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/website/images/Gallery_2_orignal.jpg">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 wow fadeInLeft">
                        <a href="#" data-toggle="modal" data-target="#3" class="thumb circle-box" data-fancybox-group="1">
                            <img src="/website/images/Gallery_3.jpg">
                        </a>
                        <div class="modal fade" id="3" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content" style="background-color: #d4af36">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/website/images/Gallery_3_orignal.jpg">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 wow fadeInLeft">
                        <a href="#" data-toggle="modal" data-target="#4" class="thumb circle-box" data-fancybox-group="1">
                            <img src="/website/images/Gallery_4.jpg">
                        </a>
                        <div class="modal fade" id="4" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content" style="background-color: #d4af36">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="/website/images/Gallery_4_orignal.jpg">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <a href="/gallery" class="btn sendbtn">Full Catalog</a>
                <hr style="margin: auto">

            </div>
        </section>

        <section class="well2  bg-secondary center">

            <div class="container booksec">
                <h2>
                    Make an Enquiry
                </h2>
                <hr style="margin: auto">


                <div class="col-md-12">
                    <form class="" method="post" action="#">

                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="row main">
                                <div class="main-login main-center" style="height: 380px">
                                    <div class="form-group">
                                        <label for="name" class="cols-sm-2 control-label">Your Name</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user fa"
                                                                                       aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="name" id="name"
                                                       placeholder="Enter your Name"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="cols-sm-2 control-label">Your Email</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-envelope fa"
                                                                                       aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="email" id="email"
                                                       placeholder="Enter your Email"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="cols-sm-2 control-label">Contact</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg"
                                                                                       aria-hidden="true"></i></span>
                                                <input type="password" class="form-control" name="password"
                                                       id="password" placeholder="Enter your Password"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="cols-sm-2 control-label">Select Hall</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user fa"
                                                                                       aria-hidden="true"></i></span>
                                                <select name="" id="" class="form-control">
                                                    <option value="">asd</option>
                                                    <option value="">asdas</option>
                                                    <option value="">adsad</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="row main secondform">
                                <div class="main-login main-center" style="height: 380px">
                                    <div class="form-group">
                                        <label for="section" class="cols-sm-2 control-label">Select Section</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user fa"
                                                                                       aria-hidden="true"></i></span>
                                                <select name="section" id="" class="form-control">
                                                    <option value="">asd</option>
                                                    <option value="">asdas</option>
                                                    <option value="">adsad</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="occasion" class="cols-sm-2 control-label">Select Occasion</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user fa"
                                                                                       aria-hidden="true"></i></span>
                                                <select name="occasion" id="" class="form-control">
                                                    <option value="">Valima</option>
                                                    <option value="">Barat</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="date" class="cols-sm-2 control-label">Select Date</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user fa"
                                                                                       aria-hidden="true"></i></span>
                                                <input type="date" style="font-size: 13px;height: 36px !important;" class="form-control" name="name" id="name"
                                                       placeholder="Enter your Name"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="area" class="cols-sm-2 control-label">Select Area</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                                <select name="area" id="" class="form-control">
                                                    <option value="">North Nazimabad</option>
                                                    <option value="">Gulistan-e-Jouhar</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <button type="submit" class="btn btn-danger sendbtn">Submit</button>
                        </div>


                    </form>
                </div>

                <hr class="hr_offs1" style="margin: auto">
            </div>

        </section>

        <section class="parallax well1 sets1" data-url="/website/images/11111.jpg" data-mobile="true">
            <div class="parallax_image"
                 style="background-image: url(&quot;/website/images/11111.jpg&quot;); background-color: inherit; "></div>
            <div class="parallax_cnt">

                <div class="container">

                    <h2 class="center" style="color: black">
                        Testimonials
                    </h2>

                    <hr style="margin: auto">

                    <div class="row">

                        <div class="col-md-4">
                            <blockquote class="box">
                                <div class="box_aside circle-box-no_hover">
                                    <img class="circle-img" src="/website/images/icon-boy.jpg" style="height: 120px;" alt="">
                                </div>
                                <div class="box_cnt">
                                    <h4 style="color: black">
                                        <cite style="color: black">
                                            Hassan Shahid
                                        </cite>
                                    </h4>
                                </div>
                            </blockquote>
                                    <q style="color: black">
                                            “Awesome website, totally satisfied with the services they provided, very
                                            reasonable pricing, would definitely refer to my friends.”
                                    </q>

                        </div>

                        <div class="col-md-4">
                            <blockquote class="box">
                                <div class="box_aside circle-box-no_hover">
                                    <img class="circle-img" src="/website/images/icon-girl.jpg" style="height: 120px;" alt="">
                                </div>
                                <div class="box_cnt">
                                    <h4 style="color: black">
                                        <cite style="color: black">
                                            Ayesha Saleem
                                        </cite>
                                    </h4>
                                </div>
                            </blockquote>
                                        <q style="color: black">
                                            “10/10 service, i am very happy i found out about you in time.”
                                        </q>
                        </div>

                        <div class="col-md-4 ">
                            <blockquote class="box">
                                <div class="box_aside circle-box-no_hover">
                                    <img class="circle-img" src="/website/images/icon-boy.jpg" style="height: 120px;" alt="">
                                </div>
                                <div class="box_cnt">
                                    <h4 style="color: black">
                                        Zafir Ahmed Baqai
                                    </h4>
                                </div>
                            </blockquote>
                                        <q style="color: black">
                                            “Great Idea, Best Execution. Would definitely recommend to use if anyone is
                                            looking for a wedding related venue.”
                                        </q>

                        </div>

                    </div>

                    <hr class="hr2_offs1" style="margin: auto">

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

{{--<script src="{{ URL::to('/') }}/website/js/script.js"></script>--}}
{{--<script src="{{ URL::to('/') }}/website/js/jquery.cookie.js"></script>--}}
{{--<script src="{{ URL::to('/') }}/website/js/jquery.easing.1.3.js"></script>--}}
{{--<script src="{{ URL::to('/') }}/website/js/tmstickup.js"></script>--}}
{{--<script src="{{ URL::to('/') }}/website/js/jquery.ui.totop.js"></script>--}}
{{--<script src="{{ URL::to('/') }}/website/js/jquery.equalheights.js"></script>--}}
{{--<script src="{{ URL::to('/') }}/website/js/jquery.mousewheel.min.js"></script>--}}
{{--<script src="{{ URL::to('/') }}/website/js/jquery.simplr.smoothscroll.min.js"></script>--}}
{{--<script src="{{ URL::to('/') }}/website/js/superfish.js"></script>--}}
{{--<script src="{{ URL::to('/') }}/website/js/jquery.mobilemenu.js"></script>--}}
{{--<script src="{{ URL::to('/') }}/website/js/wow.js"></script>--}}
{{--<script src="{{ URL::to('/') }}/website/js/jquery.mobile.customized.min.js"></script>--}}
{{--<script src="{{ URL::to('/') }}/website/js/camera.js"></script>--}}
{{--<script src="{{ URL::to('/') }}/website/js/jquery.fancybox.js"></script>--}}
{{--<script src="{{ URL::to('/') }}/website/js/jquery.fancybox-media.js"></script>--}}
{{--<script src="{{ URL::to('/') }}/website/js/jquery.fancybox-buttons.js"></script>--}}
{{--<script src="{{ URL::to('/') }}/website/js/owl.carousel.min.js"></script>--}}
{{--<script src="{{ URL::to('/') }}/website/js/sForm.js"></script>--}}
{{--<script src="{{ URL::to('/') }}/website/js/jquery.rd-parallax.js"></script>--}}


<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {
            myIndex = 1
        }
        x[myIndex - 1].style.display = "block";
        setTimeout(carousel, 5000); // Change image every 2 seconds
    }
</script>

</body>
</html>