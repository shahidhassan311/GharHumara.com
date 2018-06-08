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
                        <h1>Booking</h1>
                        <!-- TEXTUAL INPUTS -->
                        <div class="col-12 col-md-12">
                            <div class="example">
                                <div class="description">
                                    <div class="description-text">
                                        <h5>Add Booking</h5>
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

                                                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <form name="StageForm" action="{{url('/add_booking_a_store')}}" method="post">
                                                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                                {{--<input type="hidden" value="{{ old('hall_section')}}" name="p_id">--}}

                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Select Agent</label>
                                                    <select name="user_id" class="form-control" id="exampleFormControlSelect1">
                                                        <option value=""></option>
                                                    @foreach ($users as $key => $user)
                                                            <option value="{{ $user->id }}">{{ $user->name }}  ({{ $user->role }})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Select Hall</label>
                                                    <select name="id_country" class="form-control" id="exampleFormControlSelect1">
                                                        <option value=""></option>
                                                    @foreach ($hall as $key => $halls)
                                                            <option value="{{ $halls->id }}">{{ $halls->hall_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Select Hall Section</label>
                                                    <select class="form-control" style="border-bottom: 0.1px solid darkgrey;" name="id_state" id="exampleFormControlSelect1">
                                                        {{--@foreach ($hall_section as $key => $hall_sections)--}}
                                                            {{--<option value="{{ $hall_sections->id }}">{{ $hall_sections->section_name }}</option>--}}
                                                        {{--@endforeach--}}
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control"
                                                           style="border-bottom: 0.1px solid #e4e3e3;" type="date"
                                                           placeholder="Hall Name"
                                                           name="booking_date"
                                                           value="{{ old('booking_date') }}"
                                                           id="example-text-input"/>
                                                    <label for="example-text-input" style="margin-top: -18px;">Booking Date</label>
                                                    @if ($errors->has('booking_date'))
                                                        <span class="help-block alert alert-danger">
                                                            <strong>The booking date field is required.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="message" class="form-control" id="" cols="30"
                                                              rows="10">{{ old('message') }}</textarea>
                                                    <label for="example-url-input">Hall Details</label>
                                                    @if ($errors->has('message'))
                                                        <span class="help-block alert alert-danger">
                                                            <strong>The message ame field is required.</strong>
                                                        </span>
                                                    @endif
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

