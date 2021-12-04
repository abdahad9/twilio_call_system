@extends('layouts.master')


@section('content')

      
         <!-- Main-content -->
         <div class="app-content">
            <div class="side-app">

				<!--Page header-->
                <div class="page-header">
                    <div class="page-leftheader">
                        <h4 class="page-title">Profile</h4>
                    </div>
                    <div class="page-rightheader ml-auto d-lg-flex d-none">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">My Profile</a></li>
                    
                        </ol>
                    </div>
                </div>
                <!--End Page header-->
                    
                                            <!-- Row -->
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4 col-md-12">
                                                    <div class="card box-widget widget-user">
                                                        <div class="widget-user-image mx-auto mt-5 text-center"><img alt="User Avatar" class="avatar-xxl rounded-circle mb-1" src="{{ asset('storage/' . config('site.profile')) }}"></div>
                                                        <div class="card-body text-center">
                                                            <div class="pro-user">
                                                                <h4 class="pro-user-username text-dark mb-1 font-weight-bold">{{ config('site.user_name') }}</h4>
                                                                <h6 class="pro-user-desc text-muted">{{ config('site.user_position') }}</h6>
                                                                <a href="{{ route('profile.editprofile') }}" class="btn btn-primary btn-sm mt-3">Edit Profile</a>
                                                                {{-- <a href="#" class="btn btn-success btn-sm mt-3">Follow</a> --}}
                                                            </div>
                                                        </div>
                                                        {{-- <div class="card-footer p-0">
                                                            <div class="row">
                                                                <div class="col-sm-6 border-right text-center">
                                                                    <div class="description-block p-4">
                                                                        <h5 class="description-header mb-1 font-weight-bold">689k</h5>
                                                                        <span class="text-muted">Followers</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="description-block text-center p-4">
                                                                        <h5 class="description-header mb-1 font-weight-bold">3,765</h5>
                                                                        <span class="text-muted">Following</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                   
                                                </div>
     
                                            </div>
					</div>
				</div><!-- end app-content-->

@endsection
@section('scripts')

@stop
