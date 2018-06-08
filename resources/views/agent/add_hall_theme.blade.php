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
                                        <h5>Add Hall Theme</h5>
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
                                            <form action="{{ ($update) ? url('/agent_hall_theme_update') : url('/agent_add_hall_theme_store')}}" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="p_id"
                                                       value="{{ ($update) ? $hall_theme->id : old('id') }}">
                                                <input type="hidden" name="hall_id"
                                                       value="{{ ($update) ? $hall_theme->hall_id : old('id') }}">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Select Hall</label>
                                                    <select class="form-control" name="hall_name" id="exampleFormControlSelect1">
                                                        @foreach ($hall as $key => $halls)
                                                            <option value="{{ $halls->id }}" {{($update) ? $hall_theme->hall_id : $halls->id ? 'selected="selected"' : ''}}>{{ $halls->hall_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control"
                                                           style="border-bottom: 0.1px solid darkgrey;" type="number"
                                                           placeholder="Enter Amount" name="amount"
                                                           value="{{ ($update) ? $hall_theme->amount : old('amount') }}"
                                                           id="example-search-input"/>
                                                    <label for="example-search-input">Amount</label>
                                                    @if ($errors->has('amount'))
                                                        <span class="help-block alert alert-danger">
                                                            <strong>The amount field is required.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="detail" class="form-control" id="" cols="30"
                                                              rows="10">{{ ($update) ? $hall_theme->detail : old('detail') }}</textarea>
                                                    <label for="example-url-input">Theme Details</label>
                                                    @if ($errors->has('detail'))
                                                        <span class="help-block alert alert-danger">
                                                            <strong>The theme details ame field is required.</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                @if($update)
                                                    <div class="form-group">
                                                        <label for="input-24">Planets and Satellites</label>
                                                        <input id="input-24" class="btn-success" name="images[]"
                                                               type="file" multiple>
                                                    </div>
                                                @else
                                                    <div class="form-group">
                                                        <label for="input-24">Planets and Satellites</label>
                                                        <input id="input-24" class="btn-success" name="images[]"
                                                               type="file" multiple>
                                                    </div>

                                                @endif
                                                <div class="form-group">
                                                    <button class="btn btn-secondary pull-right" type="submit"
                                                            id="example-color-input">Submit
                                                    </button>
                                                </div>
                                            </form>
                                            @if($update)
                                                @if($hall_theme_image == '')
                                                    @else
                                                @foreach($hall_theme_image as $hall_theme_images)
                                                    <img src="{{ URL::to('/') }}/uploads/{{ $hall_theme_images->images }}"
                                                         height="200" width="300" alt="">
                                                    <a href="/hall_theme_image_delete/{{ $hall_theme_images->id }}/{{ Request::segment(2) }}">
                                                        <button class="btn btn-danger">DELETE</button>
                                                    </a>
                                                @endforeach
                                                @endif
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

