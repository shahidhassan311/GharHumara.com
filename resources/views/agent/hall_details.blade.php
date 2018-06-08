@extends('layouts.admin_master_layout')

@section('content')
    <div class="content custom-scrollbar ps ps--theme_default" data-ps-id="9351f3ef-db17-74cc-44a4-b486e6826057">
        <div id="project-dashboard" class="page-layout simple right-sidebar">
            <div class="page-content-wrapper custom-scrollbar ps ps--theme_default ps--active-y"
                 data-ps-id="1ecfd75e-e982-63e9-12a5-b802cb132919">
                <!-- HEADER -->
                <div class="page-header bg-secondary text-auto d-flex flex-column justify-content-between px-6 pt-4 pb-0">

                    <div class="row no-gutters align-items-start justify-content-between flex-nowrap">

                        <div>
                            @foreach ($hall as $key => $halls)
                            <span class="h2">Welcome to <strong>{{ $halls->hall_name }}</strong>      Venue</span>
                                @endforeach
                        </div>

                        <button type="button"
                                class="sidebar-toggle-button btn btn-icon d-block d-xl-none fuse-ripple-ready"
                                data-fuse-bar-toggle="dashboard-project-sidebar" aria-label="Toggle sidebar">
                            <i class="icon icon-menu"></i>
                        </button>
                    </div>

                </div>
                <!-- / HEADER -->

                <!-- CONTENT -->
                <div class="page-content">
                    <div class="tab-content">

                        <div class="tab-pane fade show active p-3" id="home-tab-pane" role="tabpanel"
                             aria-labelledby="home-tab">
                            <div class="flash-message">
                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                    @if(Session::has('alert-' . $msg))

                                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                    @endif
                                @endforeach
                            </div>

                            <!-- WIDGET GROUP -->
                            <div class="widget-group row no-gutters">
                                <!-- WIDGET 1 -->
                                @foreach ($hall_details as $key => $hall_detail)

                                    <div class="col-12 col-sm-6 col-xl-3 p-3" style="border: 1px solid;">
                                        <a href="/agent_hall_section_details/{{ $hall_detail->section_id }}" style="text-decoration: none;">
                                        {{--<div class="widget widget1 card" style="background: url(../uploads/18708.png);    background-size: contain;">--}}
                                        <div class="widget widget1" style="background: url('<?= (isset($hall_detail->images))?asset('uploads').'/' . $hall_detail->images: asset('/public/website/images/firstsection/wedding_image1.jpg') ?>');    background-size: contain;">
                                            <div class="widget-header pl-4 pr-2 row no-gutters align-items-center justify-content-between">
                                            </div>
                                            <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
                                                {{--<div class="sub-title h6 text-muted" style="    color: white !important;font-size: 20px;font-weight: bold;">{{ $hall_detail->hall_name }}</div>--}}
                                            </div>
                                            <div class="widget-footer p-4 bg-light row no-gutters align-items-center">
                                                <span class="text-muted" style="    color: black !important;font-weight: 600;font-size: 15px;">Capacity:</span>
                                                <span class="ml-2">{{ $hall_detail->seating }}</span>
                                            </div>
                                        </div>
                                            <div class="title text-secondary" style="float: right;font-weight: bolder;margin-top: 7px"><h3>{{ $hall_detail->section_name }}</h3></div>
                                        </a>
                                        <div class="detailbtns" style="text-align: center;padding: 20px;">
                                            <a href="/agent_hall_section_edit_get/{{ $hall_detail->section_id }}"><button class="btn btn-primary">EDIT</button></a>
                                            <a href="/agent_hall_section_delete/{{ $hall_detail->section_id }}/{{ Request::segment(2) }}"><button class="btn btn-primary">DELETE</button></a>
                                        </div>
                                    </div>

                                @endforeach
                            <!-- / WIDGET 1 -->
                            </div>
                            <!-- / WIDGET GROUP -->
                        </div>

                    </div>

                </div>
                <div class="page-header bg-secondary text-auto d-flex flex-column justify-content-between px-6 pt-4 pb-0">
                    <div class="row no-gutters align-items-start justify-content-between flex-nowrap">
                        <div>
                            <span class="h2"><strong>SERVICES</strong></span>
                        </div>
                    </div>
                </div>
                <div class="page-content">
                    <div class="tab-content">
                        <div class="tab-pane fade show active p-3" id="home-tab-pane" role="tabpanel"
                             aria-labelledby="home-tab">

                            <!-- WIDGET GROUP -->
                            <div class="widget-group row no-gutters">
                                <!-- WIDGET 1 -->
                                @foreach ($hall_service as $key => $hall_services)

                                    <div class="col-12 col-sm-6 col-xl-3 p-3" style=" border: 1px solid; background: url('<?= (isset($hall_services->images))?asset('uploads').'/' . $hall_services->images: asset('placeholder.png') ?>');" >
                                        <a href="/agent_hall_service_details/{{ $hall_services->id }}" style="text-decoration: none;">
                                            <img alt="">
                                            <div class="widget widget1" style="background: url('<?= (isset($hall_services->images))?asset('uploads').'/' . $hall_services->images: asset('/public/website/images/firstsection/wedding_image1.jpg') ?>');    background-size: contain;">
                                                <div class="widget-header pl-4 pr-2 row no-gutters align-items-center justify-content-between">
                                                </div>
                                                <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
                                                    {{--<div class="title text-secondary">{{ $hall_services->service_name }}</div>--}}
                                                    <div class="sub-title h6 text-muted" style="    color: #0c0c0c !important;font-size: 29px;font-weight: bold;">{{ $hall_services->service_name }}</div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="detailbtns" style="text-align: center;padding: 20px;">
                                            <a href="/agent_hall_service_edit_get/{{ $hall_services->id }}"><button class="btn btn-primary">EDIT</button></a>
                                            <a href="/agent_hall_service_delete/{{ $hall_services->id }}/{{ Request::segment(2) }}"><button class="btn btn-primary">DELETE</button></a>
                                        </div>
                                    </div>
                            @endforeach
                            <!-- / WIDGET 1 -->
                            </div>
                            <!-- / WIDGET GROUP -->
                        </div>

                    </div>

                </div>

                <div class="page-header bg-secondary text-auto d-flex flex-column justify-content-between px-6 pt-4 pb-0">
                    <div class="row no-gutters align-items-start justify-content-between flex-nowrap">
                        <div>
                            <span class="h2"><strong>THEME</strong></span>
                        </div>
                    </div>
                </div>
                <div class="page-content">
                    <div class="tab-content">
                        <div class="tab-pane fade show active p-3" id="home-tab-pane" role="tabpanel"
                             aria-labelledby="home-tab">

                            <!-- WIDGET GROUP -->
                            <div class="widget-group row no-gutters">
                                <!-- WIDGET 1 -->
                                @foreach ($hall_theme as $key => $hall_themes)
                                    <div class="col-12 col-sm-6 col-xl-3 p-3" style="border: 1px solid; background: url('<?= (isset($hall_themes->images))?asset('uploads').'/' . $hall_themes->images: asset('placeholder.png') ?>');">
                                        <a href="/agent_hall_theme_details/{{ $hall_themes->id }}" style="text-decoration: none;">
                                            <div class="widget widget1" style="background: url('<?= (isset($hall_themes->images))?asset('uploads').'/' . $hall_themes->images: asset('/public/website/images/firstsection/wedding_image1.jpg') ?>');    background-size: contain;">
                                                <div class="widget-header pl-4 pr-2 row no-gutters align-items-center justify-content-between">
                                                </div>
                                                <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center" style="margin-top: 5px">
                                                    <div class="title text-secondary">{{ $hall_themes->amount }}</div>
                                                    <div class="sub-title h6 text-muted" style="    color: #0c0c0c !important;font-size: 29px;font-weight: bold;">{{ str_limit( $hall_themes->detail, $words = 30, $end = '...')  }}</div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="detailbtns" style="text-align: center;padding: 20px;">
                                            <a href="/agent_hall_theme_edit_get/{{ $hall_themes->id }}"><button class="btn btn-primary">EDIT</button></a>
                                            <a href="/agent_hall_theme_delete/{{ $hall_themes->id }}/{{ Request::segment(2) }}"><button class="btn btn-primary">DELETE</button></a>
                                        </div>
                                    </div>
                            @endforeach
                            <!-- / WIDGET 1 -->
                            </div>
                            <!-- / WIDGET GROUP -->
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection