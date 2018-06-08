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

    <main>
        <section style="background-color: #f7f2df !important; padding: 20px 0">
            <section class="container">
                <div class="row">
                    <div class="col-md-12" style="margin: auto">
                        @foreach ($hall_section as $key => $hall_sections)
                            <div class="col-md-2 col-sm-4 col-xs-6" style="height:auto; margin: 3px 0px">
                                <input type="hidden" name="section_id" value="{{ $hall_sections->section_id }}">
                                <button onclick="sectionid('{{ $hall_sections->section_id }}')" class="section_change"
                                        style="background: none; border: none">
                                    <div class="section-card">
                                        @if($hall_sections->images == null)
                                            <img src="{{ URL::to('/') }}/placeholder.png" alt=""
                                                 style="height: 146px;width:100%;border-radius: 5px 5px 0 0;">
                                        @else
                                            <img src="{{ URL::to('/') }}/uploads/{{ $hall_sections->images }}" alt=""
                                                 style="height: 146px;width:100%;border-radius: 5px 5px 0 0;">
                                        @endif
                                        <div class="" style="padding: 2px 16px; height: 26px">
                                            <p style="text-align: center"><b>{{ $hall_sections->section_name }}</b></p>
                                        </div>
                                    </div>
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            @foreach($hall_section_id as $hall_section_ids)
                <form action="">
                    <input type="hidden" name="hall_section_ids" value="{{ $hall_section_ids->hall_id }}">
                    <input type="hidden" name="token" id="csrf-token" value="{{ Session::token() }}"/>
                </form>
            @endforeach
            <section class="container">
                <div class="row">
                    <div class="col-md-12"
                         style="padding: 20px 0;background-color: #f7f2df;margin-bottom: 10px; box-shadow: 0 3px 0px 0px #d3af35;">
                        <h3 style="float: left; color: #d3af35"><b id="hall_section_ajax"></b></h3>
                        <h2 style="float: right;color: #d3af35;margin: 30px 0px"><b id="amount_ajax"></b></h2>
                        <br><br>
                        <h5 style="text-align: left"><b style="color: #d3af35">Address: </b><h6 id="address_ajax"></h6>
                        </h5>
                    </div>
                    <div class="col-md-9" style="padding: 0px">
                        <img id="image_ajax" src="">
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12" style="background-color: #f7f2df;height: 100%">
                        <h5 class="service-heading" style="margin: 10px 0px">Contact Agent</h5>
                        <div class="col-md-12 col-sm-3 col-xs-12" style="padding: 0px">
                            <div class="col-md-4 col-sm-12 col-xs-4" style="padding: 0px 5px 0 0"><img
                                        src="http://weddecore.com/website/images/icon-boy.jpg"></div>
                            <div class="col-md-8 col-sm-12 col-xs-8" style="padding: 0px">
                                <div style="font-size: 18px">WedDecore Customer Support:<br> +92 333 33323806</div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-9 col-xs-12" style="padding: 0px">
                            <form action="">
                                <div class="form-group" style="height: 38px;margin-top: 10px">
                                    <input type="email" class="form-control" id="email" placeholder="Enter email"
                                           name="email" style="float: left">
                                    {{--<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" style="width: 49%;float: right">--}}
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="pwd" placeholder="Enter password"
                                           name="pwd">
                                </div>
                                <div class="form-group">
                                    <textarea type="password" class="form-control" placeholder="Enter password"
                                              name="pwd"></textarea>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="remember"> I want to discuss budget</label>
                                </div>
                                <button type="submit" class="btn btn-danger sendbtn"
                                        style="width: 100%;margin: 0px !important;">Contact Agent
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
            </section>
            <div class="container multi" style="margin: 20px auto">
                <div class="row">
                    <div class="carousel slide" style="padding: 5px !important;">
                        <div class="carousel-inner" style="height: 220px !important;    z-index: 9999999;">
                            @foreach ($hall_theme as $key => $hall_themes)
                                <a href="/theme_detail/{{ $hall_themes->id }}">
                                    <div class="item active">
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <div class="theme-card">
                                                @if($hall_themes->images == null)
                                                    <img src="{{ URL::to('/') }}/placeholder.png" alt=""
                                                         class="theme-image">
                                                @else
                                                    <img src="{{ URL::to('/') }}/uploads/{{ $hall_themes->images }}"
                                                         alt=""
                                                         class="theme-image">
                                                @endif

                                                <div class="container" style="padding: 2px 16px;">
                                                    <h4><b>{{ $hall_themes->name }}</b></h4>
                                                </div>
                                                    <div class="w3-display-topright w3-large w3-container w3-padding-16" style="background-color: #d4af36;right: 15px;top: 10px;padding: 5px !important;">
                                                        <b>+ Rs.&nbsp;</b>{{ $hall_themes->amount }}
                                                    </div>
                                            </div>
                                        </div>

                                    </div>

                            </a>
                            @endforeach
                        </div>
                        <a class="left carousel-control" data-slide="prev"
                           style="background: none !important; padding-top: 97px"><i class="fas fa-chevron-left"
                                                                                     style="float: left; color: #d4af36"></i></a>
                        <a class="right carousel-control" data-slide="next"
                           style="background: none !important; padding-top: 97px"><i class="fas fa-chevron-right"
                                                                                     style="float: right; color: #d4af36"></i></a>
                    </div>
                </div>
            </div>

            <h2 style="text-align: center">Hall Details</h2>
            <hr style="margin: auto">
            <section class="container">
                <div class="row">
                    {{--<div class="col-md-12">--}}
                    {{--<h4 style="border-bottom: 1px solid #d4af36; padding-bottom: 5px">Overview</h4>--}}
                    {{--<div class="col-md-1">--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3">--}}
                    {{--<ul>--}}
                    {{--<li> 15 table</li>--}}
                    {{--<li> 120 kursia</li>--}}
                    {{--<li> 6 darri</li>--}}
                    {{--<li> 13 chandni</li>--}}
                    {{--</ul>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3">--}}
                    {{--<ul>--}}
                    {{--<li> 20 kumkumay ki larri</li>--}}
                    {{--<li> 4 baray walay jhoomer</li>--}}
                    {{--<li> 1 Dulha dulhan ka sofa</li>--}}
                    {{--<li> 4 family single sofa</li>--}}
                    {{--</ul>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-5">--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    <div class="col-md-12">
                        <h4 style="border-bottom: 1px solid #d4af36; padding-bottom: 5px">Details</h4>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-7">
                            <p style="text-align: justify" id="hall_details_ajax">Finding the right venue, with the
                                perfect ambiance, optimum size and befitting location while managing a tight budget, is
                                nightmarish. Well guess what!! Venuehook.pk is just the solution for you. It is an
                                online portal which aims to connect venues, banquets and other spaces with individuals
                                and businesses that are planning an event or party. VenueHook.pk fetches the suitable
                                venues for you according to your specific requirement. Browse multitude of venues based
                                on capacity, location, price, facilities and compare different selections. You can even
                                contact the various venues directly from our site and hook your desirable date in the
                                most convenient way possible. Our mission is to make venue shopping smart, simple,
                                efficient and hassle free by reducing tiresome and complex exercise of visiting each
                                venue. We have divided venues into four main categories i.e Weddings, Corporate,
                                Lifestyle and Party for your convenience. Want to start your venue adventure? Start Now
                                .</p>
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h4 style="border-bottom: 1px solid #d4af36; padding-bottom: 5px">Hall Services</h4>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-6">
                            <ul>
                                @foreach ($hall_service as $key => $hall_services)

                                            <li><i class="fas fa-star"></i> {{ $hall_services->service_name }}</li>


                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-5">
                        </div>
                    </div>

                </div>
            </section>
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
<script src="{{ URL::to('/') }}/website/ajax_wk/section_details.js"></script>

<script>$('#myCarousel').carousel({
        interval: 4000
    })

    $('.carousel .item').each(function () {
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        for (var i = 0; i < 2; i++) {
            next = next.next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }

            next.children(':first-child').clone().appendTo($(this));
        }
    });</script>

</body>
</html>