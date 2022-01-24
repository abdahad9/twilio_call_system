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
                                            <select class="form-control" id="statusFilter">
                                                <option value="all">All</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>Sort</label>
                                            <select class="form-control" id="sortby">
                                                <option value="signup">User sign up</option>
                                                <option value="billdate">Last bill date</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>From date</label>
                                            <input class="form-control" type="date" name="form_date" id="startdate">
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>To date</label>
                                            <input class="form-control" type="date" name="to_date" id="enddate">
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>Search</label>
                                            <input class="form-control" type="text" name="Search" id="query">
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
            "ajax": { 
                 "url": '{{ route('user.get_all') }}',
                 "data": function ( d ) {
                    d.status = $("#statusFilter").val();
                    d.sortby = $("#sortby").val();
                    d.q = $("#query").val();
                    d.startdate = $("#startdate").val();
                    d.enddate = $("#enddate").val();
                }
            },
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
                                                            <!--<button class="btn btn-primary">Edit</button>-->`;
                    }
                }
            ]
        } );
    });
    $(document).on('change','#statusFilter', function(){
        $('#example_number').DataTable().draw();
    });

    $(document).on('change','#sortby', function(){
        $('#example_number').DataTable().draw();
    });

    $(document).on('keyup','#query', function(){
        $('#example_number').DataTable().draw();
    });

    $(document).on('change','#startdate', function(){
        $('#example_number').DataTable().draw();
    });

    $(document).on('change','#enddate', function(){
        $('#example_number').DataTable().draw();
    });

    
</script>
@stop
