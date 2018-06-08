@extends('layouts.admin_master_layout')

@section('content')
    <div class="content custom-scrollbar ps ps--theme_default" data-ps-id="9351f3ef-db17-74cc-44a4-b486e6826057">
        <div id="project-dashboard" class="page-layout simple right-sidebar">
            <div class="page-content-wrapper custom-scrollbar ps ps--theme_default ps--active-y"
                 data-ps-id="1ecfd75e-e982-63e9-12a5-b802cb132919">
                <!-- HEADER -->
                <div class="page-header bg-secondary text-auto d-flex flex-column justify-content-between px-6 pt-4 pb-0">

                    <div class="row no-gutters align-items-start justify-content-between flex-nowrap">


                            @foreach ($hall_section as $key => $hall_sections)
                                <h5><b>Cost:&nbsp;</b>{{ $hall_sections->amount }}</h5>
                                <h2><b>{{ $hall_sections->section_name }}</b></h2>
                                <h5><b>Seating Capacity:&nbsp;</b>{{ $hall_sections->seating }}</h5>
                            @endforeach


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

                            <!-- WIDGET GROUP -->

                            <div class="col-md-12" style="border-bottom: 3px solid #ab9343;display: block;padding: 0 6px 6px 6px">
                                <div class="row">
                                <!-- WIDGET 1 -->
                                @foreach ($hall_section_image as $key => $hall_section_images)
                                    <div class="col-md-4" style="padding: 3px">
                                    @if($hall_section_images->images !== null)

                                        <img src="{{ URL::to('/') }}/uploads/{{ $hall_section_images->images }}" alt="" style="width: 100%;margin-right: 10px">

                                    @else
                                        <img src="{{ URL::to('/') }}/placeholder.png" alt="">
                                    @endif
                                    </div>
                                 @endforeach
                            </div>
                            </div>

                            <div class="col-md-12">
                            <h2 style="border-bottom: 3px solid #ab9343;">Details</h2>

                                @foreach ($hall_section as $key => $hall_sections)
                                    <p>{{ $hall_sections->detail }}</p><br>

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