@extends('layouts.admin_master_layout')

@section('content')
    <div class="content custom-scrollbar">

        <div class="doc data-table-doc page-layout simple full-width">

            <!-- HEADER -->
            <div class="page-header bg-secondary text-auto p-6 row no-gutters align-items-center justify-content-between">
                <h2 class="doc-title" id="content">SEARCH BOOKING</h2>

            </div>

            <!-- / HEADER -->

            <!-- CONTENT -->
            <div class="page-content p-6">
                <div class="content container-fluid">
                    <div class="row">

                        <div class="col-12">
                            <div class="flash-message">
                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                    @if(Session::has('alert-' . $msg))

                                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                                            <a href="#" class="close" data-dismiss="alert"
                                               aria-label="close">&times;</a></p>
                                    @endif
                                @endforeach
                            </div>

                            <div class="col-md-12">
                                <form action="{{ url('/search_filter_data') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Select Hall</label>
                                                {{--<select name="hall_id" class="form-control" id="exampleFormControlSelect1">--}}
                                                    {{--@foreach ($hall as $key => $halls)--}}
                                                    {{--<option value="{{ $halls->id }}">{{ $halls->hall_name }}</option>--}}
                                                    {{--@endforeach--}}
                                                {{--</select>--}}
                                                <input list="browsers" placeholder="Select Hall" name="hall_id"
                                                       class="form-control" id="hall_id">
                                                <datalist id="browsers">
                                                    @foreach ($hall as $key => $halls)
                                                        <option data-id="{{ $halls->id }}" value="{{ $halls->hall_name }}"></option>
                                                    @endforeach
                                                </datalist>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Select Month</label>
                                                <select name="hall_month"  class="form-control"
                                                        id="hall_month">
                                                    <option value="1">January</option>
                                                    <option value="2">February</option>
                                                    <option value="3">March</option>
                                                    <option value="4">April</option>
                                                    <option value="5">May</option>
                                                    <option value="6">June</option>
                                                    <option value="7">July</option>
                                                    <option value="8">August</option>
                                                    <option value="9">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Select Year</label>
                                                <select name="hall_year" class="form-control"
                                                        id="hall_year">
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <button class="btn btn-success" style="margin-top: 15px;" type="button"
                                                        id="search_filter">Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>


                            <div class="example ">

                                <div class="description">
                                    <div class="description-text">

                                        <h3>Hall Info</h3>


                                    </div>
                                    {{--<div class="toggle-source-preview">--}}
                                    {{--<i class="icon icon-code-tags"></i>--}}
                                    {{--<i class="icon icon-eye-outline"></i>--}}
                                    {{--</div>--}}
                                </div>

                                <div class="source-preview-wrapper">
                                    <div class="preview" style="margin-top: -163px;">
                                        <div class="preview-elements">

                                            <table id="sample-data-table" class="table">
                                                <thead>
                                                <tr>
                                                    <th class="secondary-text">
                                                        <div class="table-header">
                                                            <span class="column-title">Booking ID</span>
                                                        </div>
                                                    </th>
                                                    <th class="secondary-text">
                                                        <div class="table-header">
                                                            <span class="column-title">Hall Name</span>
                                                        </div>
                                                    </th>
                                                    <th class="secondary-text">
                                                        <div class="table-header">
                                                            <span class="column-title">Section Name</span>
                                                        </div>
                                                    </th>
                                                    <th class="secondary-text">
                                                        <div class="table-header">
                                                            <span class="column-title">Booking Date</span>
                                                        </div>
                                                    </th>
                                                    <th class="secondary-text">
                                                        <div class="table-header">
                                                            <span class="column-title">Message</span>
                                                        </div>
                                                    </th>
                                                    <th class="secondary-text">
                                                        <div class="table-header">
                                                            <span class="column-title">Status</span>
                                                        </div>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody id="search_data">

                                                </tbody>
                                            </table>

                                            <script type="text/javascript">
                                                $('#sample-data-table').DataTable({
                                                    responsive: true,
                                                    dom: 'rt<"dataTables_footer"ip>'
                                                });
                                            </script>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CONTENT -->

        </div>

    </div>
@endsection