@extends('layouts.master')


@section('content')

        
                <div class="app-content">
                    <div class="side-app">
                        <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title">Google Calander Meetings</h4>
                            </div>
                            <div class="page-rightheader ml-auto d-lg-flex d-none">
                                <ol class="breadcrumb">
                                    <!-- <li class="breadcrumb-item"><a href="#">Call</a></li> -->
                                    <li class="breadcrumb-item active" aria-current="page">Google Calander Meetings</li>
                                </ol>
                            </div>
                        </div>
                        <!--End Page header-->
                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mx-0" id="myTab" role="tablist">
                                  <li class="nav-item">
                                    <a class="nav-link active" id="log-tab" data-toggle="tab" href="#log" role="tab" aria-controls="log" aria-selected="true">Pending</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="number-tab" data-toggle="tab" href="#number" role="tab" aria-controls="number" aria-selected="false">Added</a>
                                  </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade active show" id="log" role="tabpanel" aria-labelledby="log-tab">
                              <div class="row">
                                    <div class="col-12">
                                        <div class="row flex-lg-nowrap">
                                            <div class="col-12 mb-3">
                                                <div class="e-panel card">
                                                    <div class="card-body">
                                                        <div class="e-table">
                                       

                                                          
                  
                                                           
                                                            <table class="table table-bordered border-top text-nowrap " style="width:100%" id="example_calllogs">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Start Date & Time</th>
                                                                            <th>Title</th>
                                                                            <th>Organizer</th>
                                                                            <th>Number of Guests</th>
                                                                            <th>Action</th>
                                                     
                                                                        </tr>
                                                                    </thead>
                                                                     <tbody>
                                                                         @foreach ($meetings as $meeting)
                                                                         <tr>
                                                                             <td>{{$meeting->START}}</td>
                                                                             <td>{{$meeting->Title}}</td>
                                                                             <td>{{$meeting->Organizer}}</td>
                                                                             <?php
                                                                             $guestscount = explode("\n", $meeting->Guests);
                                                                             ?>
                                                                             <td>{{count($guestscount)-1}}</td>
                                                                             <td>
                                                                                 <button class="btn btn-primary" onclick="addmeeting('{{$meeting->ID}}')">Add</button>
                                                                                 <button class="btn btn-primary" onclick="deletemeeting('{{$meeting->ID}}')">Delete</button>
                                                                             </td>
                                                                             {{-- <td>Add</td>                                                      --}}
                                                                         </tr>                         
                                                                         @endforeach
                                                                    </tbody>
                                                                </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                          </div>
                          <div class="tab-pane fade" id="number" role="tabpanel" aria-labelledby="number-tab">
                              <div class="row">
                                    <div class="col-12">
                                        <div class="row flex-lg-nowrap">
                                            <div class="col-12 mb-3">
                                                <div class="e-panel card">
                                                    <div class="card-body">
                                                        <div class="e-table">
                                                            {{-- <button type=""  data-target="#modaldemo2" data-toggle="modal" class="btn btn-primary" style="float: left"><i class="si si-plus" style="margin-left: 6px"></i> Create Number</button> --}}
                                                            <div class="table-responsive table-lg mt-3 pt-2">
                                                                <table class="table table-bordered border-top text-nowrap " id="example_number">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Start Date & Time</th>
                                                                            <th>Title</th>
                                                                            <th>Organizer</th>
                                                                            <th>Number of Guests</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($addedmeetings as $meeting)
                                                                        <tr>
                                                                            <td>{{$meeting->START}}</td>
                                                                            <td>{{$meeting->Title}}</td>
                                                                            <td>{{$meeting->Organizer}}</td>
                                                                            <?php
                                                                            $guestscount = explode("\n", $meeting->Guests);
                                                                            ?>
                                                                            <td>{{count($guestscount)-1}}</td>
                                                                            <td>
                                                                                {{-- <button class="btn btn-primary" onclick="callmeeting('{{$meeting->Phone}}')">Delete</button> --}}
                                                                                <button class="btn btn-primary" onclick="deletemeeting('{{$meeting->ID}}')">Delete</button>
                                                                            </td>
                                                                            {{-- <td>Add</td>                                                      --}}
                                                                        </tr>                         
                                                                        @endforeach
                                                                   </tbody>
                                                                </table>
                                                                <!-- BASIC MODAL -->
                                                                
                                                                {{-- add new number --}}
                                                                <div class="modal" id="modaldemo2">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content modal-content-demo">
                                                                            <form method="POST" action="{{ route('forwarding.purchase-number') }}">
                                                                                @csrf
                                                                                <div class="modal-header">
                                                                                    <h6 class="modal-title">Add New Number</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label>Type</label>
                                                                                        <select class="form-control" name="type" id="number_type">
                                                                                            <option value="local">Local</option>
                                                                                            <option value="tollfree">Toll Free</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="row">
                                                                                        <div class="col-md-8">
                                                                                            <div class="form-group">
                                                                                                <label class="form-label">Area code <span class="text-red">*</span></label>
                                                                                                <input type="number" name="area_code" class="form-control" id="area_code" required>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <div class="col-md-4 pt-3">
                                                                                                <button type="button" class="btn btn-primary mt-4" id="get_numbers">Get Number</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label">Choose number <span class="text-red">*</span></label>
                                                                                        <select id="addnumber" name="addnumber[]" class="js-example-basic-multiple" required multiple="multiple">
                                                                                            
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="modal-footer">
                                                                                    <div class="d-flex justify-content-between" style="width: 100%;">
                                                                                        <button class="btn btn-light float-left" data-dismiss="modal" type="button">Close</button>
                                                                                    <button id="add" class="btn btn-indigo" type="submit">Add</button> 
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                          </div>
                        </div>
                            
                </div><!-- end app-content-->
@endsection
@section('scripts')
<style type="text/css">
    .modal {
        z-index: 1050 !important;
    }
    .modal-backdrop {
        z-index: 1049 !important;
    }
</style>
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
   $(document).ready(function () {
  $('#example_calllogs').DataTable({
    "pagingType": "simple" // "simple" option for 'Previous' and 'Next' buttons only
  });
  $('.dataTables_length').addClass('bs-select');
});

function addmeeting(id)
            {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                   
                                            $.ajax({
                                            type: "POST",
                                            url: "{{url('addmeeting')}}",
                                            data:'id='+id,
                                            success: function(data){
                                                // swal("Successful", "advertisement approved");
                                                window.location.reload(); 
                                            }
                                        });
             
                
            }

function deletemeeting(id)
            {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                   
                                            $.ajax({
                                            type: "POST",
                                            url: "{{url('deletemeeting')}}",
                                            data:'id='+id,
                                            success: function(data){
                                                // swal("Successful", "advertisement approved");
                                                window.location.reload(); 
                                            }
                                        });
             
                
            }
</script>
@stop
