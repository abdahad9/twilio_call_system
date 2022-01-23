@extends('layouts.master')


@section('content')
    <div class="app-content">
        <div class="side-app">
            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">Admin View</h4>
                </div>
                <div class="page-rightheader ml-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.') }}">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Admin View</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->
            <div class="row">
                <div class="col-12">
                    <div class="row flex-lg-nowrap">
                        <div class="col-12 mb-3">
                            <div class="e-panel card">
                                <div class="card-header border-bottom">
                                    <div class="d-flex justify-content-between" style="width:100%">
                                        <div>
                                            <h4>User Profile</h4>
                                        </div>
                                        <div>
                                            <button class="btn btn-sm btn-danger">Suspend</button>
                                            <a href="{{ route('user.') }}" class="btn btn-sm btn-danger">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h5><i class="fa fa-user"></i> User Profile</h5>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>User id</td>
                                                    <td>{{$user->id}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Name</td>
                                                    <td>{{$user->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td>{{$user->email}}</td>
                                                </tr>
                                                {{-- <tr>
                                                    <td>Phone</td>
                                                    <td>+918490025654</td>
                                                </tr> --}}
                                                <tr>
                                                    <td>Type</td>
                                                    <td>{{$user->role}}</td>
                                                </tr>
                                                {{-- <tr>
                                                    <td>Address</td>
                                                    <td></td>
                                                </tr> --}}
                                                <tr>
                                                    <td>Status</td>
                                                    <td>{{$user->status}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-lg-6">
                                            <h5><i class="fa fa-user"></i> Login Active</h5>
                                            <table class="table table-bordered" id="example_number">
                                                <tr>
                                                    <th>Activity</th>
                                                    <th>Ip</th>
                                                    <th>Date</th>
                                                </tr>
                                                @foreach($user_ips as $ip)
                                                <tr>
                                                    <td>{{$ip->activity}}</td>
                                                    <td>{{$ip->ip}}</td>
                                                    <td>{{$ip->cdate}}</td>
                                                </tr>
                                                @endforeach
                                            </table>

                                            {{ $user_ips->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="e-panel card">
                                <div class="card-header border-bottom">
                                    <div class="d-flex justify-content-between" style="width:100%">
                                        <div>
                                            <h4>User Number</h4>
                                        </div>
                                        <div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Nickname</th>
                                                    <th>Number</th>
                                                    
                                                </tr>
                                                {{-- <tr>
                                                    <td>test</td>
                                                    <td>+1510546525</td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>test</td>
                                                    <td>+1510546525</td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>test</td>
                                                    <td>+1510546525</td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>test</td>
                                                    <td>+1510546525</td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>test</td>
                                                    <td>+1510546525</td>
                                                    
                                                </tr> --}}
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if($user->sub)
                                <div class="e-panel card">
                                    <div class="card-header border-bottom">
                                        <div class="d-flex justify-content-between" style="width:100%">
                                            <div>
                                                <h4>Package Details</h4>
                                            </div>
                                            <div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>Package Name</th>
                                                        <th>Package Start Date</th>
                                                        <th>Package Renewal Date</th>
                                                        <th>Package Price</th>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td>{{$user->sub->plan->title}}</td>
                                                        <td>{{$user->sub->starting_date}}</td>
                                                        <td>{{$user->sub->next_date}}</td>
                                                        <td>$ {{$user->sub->amount}}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
                
        </div><!-- end app-content-->
@endsection
@section('scripts')

@stop
