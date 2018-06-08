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

    <div style="background: #f7f2df">
        @foreach ($hall_theme as $key => $hall_themes)
            <h1 class="service-heading">{{ $hall_themes->name }}</h1>
        @endforeach

        <div class="w3-content w3-display-container">
            @foreach ($hall_theme_images as $key => $hall_theme_imagess)
                @if($hall_theme_imagess->images == null)
                    <img src="{{ URL::to('/') }}/placeholder.png" alt=""
                         class="theme-image">
                @else
                    <img class="mySlides" src="{{ URL::to('/') }}/uploads/{{ $hall_theme_imagess->images }}" style="width:100%">

                @endif
            @endforeach

            <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
            <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
        </div>

        @foreach ($hall_theme as $key => $hall_themes)
        <h2 style="text-align: center">{{ $hall_themes->name }}</h2>
        @endforeach
        <hr style="margin: auto">
        <section class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 style="border-bottom: 1px solid #d4af36; padding-bottom: 5px">Details</h4>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-7">
                        @foreach ($hall_theme as $key => $hall_themes)
                        <p style="text-align: justify" >
                                {{ $hall_themes->detail }}
                        </p>
                        @endforeach
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
                {{--<div class="col-md-12">--}}
                    {{--<h4 style="border-bottom: 1px solid #d4af36; padding-bottom: 5px">Hall Services</h4>--}}
                    {{--<div class="col-md-1">--}}
                    {{--</div>--}}
                    {{--<div class="col-md-6">--}}
                        {{--<ul>--}}
                            {{--<li><i class="fas fa-star"></i> Photography</li>--}}
                            {{--<li><i class="fas fa-star"></i> Catering</li>--}}
                            {{--<li><i class="fas fa-star"></i> transport</li>--}}
                            {{--<li><i class="fas fa-star"></i> Parking</li>--}}
                            {{--<li><i class="fas fa-star"></i> Photography</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-5">--}}
                    {{--</div>--}}
                {{--</div>--}}

            </div>
        </section>

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
        if (n > x.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = x.length
        }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex - 1].style.display = "block";
    }
</script>


</body>
</html>