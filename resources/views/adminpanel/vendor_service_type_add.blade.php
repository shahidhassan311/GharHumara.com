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
                        {{--<h1>{{ \Illuminate\Support\Facades\Auth::user()->name }}</h1>--}}
                        <h1>Vendor</h1>
                        <!-- TEXTUAL INPUTS -->
                        <div class="col-12 col-md-12">
                            <div class="example">
                                <div class="description">
                                    <div class="description-text">
                                        <h5>Service Type</h5>
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
                                            <form action="{{($update) ? url('/vendor_service_type_update') : url('/vendor_service_type_add_store') }}" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="a_id"  value="{{ ($update) ? $vendor_service->id : old('id') }}">
                                                {{--<input type="hidden" name="type_id"  value="{{ ($update) ? $vendor_service->type : old('id') }}">--}}
                                                <div class="form-group">
                                                    <input class="form-control"
                                                           style="border-bottom: 0.1px solid darkgrey;" type="text"
                                                           placeholder="Service Type"
                                                           name="service_type"
                                                           value="{{ ($update) ? $vendor_service->service_type : old('service_type') }}"
                                                           id="example-text-input"/>
                                                    <label for="example-text-input">Service Type</label>
                                                    @if ($errors->has('service_type'))
                                                        <span class="help-block alert alert-danger">
                                                            <strong>The Service Type field is required.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                @if(($update) ?  $vendor_service->image : old('image'))
                                                    @else
                                                    <div class="form-group">
                                                        <label for="input-24">Planets and Satellites</label>
                                                        <input id="input-24" class="btn-success" name="images" type="file">
                                                    </div>
                                                @endif
                                                @if(($update) ? $vendor_service->image == 'NULL' : old('image'))
                                                    <div class="form-group">
                                                        <label for="input-24">Planets and Satellites</label>
                                                        <input id="input-24" class="btn-success" name="images" type="file">
                                                    </div>
                                                @endif
                                                <div class="form-group">
                                                    <button class="btn btn-danger pull-right" type="submit"
                                                            id="example-color-input">Submit
                                                    </button>
                                                </div>
                                            </form>
                                            @if(($update) ? $vendor_service->image !== 'NULL' : old('image'))
                                                <a href="/vendor_service_type_image_delete/{{($update) ? $vendor_service->id : old('id')}}">
                                                    <button class="btn btn-danger">DELETE</button>
                                                </a>
                                                <img src="{{ URL::to('/') }}/uploads/{{ ($update) ? $vendor_service->image : old('images')}}" height="200" width="300" alt="">
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

