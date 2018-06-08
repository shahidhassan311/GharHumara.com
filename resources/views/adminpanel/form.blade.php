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
                                        <h5>Textual Inputs</h5>
                                    </div>
                                    <div class="toggle-source-preview">
                                        {{--<i class="icon icon-code-tags"></i>--}}
                                        <i class="icon icon-eye-outline"></i>
                                    </div>
                                </div>

                                <div class="source-preview-wrapper">
                                    <div class="preview">
                                        <div class="preview-elements">
                                            <div class="form-group">
                                                <input class="form-control" type="text" value="Artisanal kale"
                                                       id="example-text-input"/>
                                                <label for="example-text-input">Text</label>
                                            </div>

                                            <div class="form-group">
                                                <input class="form-control" type="search" value="How do I shoot web"
                                                       id="example-search-input"/>
                                                <label for="example-search-input">Search</label>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" type="email" value="bootstrap@example.com"
                                                       id="example-email-input"/>
                                                <label for="example-email-input">Email</label>
                                            </div>

                                            <div class="form-group">
                                                <input class="form-control" type="url" value="https://getbootstrap.com"
                                                       id="example-url-input"/>
                                                <label for="example-url-input">URL</label>
                                            </div>

                                            <div class="form-group">
                                                <input class="form-control" type="tel" value="1-(555)-555-5555"
                                                       id="example-tel-input"/>
                                                <label for="example-tel-input">Telephone</label>
                                            </div>

                                            <div class="form-group">
                                                <input class="form-control" type="password" value="hunter2"
                                                       id="example-password-input"/>
                                                <label for="example-password-input">Password</label>
                                            </div>

                                            <div class="form-group">
                                                <input class="form-control" type="number" value="42"
                                                       id="example-number-input"/>
                                                <label for="example-number-input">Number</label>
                                            </div>

                                            <div class="form-group">
                                                <input class="form-control" type="datetime-local"
                                                       value="2011-08-19T13:45:00" id="example-datetime-local-input"/>
                                                <label for="example-datetime-local-input">Date and time</label>
                                            </div>

                                            <div class="form-group">
                                                <input class="form-control" type="date" value="2011-08-19"
                                                       id="example-date-input"/>
                                                <label for="example-date-input">Date</label>
                                            </div>

                                            <div class="form-group">
                                                <input class="form-control" type="month" value="2011-08"
                                                       id="example-month-input"/>
                                                <label for="example-month-input">Month</label>
                                            </div>

                                            <div class="form-group">
                                                <input class="form-control" type="week" value="2011-W33"
                                                       id="example-week-input"/>
                                                <label for="example-week-input">Week</label>
                                            </div>

                                            <div class="form-group">
                                                <input class="form-control" type="time" value="13:45:00"
                                                       id="example-time-input"/>
                                                <label for="example-time-input">Time</label>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-danger pull-right" type="submit" id="example-color-input">Submit</button>
                                            </div>
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

