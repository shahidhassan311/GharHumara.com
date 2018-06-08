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
                        <h1>Catering</h1>
                        <!-- TEXTUAL INPUTS -->
                        <div class="col-12 col-md-12">
                            <div class="example">
                                <div class="description">
                                    <div class="description-text" style="width: 100%">
                                        <h5 style="display: inline-block">Add Catering</h5>
                                        <h5 style="display: inline-block;    float: right;">

                                            <button class="btn btn-danger">
                                                <i class="fa fa-plus"
                                                   style="    width: auto !important;    padding-top: 4px;">
                                                    ADD ANOTHER MENU
                                                </i>
                                            </button>
                                        </h5>
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
                                            <form action="" method="post">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Select Hall</label>
                                                    <select class="form-control" name="hall_name" id="exampleFormControlSelect1">
                                                        {{--@foreach ($hall as $key => $halls)--}}
                                                            {{--<option value="{{ $halls->id }}" {{($update) ? $hall_section->id == $halls->id : 'selected="selected"' == ''}}>{{ $halls->hall_name }}</option>--}}
                                                        {{--@endforeach--}}
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" style="border-bottom: 0.1px solid darkgrey;" type="text" placeholder="Title"
                                                           name="sad" value="" id="example-text-input"/>
                                                    <label for="example-text-input">Menu Title*</label>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" style="border-bottom: 0.1px solid darkgrey;" type="text" placeholder="Title"
                                                           name="sad" value="" id="example-text-input"/>
                                                    <label for="example-text-input">Menu Title*</label>
                                                </div>

                                                <div class="form-group">
                                                    <button class="btn btn-danger pull-right" type="submit"
                                                            id="example-color-input">Submit
                                                    </button>
                                                </div>
                                            </form>
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

