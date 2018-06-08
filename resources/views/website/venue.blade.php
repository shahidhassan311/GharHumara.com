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
        <section class="well" style="border: none !important; margin-bottom: 10px !important;">
            <div class="container maincontactcontainer" style="border: 2px solid rgba(212, 175, 54, 0.72);padding: 0px;">

            </div>
        </section>
    </main>

    <section class="container" style="padding-bottom: 50px; border: none !important;text-align: center;">
    <div class="col-md-12 col-xs-12" style="text-align: center">
        <img class="service-images-portion1" src="public/website/images/icon-venue.png" alt="">
    </div>
    <div class="col-md-12 col-xs-12">
        <h4 class="service-heading">Venue</h4><br>
        <p class="service-content">Booking a perfect venue on perfect date is the biggest hassle. WedDecore brings all wedding venues to a single screen, book your dream venue with our Website/Mobile App.</p>
    </div>
    </section>

    <div class="container">
            {{--<div class="btn-group" style="margin: 0px !important;">--}}
                {{--<a href="#" id="list" class="btn btn-success btn-sm" style="margin: 0px !important;">--}}
                    {{--<span class="fas fa-list-ul"></span>List</a>--}}
                {{--<a href="#" id="grid" class="btn btn-success btn-sm" style="margin: 0px !important;">--}}
                    {{--<span class="fas fa-th"></span>Grid</a>--}}
            {{--</div>--}}
        <div id="products" class="row list-group">
            @foreach ($hall_approved as $key => $halls)
                <div class="item  col-xs-12 col-md-6 col-sm-6 col-lg-4">
                    <a href="/venue_detail/{{ $halls->orignal_hall_id }}"><div class="thumbnail" style="height:362px;">

                                @if($halls->images == null)
                                    <img class="group list-group-image" src="{{ URL::to('/') }}/placeholder.png" alt=""/>
                                @else
                                    <img class="group list-group-image"
                                         src="{{ URL::to('/') }}/uploads/{{ $halls->images }}" alt=""/>
                                @endif
                            <div class="caption">
                                <h4 class="group inner list-group-item-heading">
                                    {{ $halls->hall_name }}</h4>
                                <p class="group inner list-group-item-text">
                                    {{ $halls->address }}
                                </p>
                                {{--<div class="row" style="margin-top: 10px">--}}
                                    {{--<div class="col-xs-12 col-md-12">--}}
                                        {{--<h3 class="service-heading">--}}
                                            {{--$21.000</h3>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>



    <main>
        <section class="well" style="border: none !important; margin-bottom: 10px !important;">
            <div class="container maincontactcontainer" style="border: 2px solid rgba(212, 175, 54, 0.72);padding: 0px;">

            </div>
        </section>
    </main>

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
$(document).ready(function() {
$('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
$('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
});
</script>


</body>
</html>