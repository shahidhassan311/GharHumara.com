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
                <div class="col-md-3">
                    <div class="col-xs-12" style="padding: 20px 0;background-color: #f7f2df; border-bottom: 3px solid #d3af35;">
                        <h6 style="text-align: center;color: #d3af35;margin: 10px 0px"><b>Fresh Flowers</b></h6>
                    </div>
                    <div class="col-xs-12" style="padding: 10px;background-color: #f7f2df;margin-bottom: 10px">
                        <p style="text-align: left"><i class="fas fa-leaf" style="color: #d4af36"></i><b style="margin-left: 30px">Gajray</b></p>
                        <p style="text-align: left"><i class="fas fa-leaf" style="color: #d4af36"></i><b style="margin-left: 30px">Haar</b></p>
                        <p style="text-align: left"><i class="fas fa-leaf" style="color: #d4af36"></i><b style="margin-left: 30px">Phool Pattia</b></p>
                        <p style="text-align: left"><i class="fas fa-leaf" style="color: #d4af36"></i><b style="margin-left: 30px">Dulha/Dulhan ka haar</b></p>
                        <p style="text-align: left"><i class="fas fa-leaf" style="color: #d4af36"></i><b style="margin-left: 30px">Yellow Rose Bouquet</b></p>
                        <p style="text-align: left"><i class="fas fa-leaf" style="color: #d4af36"></i><b style="margin-left: 30px">Pink Rose Bouquet</b></p>
                        <p style="text-align: left"><i class="fas fa-leaf" style="color: #d4af36"></i><b style="margin-left: 30px">White Rose Bouquet</b></p>
                        <p style="text-align: left"><i class="fas fa-leaf" style="color: #d4af36"></i><b style="margin-left: 30px">Mix Rose Bouquet</b></p>
                        <p style="text-align: left"><i class="fas fa-leaf" style="color: #d4af36"></i><b style="margin-left: 30px">Flower Bangles</b></p>
                        <p style="text-align: left"><i class="fas fa-leaf" style="color: #d4af36"></i><b style="margin-left: 30px">Red Rose Ring</b></p>
                        <p style="text-align: left"><i class="fas fa-leaf" style="color: #d4af36"></i><b style="margin-left: 30px">White Rose Ring</b></p>
                        <p style="text-align: left"><i class="fas fa-leaf" style="color: #d4af36"></i><b style="margin-left: 30px">Pink Rose Ring</b></p>
                        <p style="text-align: left"><i class="fas fa-leaf" style="color: #d4af36"></i><b style="margin-left: 30px">Yellow Rose Ring</b></p>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12" style="height: 100%;margin: 20px 0;background-color: #f7f2df;">
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
                </div>
                <div class="col-md-9">
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
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                        <div class="box">
                            <a href="#" data-toggle="modal" data-target="#17">
                                <img src="public/website/images/gallery/Gallery-19.jpg">
                            </a>
                            <div class="modal fade" id="17" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <div class="modal-body">
                                            <img src="public/website/images/gallery/Gallery-19.jpg">
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

</body>
</html>