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
                            {{--@foreach ($hall as $key => $halls)--}}
                            {{--<span class="h2">Welcome to <strong>{{ $halls->hall_name }}</strong>      Venue</span>--}}
                            {{--@endforeach--}}
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

                            <!-- WIDGET GROUP -->
                            <div class="widget-group row no-gutters">

                                <!-- WIDGET 1 -->
                                @foreach ($hall_theme_images as $key => $hall_theme_image)
                                    @if($hall_theme_image->images !== null)
                                        <img src="{{ URL::to('/') }}/uploads/{{ $hall_theme_image->images }}" style="right: 200px; height: 200px" alt="">
                                    @else
                                        <img src="{{ URL::to('/') }}/placeholder.png" alt="">
                                    @endif

                                @endforeach


                                @foreach ($hall_theme as $key => $hall_themes)
                                    <p>{{ $hall_themes->name }}</p><br>
                                    <p>{{ $hall_themes->amount }}</p><br>
                                    <p>{{ $hall_themes->detail }}</p><br>

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