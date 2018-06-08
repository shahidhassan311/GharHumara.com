@extends('layouts.admin_master_layout')@section('content')    <div class="content custom-scrollbar ps ps--theme_default" data-ps-id="9351f3ef-db17-74cc-44a4-b486e6826057">        <div id="project-dashboard" class="page-layout simple right-sidebar">            <div class="page-content-wrapper custom-scrollbar ps ps--theme_default ps--active-y"                 data-ps-id="1ecfd75e-e982-63e9-12a5-b802cb132919">                <!-- HEADER -->                <div class="page-header bg-secondary text-auto d-flex flex-column justify-content-between px-6 pt-4 pb-0">                    <div class="row no-gutters align-items-start justify-content-between flex-nowrap">                        <div>                            <span class="h2"><strong>SERVICE TYPES</strong></span>                        </div>                        <button type="button"                                class="sidebar-toggle-button btn btn-icon d-block d-xl-none fuse-ripple-ready"                                data-fuse-bar-toggle="dashboard-project-sidebar" aria-label="Toggle sidebar">                            <i class="icon icon-menu"></i>                        </button>                        <a href="/vendor_service_type_add" class="btn btn-light fuse-ripple-ready">                            <i class="icon-link"></i>                            <span>ADD SERVICES</span>                        </a>                    </div>                </div>                <!-- / HEADER -->                <!-- CONTENT -->                <div class="page-content">                    <div class="tab-content">                        <div class="tab-pane fade show active p-3" id="home-tab-pane" role="tabpanel"                             aria-labelledby="home-tab">                            <div class="flash-message">                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)                                    @if(Session::has('alert-' . $msg))                                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a                                                    href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>                                        </p>                                    @endif                                @endforeach                            </div>                            <!-- WIDGET GROUP -->                            <div class="widget-group row no-gutters">                                <!-- WIDGET 1 -->                                @foreach ($vendor_service as $key => $vendor_services)                                    <div class="col-12 col-sm-6 col-xl-3" style="padding: 5px;border: 1px solid black">                                        <a href="/{{ $vendor_services->routes }}/{{ $vendor_services->id  }}"                                           style="text-decoration: none;">                                            {{--<div class="widget widget1 card" style="background: url(../uploads/18708.png);    background-size: contain;">--}}                                            <div class="widget widget1 card"                                                 style="background-size: 277px 170px;background: url('<?= (isset($vendor_services->image)) ? asset('uploads') . '/' . $vendor_services->image : asset('') . 'placeholder.png' ?>');    background-size: contain;">                                                <div class="widget-header pl-4 pr-2 row no-gutters align-items-center justify-content-between">                                                </div>                                                <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">                                                    {{--                                                    <div class="title text-secondary">{{ $vendor_services->service_type }}</div>--}}                                                    <div class="sub-title h6 text-muted"                                                         style="    color: black !important;font-size: 20px;font-weight: bold;">{{ $vendor_services->service_type }}</div>                                                </div>                                            </div>                                        </a>                                        <div class="detailbtns" style="text-align: center;padding: 20px;">                                            <a href="/vendor_service_type_edit/{{ $vendor_services->id  }}">                                                <button class="btn btn-primary fuse-ripple-ready">EDIT</button>                                            </a>                                            <a href="/vendor_service_type_delete/{{ $vendor_services->id  }}">                                                <button class="btn btn-danger fuse-ripple-ready">DELETE</button>                                            </a>                                        </div>                                    </div>                            @endforeach                            <!-- / WIDGET 1 -->                            </div>                            <!-- / WIDGET GROUP -->                        </div>                    </div>                </div>            </div>        </div>    </div>@endsection