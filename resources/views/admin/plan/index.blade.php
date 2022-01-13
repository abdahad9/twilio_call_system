@extends('layouts.master')


@section('content')
    <div class="app-content">
        <div class="side-app">
            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">Plans</h4>
                </div>
                <div class="page-rightheader ml-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <!-- <li class="breadcrumb-item"><a href="#">Call</a></li> -->
                        <li class="breadcrumb-item active" aria-current="page">Plans</li>
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
                                    <div class="e-table">
                                        <a href="{{ route('plan.create') }}" class="btn btn-primary" style="float: left"><i class="si si-plus" style="margin-left: 6px"></i> Add Plan</a>
                                        <div class="table-responsive table-lg mt-3 pt-2">
                                            <table class="table table-bordered border-top text-nowrap " id="example_number">
                                                <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Plan Amount</th>
                                                        <th>Numbers of phone numbers</th>
                                                        <th>Total Minute Used</th>
                                                        {{-- <th>Recording Minute</th> --}}
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                 <tbody>
                                                    <tr>
                                                        <td>Test Title</td>
                                                        <td>$2</td>
                                                        <td>2</td>
                                                        {{-- <td>50 Minute</td> --}}
                                                        <td>40 Minute</td>
                                                        <td>
                                                            <button class="btn btn-primary"><i class="fa fa-eye"></i></button>
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <td>Test Title 2</td>
                                                        <td>$2</td>
                                                        <td>2</td>
                                                       {{--  <td>50 Minute</td> --}}
                                                        <td>40 Minute</td>
                                                        <td>
                                                            <button class="btn btn-primary"><i class="fa fa-eye"></i></button>
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <td>Test Title 3</td>
                                                        <td>$2</td>
                                                        <td>2</td>
                                                        {{-- <td>50 Minute</td> --}}
                                                        <td>40 Minute</td>
                                                        <td>
                                                            <button class="btn btn-primary"><i class="fa fa-eye"></i></button>
                                                        </td>
                                                    </tr>
                                                </tbody>
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
            "ajax": '{{ route('plan.get-all') }}',
            "processing": true,
            "serverSide": true,
            columns: [
                { data: "title" },
                { data: "amount" },
                { data: "total_number" },
                { data: "calling_minute" },
                { data: "id",
                    "render": function ( data, type, row, meta ) {
                        var url = '{{ url("/") }}/plan/show/'+data
                        return `<a class="btn btn-primary" href="${url}"> <i class="fa fa-eye"></i></a>`
                    }
                }
            ]
        } );
    });
</script>
@stop
