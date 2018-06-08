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

        <section style="background-image: url(/website/images/gallery/Gallery-background.jpg) !important;">
            <div class="container gal-container">
                <div class="col-md-8 col-sm-12 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#1">
                            <img src="public/website/images/gallery/Gallery-1.jpg">
                        </a>
                        <div class="modal fade" id="1" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="public/website/images/gallery/Gallery-1-original.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the first one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#2">
                            <img src="public/website/images/gallery/Gallery-4.jpg">
                        </a>
                        <div class="modal fade" id="2" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="public/website/images/gallery/Gallery-4.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the second one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#3">
                            <img src="public/website/images/gallery/Gallery-5.jpg">
                        </a>
                        <div class="modal fade" id="3" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="public/website/images/gallery/Gallery-5.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the third one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#4">
                            <img src="public/website/images/gallery/Gallery-6.jpg">
                        </a>
                        <div class="modal fade" id="4" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="public/website/images/gallery/Gallery-6.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the fourth one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#5">
                            <img src="public/website/images/gallery/Gallery-7.jpg">
                        </a>
                        <div class="modal fade" id="5" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="public/website/images/gallery/Gallery-7.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the fifth one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#6">
                            <img src="public/website/images/gallery/Gallery-8.jpg">
                        </a>
                        <div class="modal fade" id="6" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="public/website/images/gallery/Gallery-8.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the sixth one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#7">
                            <img src="public/website/images/gallery/Gallery-9.jpg">
                        </a>
                        <div class="modal fade" id="7" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="public/website/images/gallery/Gallery-9.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the seventh one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#8">
                            <img src="public/website/images/gallery/Gallery-10.jpg">
                        </a>
                        <div class="modal fade" id="8" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="public/website/images/gallery/Gallery-10.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the eighth one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#9">
                            <img src="public/website/images/gallery/Gallery-11.jpg">
                        </a>
                        <div class="modal fade" id="9" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="public/website/images/gallery/Gallery-11.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the ninth one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#10">
                            <img src="public/website/images/gallery/Gallery-2.jpg">
                        </a>
                        <div class="modal fade" id="10" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="public/website/images/gallery/Gallery-2.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the first one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#11">
                            <img src="public/website/images/gallery/Gallery-13.jpg">
                        </a>
                        <div class="modal fade" id="11" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="public/website/images/gallery/Gallery-13.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the leventh one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#12">
                            <img src="public/website/images/gallery/Gallery-14.jpg">
                        </a>
                        <div class="modal fade" id="12" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="public/website/images/gallery/Gallery-14.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the 12th one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#13">
                            <img src="public/website/images/gallery/Gallery-15.jpg">
                        </a>
                        <div class="modal fade" id="13" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="public/website/images/gallery/Gallery-15.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the 13th one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#14">
                            <img src="public/website/images/gallery/Gallery-16.jpg">
                        </a>
                        <div class="modal fade" id="14" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="public/website/images/gallery/Gallery-16.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the 14th one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#15">
                            <img src="public/website/images/gallery/Gallery-17.jpg">
                        </a>
                        <div class="modal fade" id="15" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="public/website/images/gallery/Gallery-17.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the 15th one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#16">
                            <img src="public/website/images/gallery/Gallery-18.jpg">
                        </a>
                        <div class="modal fade" id="16" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="public/website/images/gallery/Gallery-18.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the 16th one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#17">
                            <img src="public/website/images/gallery/Gallery-3.jpg">
                        </a>
                        <div class="modal fade" id="17" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="public/website/images/gallery/Gallery-3.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the first one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#18">
                            <img src="public/website/images/gallery/Gallery-19.jpg">
                        </a>
                        <div class="modal fade" id="18" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="public/website/images/gallery/Gallery-19.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the leventh one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#19">
                            <img src="public/website/images/gallery/Gallery-20.jpg">
                        </a>
                        <div class="modal fade" id="19" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="public/website/images/gallery/Gallery-20.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the leventh one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#20">
                            <img src="public/website/images/gallery/Gallery-21.jpg">
                        </a>
                        <div class="modal fade" id="20" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="public/website/images/gallery/Gallery-21.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the leventh one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#21">
                            <img src="public/website/images/gallery/Gallery-22.jpg">
                        </a>
                        <div class="modal fade" id="21" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="public/website/images/gallery/Gallery-22.jpg">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>This is the leventh one on my Gallery</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </main>

    <!--========================================================
                              FOOTER
    =========================================================-->
    <!--footer-->
    @include('website.footer');
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
        setTimeout(carousel, 2000); // Change image every 2 seconds
    }
</script>

</body>
</html>