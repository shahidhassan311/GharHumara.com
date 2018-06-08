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
                        <h1>Agent</h1>
                        <!-- TEXTUAL INPUTS -->
                        <div class="col-12 col-md-12">
                            <div class="example">
                                <div class="description">
                                    <div class="description-text">
                                        <h5>Add Agent</h5>
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
                                            <form action="{{($update) ? url('/agent_update') : url('/add_agent_store') }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="a_id"  value="{{ ($update) ? $agent->id : old('id') }}">
                                                <div class="form-group">
                                                    <input class="form-control"
                                                           style="border-bottom: 0.1px solid darkgrey;" type="text"
                                                           placeholder="User Name"
                                                           name="name"
                                                           value="{{ ($update) ? $agent->name : old('name') }}"
                                                           id="example-text-input"/>
                                                    <label for="example-text-input">Name</label>
                                                    @if ($errors->has('name'))
                                                        <span class="help-block alert alert-danger">
                                                            <strong>The name field is required.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="number"
                                                           placeholder="Enter Contact" name="contact"
                                                           value="{{($update) ? $agent->contact : old('contact') }}"
                                                           id="example-search-input"/>
                                                    <label for="example-search-input">Contact</label>
                                                    @if ($errors->has('contact'))
                                                        <span class="help-block alert alert-danger">
                                                            <strong>The contact field is required.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="email"
                                                           value="{{ ($update) ? $agent->email : old('email') }}"
                                                           placeholder="Enter Email Address" name="email"
                                                           id="example-email-input"/>
                                                    <label for="example-email-input">Email</label>
                                                    @if ($errors->has('email'))
                                                        <span class="help-block alert alert-danger">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="password" placeholder="Enter Password"
                                                           name="password"
                                                           id="example-url-input"/>
                                                    <label for="example-url-input">Password</label>
                                                    @if ($errors->has('password'))
                                                        <span class="help-block alert alert-danger">
                                                            <strong>The password field is required.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-secondary pull-right" type="submit"
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

