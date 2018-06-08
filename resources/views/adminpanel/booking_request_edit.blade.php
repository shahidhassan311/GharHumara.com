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
                    <!-- TEXTUAL INPUTS -->
                        <div class="col-12 col-md-12">
                            <div class="example">
                                <div class="description">
                                    <div class="description-text">
                                        <h5>Booking Request Edit</h5>
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

                                            @foreach ($booking_request as $key => $booking_requests)
                                                <form action="{{ url('/booking_request_edit_store',$booking_requests->id) }}" method="post">
                                                    <input type="hidden" name="hall_roll_type" value="{{ $booking_requests->hall_roll_type }}">
                                                    <input type="hidden" name="user_id" value="{{ $booking_requests->user_id }}">
                                                    <input type="hidden" name="booking_id" value="{{ $booking_requests->booking_id }}">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <input class="form-control"
                                                               style="border-bottom: 0.1px solid darkgrey;" type="date"
                                                               placeholder="Hall Name"
                                                               name="booking_date"
                                                               value="{{$booking_requests->booking_date}}"
                                                               id="example-text-input"/>
                                                        <label for="example-text-input">Booking Date</label>
                                                        @if ($errors->has('booking_date'))
                                                            <span class="help-block alert alert-danger">
                                                            <strong>The booking date field is required.</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text"
                                                               placeholder="Enter Contact" disabled
                                                               value="{{ $booking_requests->hall_name }}"
                                                               id="example-search-input"/>
                                                        <label for="example-search-input">Hall Name</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control"
                                                               style="border-bottom: 0.1px solid darkgrey;" type="text"
                                                               placeholder="Section Name"
                                                               disabled
                                                               value="{{$booking_requests->section_name}}"
                                                               id="example-text-input"/>
                                                        <label for="example-text-input">Section Name</label>
                                                    </div>
                                                    <div class="form-group">
                                                    <textarea name="message" class="form-control" id="" cols="30"
                                                              rows="10">{{ $booking_requests->message }}</textarea>
                                                        <label for="example-url-input">Message</label>
                                                        @if ($errors->has('message'))
                                                            <span class="help-block alert alert-danger">
                                                            <strong>The message field is required.</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Status</label>
                                                        <select class="form-control" name="status"
                                                                id="exampleFormControlSelect1">
                                                            <option value="pending" {{ $booking_requests->status == 'pending' ? 'selected="selected"' : '' }}>Pending</option>
                                                            <option value="approved" {{ $booking_requests->status == 'approved' ? 'selected="selected"' : '' }}>Approved</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <button class="btn btn-danger pull-right" type="submit"
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

