@extends('layouts.admin_master_layout')@section('content')    <div class="content custom-scrollbar">        <div class="doc forms-doc page-layout simple full-width">            <!-- HEADER -->            <div class="page-header bg-secondary text-auto p-6 row no-gutters align-items-center justify-content-between">                <h2 class="doc-title" id="content">Catering</h2>            </div>            <!-- / HEADER -->            <!-- CONTENT -->            <div class="page-content p-6">                <div class="content container-fluid">                    <div class="row">                        {{--<h1>{{ \Illuminate\Support\Facades\Auth::user()->name }}</h1>--}}                        <h1>Deals</h1>                        <!-- TEXTUAL INPUTS -->                        <div class="col-12 col-md-12">                            <div class="example">                                <div class="description">                                    <div class="description-text" style="width: 100%">                                        <h5 style="display: inline-block">Add Catering Deal</h5>                                    </div>                                    <div class="toggle-source-preview">                                        {{--<i class="icon icon-code-tags"></i>--}}                                        <i class="icon icon-eye-outline"></i>                                    </div>                                </div>                                <div class="source-preview-wrapper">                                    <div class="preview">                                        <div class="preview-elements">                                            <div class="flash-message">                                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)                                                    @if(Session::has('alert-' . $msg))                                                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}                                                            <a href="#" class="close" data-dismiss="alert"                                                               aria-label="close">&times;</a></p>                                                    @endif                                                @endforeach                                            </div>                                            <form action="{{ ($update)? url('/vendor_catering_deal_update') : url('/vendor_catering_deal_store') }}" method="post">                                                {{ csrf_field() }}                                                <input type="hidden" value="{{ Request::segment(2) }}" name="url_id">                                                <input type="hidden" value="{{ Request::segment(3) }}" name="back_id">                                                @if($update == true)                                                @else                                                    <div class="form-group">                                                        <label for="exampleFormControlSelect1">Select Hall</label>                                                        <select class="form-control" disabled name="service_id"                                                                id="exampleFormControlSelect1">                                                            @foreach ($vendor_service as $key => $vendor_services)                                                                <option value="{{ $vendor_services->id }}"{{ $vendor_services->id == Request::segment(2) ? 'selected="selected"' : '' }}>{{ $vendor_services->service_company }}</option>                                                            @endforeach                                                        </select>                                                    </div>                                                @endif                                                <div class="form-group">                                                    <input class="form-control" style="border-bottom: 0.1px solid darkgrey;" type="text" placeholder="Course Name"                                                           name="course_name"  value="{{ ($update)? $vendor_service->course_name : old('course_name') }}" id="example-text-input"/>                                                    <label for="example-text-input">Course Name*</label>                                                    @if ($errors->has('course_name'))                                                        <span class="help-block alert alert-danger">                                                            <strong>The menu name field is required.</strong>                                                        </span>                                                    @endif                                                </div>                                                <div class="form-group">                                                    <input class="form-control" style="border-bottom: 0.1px solid darkgrey;" type="number" placeholder="Per Head"                                                           name="per_head"  value="{{ ($update)? $vendor_service->per_head : old('per_head') }}" id="example-text-input"/>                                                    <label for="example-text-input">Per Head*</label>                                                    @if ($errors->has('per_head'))                                                        <span class="help-block alert alert-danger">                                                            <strong>The per head field is required.</strong>                                                        </span>                                                    @endif                                                </div>                                                <div class="form-group">                                                    <button class="btn btn-danger pull-right" type="submit"                                                            id="example-color-input">Submit                                                    </button>                                                </div>                                            </form>                                        </div>                                    </div>                                </div>                            </div>                        </div>                        <!-- TEXTUAL INPUTS -->                    </div>                </div>            </div>            <!-- CONTENT -->        </div>    </div>@endsection