@extends('layouts.admin_master_layout')

@section('content')
    <div class="content custom-scrollbar">

        <div class="doc forms-doc page-layout simple full-width">

            <!-- HEADER -->
            <div class="page-header bg-secondary text-auto p-6 row no-gutters align-items-center justify-content-between">
                <h2 class="doc-title" id="content">Forms</h2>
            </div>
            <!-- / HEADER -->

            <!-- CONTENT -->
            <div class="page-content p-6">
                <div class="content container-fluid">
                    <div class="row">

                        <!-- TEXTUAL INPUTS -->
                        <div class="col-12 col-md-12">
                            <div class="example">
                                <div class="description">
                                    <div class="description-text">
                                        <h5>Add Hall Service</h5>
                                    </div>
                                    <div class="toggle-source-preview">
                                        {{--<i class="icon icon-code-tags"></i>--}}
                                        <i class="icon icon-eye-outline"></i>
                                    </div>
                                </div>

                                <div class="source-preview-wrapper">
                                    <div class="preview">
                                        <div class="preview-elements">
                                            <div class="flash-message">
                                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                                    @if(Session::has('alert-' . $msg))
                                                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                                                            <a href="#" class="close" data-dismiss="alert"
                                                               aria-label="close">&times;</a></p>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <form action="{{($update) ? url('/agent_hall_service_update') : url('/agent_add_hall_service_store')}}"
                                                  method="post" enctype="multipart/form-data" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="p_id"
                                                       value="{{ ($update) ? $hall_service->id : old('id') }}">
                                                <input type="hidden" name="hall_id"
                                                       value="{{ ($update) ? $hall_service->hall_id : old('id') }}">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Select Hall</label>
                                                    <select class="form-control" name="hall_name"
                                                            id="exampleFormControlSelect1">
                                                        @foreach ($hall as $key => $halls)
                                                            <h1>{{ $hall_service->hall_id }}</h1>
                                                        <h1>{{ $halls->id }}</h1>
{{--                                                            <option value="{{ $halls->id }}" {{($update) ? $hall_service->hall_id == $halls->id : 'selected="selected"' == ''}}>{{ $halls->hall_name }}</option>--}}

                                                            <option value="{{ $halls->id }}" {{($update) ? $hall_service->hall_id : $halls->id ? 'selected="selected"' : ''}}>{{ $halls->hall_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control"
                                                           style="border-bottom: 0.1px solid darkgrey;" type="text"
                                                           placeholder="Enter Section Name" name="service_name"
                                                           value="{{($update) ? $hall_service->service_name : old('service_name') }}"
                                                           id="example-search-input"/>
                                                    <label for="example-search-input">Service Name</label>
                                                    @if ($errors->has('service_name'))
                                                        <span class="help-block alert alert-danger">
                                                            <strong>The service name field is required.</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                @if($update)
                                                    <div class="form-group">
                                                        <label for="input-24">Planets and Satellites</label>
                                                        <input id="input-24" class="btn-success" name="images[]"
                                                               type="file" multiple>
                                                    </div>
                                                @else
                                                    <div class="form-group">
                                                        <label for="input-24">Planets and Satellites</label>
                                                        <input id="input-24" class="btn-success" name="images[]"
                                                               type="file" multiple>
                                                    </div>

                                                @endif
                                                <div class="form-group">
                                                    <button class="btn btn-secondary pull-right" type="submit"
                                                            id="example-color-input">Submit
                                                    </button>
                                                </div>
                                            </form>
                                            @if($update == true)
                                                @foreach($hall_service_image as $hall_service_images)
                                                    <img src="{{ URL::to('/') }}/uploads/{{ $hall_service_images->images }}"
                                                         height="200" width="300" alt="">
                                                    <a href="/hall_service_image_delete/{{ $hall_service_images->id }}/{{ Request::segment(2) }}">
                                                        <button class="btn btn-danger">DELETE</button>
                                                    </a>
                                                @endforeach
                                            @else
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- TEXTUAL INPUTS -->

                    </div>
                </div>
            </div>
            <!-- CONTENT -->
        </div>
    </div>
@endsection

