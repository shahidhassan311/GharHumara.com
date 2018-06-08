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
                        <h1>user</h1>
                        <!-- TEXTUAL INPUTS -->
                        <div class="col-12 col-md-12">
                            <div class="example">
                                <div class="description">
                                    <div class="description-text">
                                        <h5>Add Hall</h5>
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
                                            <form action="{{ ($update) ? url('/agent_hall_update') : url('/agent_add_hall_store') }}"
                                                  method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="hidden"
                                                       value="{{($update) ? $hall_section->id : old('hall_section')}}"
                                                       name="p_id">
                                                <div class="form-group">
                                                    <input class="form-control"
                                                           style="border-bottom: 0.1px solid darkgrey;" type="text"
                                                           placeholder="Hall Name"
                                                           name="hall_name"
                                                           value="{{ ($update) ? $hall_section->hall_name : old('hall_name') }}"
                                                           id="example-text-input"/>
                                                    <label for="example-text-input">Hall Name</label>
                                                    @if ($errors->has('hall_name'))
                                                        <span class="help-block alert alert-danger">
                                                            <strong>The hall name field is required.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="number"
                                                           placeholder="Enter Contact" name="contact"
                                                           value="{{ ($update) ? $hall_section->contact : old('contact') }}"
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
                                                           value="{{ ($update) ? $hall_section->email : old('email') }}"
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
                                                    <input class="form-control" type="text" placeholder="Enter Address"
                                                           name="address"
                                                           value="{{ ($update) ? $hall_section->address : old('address') }}"
                                                           id="example-url-input"/>
                                                    <label for="example-url-input">Hall Address</label>
                                                    @if ($errors->has('address'))
                                                        <span class="help-block alert alert-danger">
                                                            <strong>The address field is required.</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                @if($update == true)
                                                    @if($hall_section->cover_images == NULL)
                                                        <div class="form-group">
                                                            <label for="input-24">Add Cover Picture</label>
                                                            <input id="input-24" class="btn-success" name="cover_images"
                                                                   type="file" style="background-color: #c6ac55">
                                                        </div>
                                                    @else
                                                    
                                                    @endif
                                                @else
                                                
                                                @endif
                                                @if($update == false)
                                                    <div class="form-group">
                                                        <label for="input-24">Add Cover Picture</label>
                                                        <input id="input-24" class="btn-success" name="cover_images"
                                                               type="file" style="background-color: #c6ac55">
                                                    </div>
                                                   
                                                @else
    
                                                @endif
                                                <div class="form-group">
                                                    <button class="btn btn-secondary pull-right" type="submit"
                                                            id="example-color-input">Submit
                                                    </button>
                                                </div>
                                            </form>
                                            @if($update)
                                                @if($hall_section->cover_images !== NULL)
                                                    <img src="{{ URL::to('/') }}/uploads/{{ $hall_section->cover_images }}"
                                                         height="200" width="300" alt="">
                                                    <a href="/hall_image_delete/{{$hall_section->id}}">
                                                        <button class="btn btn-secondary">DELETE</button>
                                                    </a>
                                                @else
                                                
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

