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

                                                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                                                            <a href="#" class="close" data-dismiss="alert"
                                                               aria-label="close">&times;</a></p>
                                                    @endif
                                                @endforeach
                                            </div>
                                            @foreach ($booking as $key => $bookings)
                                            <form action="{{url('/booking_update',$bookings->id)}}" method="post">
                                                <input type="hidden" name="_token" value="{{(csrf_token())}}" />
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Select Hall</label>
                                                        <select name="id_country" class="form-control"
                                                                id="exampleFormControlSelect1">
                                                            <option value=""></option>
                                                            @foreach ($hall as $key => $halls)
                                                                <option value="{{ $halls->id }}" {{ $bookings->hall_id == $halls->id ? 'selected="selected"' : '' }}>{{ $halls->hall_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Select Hall
                                                            Section</label>
                                                        <select class="form-control" name="id_state"
                                                                id="exampleFormControlSelect1">
                                                            <option value="{{ $bookings->hall_roll_type }}"{{ $bookings->hall_roll_type == $bookings->hall_roll_type ? 'selected="selected"' : '' }}>{{$bookings->section_name}}</option>

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control"
                                                               style="border-bottom: 0.1px solid darkgrey;" type="date"
                                                               placeholder="Hall Name"
                                                               name="booking_date"
                                                               value="{{ $bookings->booking_date }}"
                                                               id="example-text-input"/>
                                                        <label for="example-text-input">Booking Date</label>
                                                    </div>
                                                    <div class="form-group">
                                                    <textarea name="message" class="form-control" id="" cols="30"
                                                              rows="10">{{ $bookings->message }}</textarea>
                                                        <label for="example-url-input">Hall Details</label>
                                                    </div>
                                                <div class="form-group">
                                                    <button class="btn btn-secondary pull-right" type="submit"
                                                            id="example-color-input">Submit
                                                    </button>
                                                </div>
                                            </form>
                                            @endforeach
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

