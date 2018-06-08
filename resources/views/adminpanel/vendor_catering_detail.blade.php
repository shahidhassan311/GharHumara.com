@extends('layouts.admin_master_layout')

@section('content')
    {{--modal--}}
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="a_id"  value="">
                        <div class="form-group">
                            <input class="form-control"
                                   style="border-bottom: 0.1px solid darkgrey;" type="text"
                                   placeholder="User Name"
                                   name="name"
                                   value=""
                                   id="example-text-input"/>
                            <label for="example-text-input">Name</label>
                        </div>
                        <div class="form-group">
                            <input class="form-control"
                                   style="border-bottom: 0.1px solid darkgrey;" type="text"
                                   placeholder="User Name"
                                   name="name"
                                   value=""
                                   id="example-text-input"/>
                            <label for="example-text-input">Name</label>
                        </div>
                        <div class="form-group">
                            <input class="form-control"
                                   style="border-bottom: 0.1px solid darkgrey;" type="text"
                                   placeholder="User Name"
                                   name="name"
                                   value=""
                                   id="example-text-input"/>
                            <label for="example-text-input">Name</label>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger pull-right" type="submit"
                                    id="example-color-input">Submit
                            </button>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    {{--modal--}}


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
                        <h1>HMS Catering</h1>
                        <!-- TEXTUAL INPUTS -->
                        <div class="col-12 col-md-12">
                            <div class="example">
                                <div class="description">
                                    <div class="description-text" style="width: 100%">
                                        <h5 style="display: inline-block">Baraat</h5>
                                        <h5 style="display: inline-block;    float: right;">
                                            <button class="btn btn-danger">
                                                <a href="/asd">
                                                    <i class="fa fa-plus" style="    width: auto !important;    padding-top: 4px;">Add ANOTHER MENU</i>
                                                </a>
                                            </button>
                                        </h5>
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
                                            <div class="row">
                                                @foreach ($vendor_courses as $key => $vendor_course)
                                                <div class="card" style="width: 30rem;margin-right: 16px;margin-bottom: 22px;">
                                                    <div class="description" style="text-align: center;">
                                                        <h2 class="card-title">{{ $vendor_course->course_name }}</h2>
                                                        <hr>
                                                        <p><a href=""><button class="btn-primary">Edit</button></a>
                                                        <a href=""><button class="btn btn-success">Add</button></a>
                                                        <a href=""><button class="btn-danger">Delete</button></a></p>
                                                    </div>

                                                    @for ($i = 0 ; $i < count($vendor_menus); $i++)
                                                       

                                                        <div class="card-body">
                                                            <div class="row">
                                                                <h4 class="card-title" style="padding-left: 6px;">{{ $vendor_menus[$i] }}</h4>
                                                                <p style="padding-top:20px;padding-left: 89px;">
                                                                    <button class="btn-primary" data-toggle="modal" data-target="#myModal">Edit</button>
                                                                    <a href=""><button class="btn-danger">Delete</button></a></p>
                                                            </div>
                                                            <p class="card-text">
                                                            <ul>
{{--                                                                @foreach ($menu_id as $key => $menu_ids)--}}
                                                                    @for ($i = 0 ; $i < count($menu_id); $i++)
                                                                    <li class="row">
                                                                        <input type="checkbox" value="{{ $menu_id[$i] }}">
{{--                                                                        {{ $menu_ids->item_name }}--}}
                                                                    </li>
                                                                    @endfor
                                                                {{--@endforeach--}}
                                                            </ul>
                                                            </p>
                                                        </div>
                                                    @endfor
                                                </div>
                                                @endforeach


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

