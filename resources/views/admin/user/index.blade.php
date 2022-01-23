@extends('layouts.master')


@section('content')
    <div class="app-content">
        <div class="side-app">
            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">Users List</h4>
                </div>
                <div class="page-rightheader ml-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <!-- <li class="breadcrumb-item"><a href="#">Call</a></li> -->
                        <li class="breadcrumb-item active" aria-current="page">Users List</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->
            <div class="row">
                <div class="col-12">
                    <div class="row flex-lg-nowrap">
                        <div class="col-12 mb-3">
                            <div class="e-panel card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-lg-3">
                                            <label>Status</label>
                                            <select class="form-control">
                                                <option>All</option>
                                                <option>Active</option>
                                                <option>Inactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>Sort</label>
                                            <select class="form-control">
                                                <option>User sign up</option>
                                                <option>Last bill date</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>From date</label>
                                            <input class="form-control" type="date" name="form_date">
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>To date</label>
                                            <input class="form-control" type="date" name="to_date">
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>Search</label>
                                            <input class="form-control" type="text" name="Search">
                                        </div>
                                    </div>
                                    <div class="e-table">
                                        <div class="table-responsive table-lg mt-3 pt-2">
                                            <table class="table table-bordered border-top text-nowrap " id="example_number">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                       {{--  <th>Login Id</th> --}}
                                                        <th>Email</th>
                                                        <th>Date signup</th>
                                                        <th>Next Invoice date</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                 {{-- <tbody>
                                                    <tr>
                                                        <td>Name1</td>
                                                        <td>name@gmail.com</td>
                                                        <td>+918490052565</td>
                                                        <td>2021-12-30</td>
                                                        <td>Member</td>
                                                        <td>Active</td>
                                                        <td>
                                                            <a href="{{ route('user.show') }}" class="btn btn-success">View</a>
                                                            <button class="btn btn-primary">Edit</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Name1</td>
                                                        <td>name@gmail.com</td>
                                                        <td>+918490052565</td>
                                                        <td>2021-12-30</td>
                                                        <td>Member</td>
                                                        <td>Active</td>
                                                        <td>
                                                            <button class="btn btn-success">View</button>
                                                            <button class="btn btn-primary">Edit</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Name1</td>
                                                        <td>name@gmail.com</td>
                                                        <td>+918490052565</td>
                                                        <td>2021-12-30</td>
                                                        <td>Member</td>
                                                        <td>Active</td>
                                                        <td>
                                                            <button class="btn btn-success">View</button>
                                                            <button class="btn btn-primary">Edit</button>
                                                        </td>
                                                    </tr>
                                                </tbody> --}}
                                            </table>
                                            <!-- BASIC MODAL -->
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end app-content-->
    </div>
@endsection
@section('scripts')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script type="text/javascript">
    // const autocolors = window['chartjs-plugin-autocolors'];
    // const lighten = (color, value) => Chart.helpers.color(color).lighten(value).rgbString();

    // Chart.register(autocolors);
    $(function() {
        // getChart();
        
        $('#example_number').DataTable( {
            "ajax": '{{ route('user.get_all') }}',
            "processing": true,
            "serverSide": true,
            columns: [
                { data: "name" },
                { data: "email" },
                { data: "created_at" },
                { data: "id",
                    "render" : function (data, type,row){
                        if(row.subscription){
                            return row.subscription.next_date;
                        }else{
                            return '';
                        }
                    }
                },
                { data: "status"},
                { data: "id",
                    "render": function ( data, type, row, meta ) {
                        var viewurl = '{{ url("/") }}/user/show/'+data
                        // return `<a class="btn" href="${url}"> <i class="ion ion-edit"></i></a>`
                         return `<a href="${viewurl}" class="btn btn-success">View</a>
                                                            <button class="btn btn-primary">Edit</button>`;
                    }
                }
            ]
        } );
    });
</script>
@stop