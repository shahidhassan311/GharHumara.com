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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="icon" href="/website/images/WDlogo.png" type="image/gif">

    <style type="text/css">.fancybox-margin {
            margin-right: 17px;
        }</style>
</head>

<body>
<div class="page">

    @include('website.header')

    <main style="">
        <div class="col-xs-12" style="margin-bottom: 20px">
            @foreach($catering_details_view['service_company_name'] as $key => $vendor_services)
            <h2 style="text-align: center">{{ $vendor_services->service_company }}</h2>
            @endforeach
            <hr style="margin: auto">
        </div>
        <section style="padding: 20px 0;background-color: white;">
            <div class="row">
                {{--{{dd($catering_details_view)}}--}}
                @foreach($catering_details_view['catering_deal'] as $vendor_course)
                    {{--{{dd($vendor_course)}}--}}
                    <div class="col-md-4 col-sm-6 col-xs-12" style="margin: 5px 0">
                        <div class="col-xs-12"
                             style=" padding: 20px 0px !important; background-color: #f7f2df; border-radius: 5px">
                            <div class="col-xs-12" style="text-align: center; box-shadow: 0 3px 0px 0px #d3af35;">
                                <div class="col-xs-4">
                                    <img src="/website/images/menu-spoon.png" alt="">
                                </div>
                                <div class="col-xs-4">
                                    <h3 style="color: #d3af35">
                                        <b style="margin: auto 0">{{ $vendor_course->course_name }}</b>
                                    </h3>
                                </div>
                                <div class="col-xs-4">
                                    <img src="/website/images/menu-spoon.png" alt="">
                                </div>
                            </div>
                            <div class="col-xs-12" style="margin: 10px 0">
                                <div class="col-xs-12">
                                    <p style="text-align: center">
                                        <img src="/website/images/menu-icons.png" alt="">
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin: 10px 0 ;padding: 0px !important;">
                                @foreach ($catering_details_view['catering_menu'] as $menu)
                                    @if($vendor_course->id == $menu->vendor_catering_deal_id)
                                        <div class="col-xs-6" style="margin-bottom: 10px">
                                            <div class="col-xs-12" style="padding: 0">
                                                <img class="menu-flag" src="/website/images/menu_flag.png" alt=""
                                                     style="margin-bottom: 5px">
                                                <div class="centered"><b>
                                                        {{ $menu->menu_name }}

                                                    </b></div>
                                            </div>
                                            <div class="col-xs-12" style="padding: 0">
                                                {{--<p class="menu-content"><b>{{ Request::segment(2) }}</b></p>--}}
                                                <p class="menu-content"><b>
                                                        @foreach ($catering_details_view['deal_item'] as $item)
                                                            @if($menu->id == $item->menu_id)
                                                              {{ $item->item_name }}
                                                            @endif
                                                        @endforeach
                                                    </b></p>
                                            </div>
                                        </div>
                                    @endif

                                @endforeach
                            </div>
                            <div class="col-md-12" style="padding: 0 !important;">
                                <p style="text-align: center">
                                    <a href="#" data-toggle="modal" data-target="#1" class="btn sendbtn"
                                       style="margin: auto;width: 50%">Book Now</a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </section>
    </main>

    <div class="modal fade" id="1" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document" style="width: auto; margin: auto">
            <div class="modal-body">
                <div class="col-md-push-5 col-md-3 col-sm-12 col-xs-12"
                     style="background-color: #f7f2df;height: 100%;padding: 10px !important;">
                    <h5 class="service-heading" style="margin: 10px 0px">Contact Agent</h5>
                    <div class="col-md-12 col-sm-3 col-xs-12" style="padding: 0px">
                        <div class="col-md-4 col-sm-12 col-xs-4" style="padding: 0px 5px 0 0"><img
                                    src="public/website/images/icon-boy.jpg"></div>
                        <div class="col-md-8 col-sm-12 col-xs-8" style="padding: 0px">
                            <div style="font-size: 18px">Sameer Shamim<br>Berg Media Group<br>+92 333 33323806</div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-9 col-xs-12" style="padding: 0px">
                        <form action="">
                            <div class="form-group" style="height: 38px;margin-top: 10px">
                                <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name"
                                       style="width: 49%;float: left">
                                <input type="text" class="form-control" id="number" placeholder="Enter Contact Number"
                                       name="number" style="width: 49%;float: right">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" placeholder="Enter Email"
                                       name="email">
                            </div>
                            <div class="form-group">
                                <textarea type="text" class="form-control" id="detail" placeholder="Enter Details"
                                          name="detail"></textarea>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="remember"> I want to discuss budget</label>
                            </div>
                            <button type="submit" class="btn btn-danger sendbtn"
                                    style="width: 100%;margin: 0px !important;">Contact Agent
                            </button>
                            <p style="font-size: 10px;margin: 3px 0px !important;text-align: justify">By pressing
                                request info, you agree that Trulia and real estate professionals may contact you via
                                phone/text about your inquiry, which may involve the use of automated means. You are not
                                required to consent as a condition of purchasing any property, goods or services.
                                Message/data rates may apply. You also agree to our <a>Terms of Use</a>.</p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
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