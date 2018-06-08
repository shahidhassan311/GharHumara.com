@extends('layouts.admin_master_layout')

@section('content')
    <div class="content custom-scrollbar">

        <div class="doc forms-doc page-layout simple full-width">

            <!-- HEADER -->
            <div class="page-header bg-secondary text-auto p-6 row no-gutters align-items-center justify-content-between">
                <h2 class="doc-title" id="content">Hall Section</h2>
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
                                        <h5>Add Hall Section</h5>
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

                                            <form action="{{ ($update) ? url('/hall_section_update') : url('/add_hall_section_store')}}" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="section_id" value="{{ ($update) ? $hall_section->section_id : old('section_id') }}">
                                                <input type="hidden" name="p_id" value="{{ ($update) ? $hall_section->id : old('id') }}">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Select Hall</label>
                                                    <select class="form-control" name="hall_name" id="exampleFormControlSelect1">
                                                        @foreach ($hall as $key => $halls)
                                                            <option value="{{ $halls->id }}" {{($update) ? $hall_section->hall_id == $halls->orignal_hall_id : 'selected="selected"' == ''}}>{{ $halls->hall_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control"
                                                           style="border-bottom: 0.1px solid darkgrey;" type="text"
                                                           placeholder="Enter Section Name" name="section_name"
                                                           value="{{ ($update) ? $hall_section->section_name : old('section_name') }}"
                                                           id="example-search-input"/>
                                                    <label for="example-search-input">Section Name</label>
                                                    @if ($errors->has('section_name'))
                                                        <span class="help-block alert alert-danger">
                                                            <strong>The section name field is required.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="number"
                                                           placeholder="Enter Hall Seating" name="hall_seating"
                                                           value="{{ ($update) ? $hall_section->hall_seating : old('hall_seating') }}"
                                                           id="example-email-input"/>
                                                    <label for="example-email-input">Hall Seating</label>
                                                    @if ($errors->has('hall_seating'))
                                                        <span class="help-block alert alert-danger">
                                                            <strong>The hall seating field is required.</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <input class="form-control" type="number" placeholder="Enter Amount"
                                                           name="amount"
                                                           value="{{ ($update) ? $hall_section->amount : old('amount') }}"
                                                           id="example-url-input"/>
                                                    <label for="example-url-input">Rent Amount</label>
                                                    @if ($errors->has('amount'))
                                                        <span class="help-block alert alert-danger">
                                                            <strong>The hall rent field is required.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="detail" class="form-control" id="" cols="30"
                                                              rows="10">{{ ($update) ? $hall_section->detail : old('detail') }}</textarea>
                                                    <label for="example-url-input">Hall Details</label>
                                                    @if ($errors->has('detail'))
                                                        <span class="help-block alert alert-danger">
                                                            <strong>The hall details ame field is required.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                @if($update == true)
                                                    <div class="form-group">
                                                        <label for="input-24">Planets and Satellites</label>
                                                        <input id="input-24" class="btn-success" name="images[]" type="file" multiple>
                                                    </div>
                                                @else
                                                    <div class="form-group">
                                                        <label for="input-24">Planets and Satellites</label>
                                                        <input id="input-24" class="btn-success" name="images[]" type="file" multiple>
                                                    </div>

                                                @endif
                                                <div class="form-group">
                                                    <button class="btn btn-secondary pull-right" type="submit"
                                                            id="example-color-input">Submit
                                                    </button>
                                                </div>
                                            </form>
                                            @if($update == true)
                                                @foreach($hall_section_image as $hall_section_images)
                                                    @if($hall_section_images !== "")
                                                        {{--<div>--}}
                                                            {{--<a href="">--}}
                                                                {{----}}
                                                            {{--</a>--}}
                                                        {{--</div>--}}

                                                        <img src="{{ URL::to('/') }}/uploads/{{$hall_section_images->images }}"
                                                             height="200" width="300" alt="">
                                                        <a href="/section_image_delete/{{ $hall_section_images->id }}">
                                                            <button class="btn btn-danger">DELETE</button>
                                                        </a>
                                                    @else
                                                    @endif
                                                @endforeach
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

