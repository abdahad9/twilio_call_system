@extends('layouts.master')


@section('content')

      
         <!-- Main-content -->
         <div class="app-content">
            <div class="side-app">

					<!--Page header-->
                    <div class="page-header">
                        <div class="page-leftheader">
                            <h4 class="page-title">EditProfile</h4>
                        </div>
                        <div class="page-rightheader ml-auto d-lg-flex d-none">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">EditProfile</li>
                            </ol>
                        </div>
                    </div>
                    <!--End Page header-->

                    <!-- Row -->
                    <div class="row">
                        <div class="col-xl-4 col-lg-5">
                            <div class="card box-widget widget-user">
                                <div class="widget-user-image mx-auto mt-5 text-center"><img alt="User Avatar" class="avatar-xxl rounded-circle" src="{{ asset('storage/' . config('site.profile')) }}"></div>
                                <div class="card-body text-center">
                                    <div class="pro-user">
                                        <h3 class="pro-user-username text-dark mb-1">
                                            @if(Auth::user()->role == 'admin')
                                                {{ config('site.user_name') }}
                                            @else
                                                {{Auth::user()->name}}
                                            @endif
                                        </h3>
                                        <h6 class="pro-user-desc text-muted">
                                            @if(Auth::user()->role == 'admin')
                                                {{ config('site.user_position') }}
                                            @else
                                                User
                                            @endif
                                        </h6>
                                        <a href="{{ route('profile.myprofile') }}" class="btn btn-primary mt-3">View Profile</a>
                                    </div>
                                </div>
                                @if(Auth::user()->role == 'admin')
                                    <div class="card-footer p-0">
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
                                    </div>
                                @endif
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Edit Password</div>
                                </div>
                                <div class="card-body">
                                    {{-- <div class="text-center mb-5">
                                        <img alt="User Avatar" class="avatar-xxl rounded-circle  mr-3" src="{{ asset('storage/' . config('site.profile')) }}">
                                        <div class="mt-4 ml-0 ml-sm-auto ">
                                            <a href="#" class="btn btn-primary mb-1">Edit profile</a>
                                            <a href="#" class="btn btn-secondary mb-1">Delete profile</a>
                                        </div>
                                    </div> --}}
                                    <div class="form-group">
                                        <label class="form-label">Change Password</label>
                                        <input type="password" class="form-control" value="password">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">New Password</label>
                                        <input type="password" class="form-control" value="password">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" value="password">
                                    </div>
                                </div>
                                {{-- <div class="card-footer text-right">
                                    <a href="#" class="btn btn-primary">Updated</a>
                                    <a href="#" class="btn btn-secondary">Cancle</a>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7">
                            @include('app-partials.messages', ['errors' => $errors])
                            @if(Auth::user()->role == 'admin')
                                <form class="form" action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
                            @else
                                <form class="form" action="javascript:void(0);" method="post" enctype="multipart/form-data">
                            @endif
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Edit Profile</div>
                                </div>
                                <div class="card-body">
                                    <div class="card-title font-weight-bold">Personal info:</div>
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Name</label>
                                                <input class="form-control mb-4" required="" @if(Auth::user()->role == 'admin') value="{{ config('site.user_name') ? config('site.user_name') : '' }}" @else value="{{Auth::user()->name }}"  @endif name="config[user_name]" type="text">
                                            </div>
                                        </div>
                                        @if(Auth::user()->role == 'admin')
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Position</label>
                                                    <input class="form-control mb-4" required="" value="{{ config('site.user_position') ? config('site.user_position') : '' }}" name="config[user_position]" type="text">
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Email address</label>
                                                <input class="form-control mb-4" required="" @if(Auth::user()->role == 'admin') value="{{ config('site.user_email') ? config('site.user_email') : '' }}" @else value="{{Auth::user()->email }}"  @endif name="config[user_email]" type="email">
                                            </div>
                                        </div>
                                        @if(Auth::user()->role == 'admin')
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Phone Number</label>
                                                <input class="form-control mb-4" required="" value="{{ config('site.user_Phone') ? config('site.user_Phone') : '' }}" name="config[user_Phone]" type="number">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-label">Upload Profile Image</div>
                                                <div class="input-group mb-5">
                                                    <input type="text" class="form-control browse-file" placeholder="Choose" readonly>
                                                    <label class="input-group-btn">
                                                        <span class="btn btn-primary">
                                                            Browse <input type="file" name="config[profile]" style="display: none;" multiple>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Address</label>
                                                <input class="form-control mb-4" value="{{ config('site.user_address') ? config('site.user_address') : '' }}" name="config[user_address]" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">City</label>
                                                <input class="form-control mb-4" value="{{ config('site.user_city') ? config('site.user_city') : '' }}" name="config[user_city]" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Postal Code</label>
                                                <input type="number" class="form-control" placeholder="ZIP Code">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="form-label">Country</label>
                                                <select class="form-control nice-select select2">
                                                    <optgroup label="Categories">
                                                        <option data-select2-id="5">--Select--</option>
                                                        <option value="1">Germany</option>
                                                        <option value="2">Real Estate</option>
                                                        <option value="3">Canada</option>
                                                        <option value="4">Usa</option>
                                                        <option value="5">Afghanistan</option>
                                                        <option value="6">Albania</option>
                                                        <option value="7">China</option>
                                                        <option value="8">Denmark</option>
                                                        <option value="9">Finland</option>
                                                        <option value="10">India</option>
                                                        <option value="11">Kiribati</option>
                                                        <option value="12">Kuwait</option>
                                                        <option value="13">Mexico</option>
                                                        <option value="14">Pakistan</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    {{-- <div class="card-title font-weight-bold mt-5">External Links:</div>
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Facebook</label>
                                                <input type="text" class="form-control" placeholder="https://www.facebook.com/">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Google</label>
                                                <input type="text" class="form-control" placeholder="https://www.google.com/">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Twitter</label>
                                                <input type="text" class="form-control" placeholder="https://twitter.com/">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Pinterest</label>
                                                <input type="text" class="form-control" placeholder="https://in.pinterest.com/">
                                            </div>
                                        </div>
                                    </div> --}}
                                    @if(Auth::user()->role == 'admin')
                                        <div class="card-title font-weight-bold mt-5">About:</div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">About Me</label>
                                                    <textarea rows="5" class="form-control" placeholder="Enter About your description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                @csrf
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary mt-4 mb-0" value="Send">Save</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    <!-- End Row-->

                </div>
            </div><!-- end app-content-->
@endsection
@section('scripts')

@stop
