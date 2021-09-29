@extends('layouts.master')


@section('content')
                <div class="app-content">
                    <div class="side-app">

                        <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title">Settings</h4>
                            </div>
                            <div class="page-rightheader ml-auto d-lg-flex d-none">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                </ol>
                            </div>
                        </div>
                        <!--End Page header-->

                        <!-- Row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Settings</div>
                                    </div>
                                    <div class="card-body">
                                         @include('app-partials.messages', ['errors' => $errors])
                                       <form class="form" action="{{ route('setting.store') }}" method="post" enctype="multipart/form-data">
                                            <div class="row row-sm">

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Dashboard Page Title Name</label>
                                                        <input class="form-control mb-4" required="" value="{{ config('site.site_name') ? config('site.site_name') : '' }}" name="config[site_name]" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                       <label class="form-label">Login Page Title Name</label>
                                                        <input class="form-control mb-4" required="" value="{{ config('site.site_title') ? config('site.site_title') : '' }}" name="config[site_title]" type="text">
                                                    </div>
                                                </div>
                                                {{-- <div class="col-lg-6">
                                                    <div class="form-group">
                                                       <label class="form-label">Site Url</label>
                                                        <input class="form-control mb-4" required="" value="{{ config('site.site_url') ? config('site.site_url') : '' }}" name="config[site_url]" type="url">
                                                    </div>
                                                </div> --}}

                                            </div>
                                                <div class="row">
                                                    <div class="col-lg-6 ">
                                                
                                                                <div class="box">
                                                                    <div class="box-header d-flex">
                                                                        <h3 class="box-title">Logo</h3>
                                                                        <span class="custom-switch-description mt-1">( Best picture size is 300x300 400x400px )</span>
                                                                    </div>
                                                                    <div class="box-body">
                                                                        <div class="row">
                                                                            <div class="col-xs-12 col-md-12">
                                                                                <div class="form-group">
                                                                                    <input type="file" name="config[logo]" class="form-control">
                                                                                </div>
                                                                            </div>

{{-- 
                                                                            @if(config('site.logo'))
                                                                                <div class="col-xs-12 col-md-12">
                                                                                    <div class="form-group">
                                                                                        <img src="{{ asset('storage/' . config('site.logo')) }}" id="profile-img-tag" class="img-thumbnail" alt="not found" style="width: 200px">
                                                                                    </div>
                                                                                </div>
                                                                            @endif --}}

                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                      
                                                    </div>
                                                    <div class="col-lg-6 ">
                                                   
                                                                <div class="box">
                                                                    <div class="box-header d-flex">
                                                                        <h3 class="box-title">Favicon</h3>
                                                                        <span class="custom-switch-description mt-1"> ( Best picture size is 16x16, 32x32, 64x64 in png or svg )</span>
                                                                    </div>
                                                                    <div class="box-body">
                                                                        <div class="row">
                                                                            <div class="col-xs-12 col-md-12">
                                                                                <div class="form-group">
                                                                                    <input type="file" name="config[favicon]" class="form-control">
                                                                                </div>
                                                                            </div>


                                                                            {{-- @if(config('site.favicon'))
                                                                                <div class="col-xs-12 col-md-12">
                                                                                    <div class="form-group">
                                                                                        <img src="{{ asset('storage/' . config('site.favicon')) }}" id="profile-img-tag" class="img-thumbnail" alt="not found" style="width: 200px">
                                                                                    </div>
                                                                                </div>
                                                                            @endif --}}

                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        
                                                    </div>

                                                </div>
        

                                                <hr>
                                            <div class="card-title">Theme Settings</div>
                                            <div class="row row-sm">
                                            <div class="col-xl-4">
                                                <div class="form-label">Skin Mode</div>
                                                <div class="form-group">
                                                    <label class="custom-switch">
                                                        <span class="custom-switch-description mr-2">Light Mode</span>
                                                        <input type="radio"  @if(config('site.skin_mode') == "#fff") checked @endif   name="config[skin_mode]" value="#fff" class="custom-switch-input">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="custom-switch">
                                                        <span class="custom-switch-description mr-2">Dark Mode</span>
                                                        <input type="radio"  @if(config('site.skin_mode') == "#2e3849") checked @endif   name="config[skin_mode]" value="#2e3849" class="custom-switch-input">
                                                        <span class="custom-switch-indicator custom-switch-indicator"></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-xl-4">
                                                <div class="form-label">Header Style Mode</div>
                                                <div class="form-group">
                                                    <label class="custom-switch">
                                                        <span class="custom-switch-description mr-2">Default Color Header</span>
                                                        <input type="radio" id="default1"  @if(config('site.header_style_mode') == "#ffffff") checked @endif   name="config[header_style_mode]" value="#ffffff" class="custom-switch-input">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>
                                                </div>
                                                {{-- <div class="form-group">
                                                    <label class="custom-switch">
                                                        <span class="custom-switch-description mr-2">Dark Header</span>
                                                        <input type="radio"  @if(config('site.header_style_mode') == "#06091a") checked @endif   name="config[header_style_mode]" value="#06091a" class="custom-switch-input">
                                                        <span class="custom-switch-indicator custom-switch-indicator"></span>
                                                    </label>
                                                </div> --}}
                                                <div class="form-group">
                                                    <label class="custom-switch">
                                                        <span class="custom-switch-description mr-2">Custom Color Header</span>
                                                        <input type="color"  @if(config('site.header_style_mode') == "#ffffff") checked @endif   name="config[header_style_mode]" value="#ffffff" class="uncheck1">
                                                        {{-- <span class="custom-switch-indicator custom-switch-indicator"></span> --}}
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-xl-4">
                                                <div class="form-label">Verticalmenu Styles Mode</div>
                                                <div class="form-group">
                                                    <label class="custom-switch">
                                                        <span class="custom-switch-description mr-2">Default Color Menu</span>
                                                        <input type="radio" id="default2"  @if(config('site.vertical_menu_mode') == "#00008b") checked @endif   name="config[vertical_menu_mode]" value="#00008b" class="custom-switch-input">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>
                                                </div>
                                                {{-- <div class="form-group">
                                                    <label class="custom-switch">
                                                        <span class="custom-switch-description mr-2">Dark Menu</span>
                                                        <input type="radio"  @if(config('site.vertical_menu_mode') == "#06091a") checked @endif   name="config[vertical_menu_mode]" value="#06091a" class="custom-switch-input">
                                                        <span class="custom-switch-indicator custom-switch-indicator"></span>
                                                    </label>
                                                </div> --}}
                                                 <div class="form-group">
                                                    <label class="custom-switch">
                                                        <span class="custom-switch-description mr-2">Custom Color Menu</span>
                                                        <input type="color"  @if(config('site.vertical_menu_mode') == "#00008b") checked @endif   name="config[vertical_menu_mode]" value="#00008b" class="uncheck2">
                                                        {{-- <span class="custom-switch-indicator custom-switch-indicator"></span> --}}
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                        @csrf 
                                            <button type="submit" class="btn btn-primary mt-4 mb-0" value="Send">Save</button>
                                        </form>
                                        {{-- <div class="row justify-content-center">
                                            <div class="col-md-8">
                                                <form action="{{ route('setting.store2') }}" method="post" enctype="multipart/form-data">
                                            @csrf                
                                                    <input type="file" name="xml">
                                                    <input type="Submit" class="btn btn-primary" value="Send">
                                                </form>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                <!--/div-->
                            </div>
                        </div>
                        <!-- End Row-->

                    </div>
                </div><!-- end app-content-->
@endsection
@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
    $("#default1").click(function(){
        $(".uncheck1").prop("checked", false);
    });
    $(".uncheck1").click(function(){
        $("#default1").prop("checked", false);
    });
    $("#default2").click(function(){
        $(".uncheck2").prop("checked", false);
    });
    $(".uncheck2").click(function(){
        $("#default2").prop("checked", false);
    });
});
</script>
@stop
