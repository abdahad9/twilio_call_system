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
                                            @if($user->status == 'active')
                                                <a href="{{ url('user/change-status') }}/{{$user->id}}/inactive" class="btn btn-sm btn-danger">Suspend</a>
                                            @else
                                                <a href="{{ url('user/change-status') }}/{{$user->id}}/active" class="btn btn-sm btn-success">Active</a>
                                            @endif
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
                                            @if($user->sub && $user->sub->total_number > count($assign_numbers))
                                                <button type=""  data-target="#modaldemo2" data-toggle="modal" class="btn btn-primary mb-4" style="float: right"><i class="si si-plus" style="margin-left: 6px"></i> Assign Number</button>
                                            @endif
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Nickname</th>
                                                    <th>Number</th>
                                                    <th>Action</th>
                                                </tr>
                                                @foreach($assign_numbers as $a_number)
                                                 <tr>
                                                    <td>{{$a_number->friendlyName}}</td>
                                                    <td>{{$a_number->phoneNumber}}</td>
                                                    <td>
                                                        <button class="btn btn-danger" onclick="Swal.fire({
                                                              title: 'Are you sure?',
                                                              text: 'You won\'t be able to revert this!',
                                                              icon: 'warning',
                                                              showCancelButton: true,
                                                              confirmButtonColor: '#3085d6',
                                                              cancelButtonColor: '#d33',
                                                              confirmButtonText: 'Yes, unassign it!'
                                                            }).then((result) => {
                                                              if (result.isConfirmed) {
                                                                window.location = '{{ url('user/number-unassign') }}/{{$user->id}}/{{$a_number->id}}';
                                                              }
                                                            })">
                                                            Unassign
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endforeach
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
                                                        <th>Total Number</th>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td>{{$user->sub->plan->title}}</td>
                                                        <td>{{$user->sub->starting_date}}</td>
                                                        <td>{{$user->sub->next_date}}</td>
                                                        <td>$ {{$user->sub->amount}}</td>
                                                        <td>{{$user->sub->total_number}}</td>
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
            {{-- add new number --}}
            <div class="modal" id="modaldemo2">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-demo">
                        <form method="POST" action="{{ route('user.number-assign') }}">
                            @csrf
                            <div class="modal-header">
                                <h6 class="modal-title">Add New Number</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                <div class="form-group">
                                    <label>Select Number</label>
                                    <select name="sid" class="form-control" required>
                                        @foreach($numbers as $asign_number)
                                            @if(!in_array($asign_number['phoneNumber'], $forward_numbers))
                                                <option value="{{$asign_number['sid']}}">{{$asign_number['friendlyName']}} - {{$asign_number['phoneNumber']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="d-flex justify-content-between" style="width: 100%;">
                                    <button class="btn btn-light float-left" data-dismiss="modal" type="button">Close</button>
                                <button id="add" class="btn btn-indigo" type="submit">Assign</button> 
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- end app-content-->
@endsection
@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stop
