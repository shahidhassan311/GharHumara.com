@extends('layouts.admin_master_layout')



@section('content')
    
    <div class="content custom-scrollbar">
        
        
        <div class="doc forms-doc page-layout simple full-width">
            
            
            <!-- HEADER -->
            
            <div class="page-header bg-secondary text-auto p-6 row no-gutters align-items-center justify-content-between">
                <h2 class="doc-title" id="content">Vendor Photography</h2>
            </div>
            <!-- / HEADER -->
            <!-- CONTENT -->
            <div class="page-content p-6">
                <div class="content container-fluid">
                    
                    <div class="row">
                        
                        {{--<h1>{{ \Illuminate\Support\Facades\Auth::user()->name }}</h1>--}}
                        
                        <h1>Photography</h1>
                        
                        <!-- TEXTUAL INPUTS -->
                        
                        <div class="col-12 col-md-12">
                            
                            <div class="example">
                                
                                <div class="description">
                                    
                                    <div class="description-text">
                                        
                                        <h5>Form</h5>
                                    
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
                                            <form action="{{($update) ? url('/vendor_photography_update') : url('/vendor_photography_store') }}"
                                                  method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="a_id"
                                                       value="{{ ($update) ? $vendor_service->id : old('id') }}">
                                                <input type="hidden" name="type_id"
                                                       value="{{ ($update) ? $vendor_service->type : old('id') }}">
                                                @if($update == true)
                                                @else
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Select Hall</label>
                                                        <select class="form-control" name="type"
                                                                id="exampleFormControlSelect1">
                                                            @foreach ($vendor_service_type as $key => $vendor_service_types)
                                                                <option value="{{ $vendor_service_types->id }}">{{ $vendor_service_types->service_type }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endif
                                                <div class="form-group">
                                                    
                                                    <input class="form-control" type="text"
                                                    
                                                           placeholder="Enter Contact" name="name"
                                                    
                                                           value="{{($update) ? $vendor_service->name : old('name') }}"
                                                    
                                                           id="example-search-input"/>
                                                    
                                                    <label for="example-search-input">Name</label>
                                                    
                                                    @if ($errors->has('name'))
                                                        
                                                        <span class="help-block alert alert-danger">

                                                            <strong>The name field is required.</strong>

                                                        </span>
                                                    
                                                    @endif
                                                
                                                </div>
                                                
                                                <div class="form-group">
                                                    
                                                    <input class="form-control"
                                                    
                                                           style="border-bottom: 0.1px solid darkgrey;" type="text"
                                                    
                                                           placeholder="User Name"
                                                    
                                                           name="service_company"
                                                    
                                                           value="{{ ($update) ? $vendor_service->service_company : old('service_company') }}"
                                                    
                                                           id="example-text-input"/>
                                                    
                                                    <label for="example-text-input">Service Company</label>
                                                    
                                                    @if ($errors->has('service_company'))
                                                        
                                                        <span class="help-block alert alert-danger">

                                                            <strong>The service company field is required.</strong>

                                                        </span>
                                                    
                                                    @endif
                                                
                                                </div>
                                                
                                                
                                                <div class="form-group">
                                                    
                                                    <input class="form-control" type="number"
                                                    
                                                           value="{{ ($update) ? $vendor_service->amount : old('amount') }}"
                                                    
                                                           placeholder="Enter Email Address" name="amount"
                                                    
                                                           id="example-email-input"/>
                                                    
                                                    <label for="example-email-input">Amount</label>
                                                    
                                                    @if ($errors->has('amount'))
                                                        
                                                        <span class="help-block alert alert-danger">

                                                            <strong>The amount field is required</strong>

                                                        </span>
                                                    
                                                    @endif
                                                
                                                </div>
                                                
                                                <div class="form-group">
                                                    
                                                    <label for="example-url-input">Details</label>
                                                    
                                                    <textarea name="details" id="" cols="143" rows="10"
                                                              style="border-bottom: 0.1px solid darkgrey;border-top: 0.1px solid darkgrey;border-left: 0.1px solid darkgrey;border-right: 0.1px solid darkgrey">{{ ($update) ? $vendor_service->details : old('details') }}</textarea>
                                                    
                                                    @if ($errors->has('details'))
                                                        
                                                        <span class="help-block alert alert-danger">

                                                            <strong>The details field is required.</strong>

                                                        </span>
                                                    
                                                    @endif
                                                
                                                </div>
                                                <div class="form-group">
                                                    <label for="input-24">Profile Image</label>
                                                    <input id="input-24" class="btn-success" name="profile_images" type="file">
                                                </div>
                                                <div class="form-group">
                                                    <label for="input-24">Cover Image</label>
                                                    <input id="input-24" class="btn-success" name="cover_images" type="file">
                                                </div>
                                                <div class="form-group">
                                                    <label for="input-24">Portfolio Image</label>
                                                    <input id="input-24" class="btn-success" name="portfolio_images[]" type="file" multiple>
                                                </div>
                                                
                                                <div class="form-group">
                                                    
                                                    <button class="btn btn-danger pull-right" type="submit"
                                                    
                                                            id="example-color-input">Submit
                                                    
                                                    </button>
                                                
                                                </div>
                                            
                                            </form>
    
                                            @if($update == true)
        
                                                @if($vendor_service->profile_image !== "NULL")
                                                    <img src="{{ URL::to('/') }}/uploads/{{ ($update) ? $vendor_service->profile_image : old('profile_image')}}" height="200" width="300" alt="">
                                                    <a href="/section_photography_profile_image_delete/{{($update) ? $vendor_service->id : old('id')}}">
                                                        <button class="btn btn-danger">DELETE</button>
                                                    </a>
                                                @else
                                                @endif
                                                @if($vendor_service->cover_images !== "NULL")
                                                        <img src="{{ URL::to('/') }}/uploads/{{ ($update) ? $vendor_service->cover_images : old('cover_images')}}" height="200" width="300" alt="">
                                                        <a href="/section_photography_cover_image_delete/{{($update) ? $vendor_service->id : old('id')}}">
                                                            <button class="btn btn-danger">DELETE</button>
                                                        </a>
                                                    @else
                                                @endif
        
                                                <br>
                                                <div>
                                                    @foreach($vendor_photography_images as $vendor_photography_image)
                                                        @if($vendor_photography_image->images !== '')
                                                            <a href="/theme_image_delete/{{($update) ? $vendor_photography_image->id : old('id')}}">
                                                                <button class="btn btn-danger">DELETE</button>
                                                            </a>
                                                            <img src="{{ URL::to('/') }}/uploads/{{ ($update) ? $vendor_photography_image->images : old('images')}}"
                                                                 height="200" width="300" alt="">
                                                        @else
                                                        @endif
                                                    @endforeach
                                                </div>
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



