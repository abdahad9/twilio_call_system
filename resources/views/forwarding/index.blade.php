@extends('layouts.master')


@section('content')

        
                <div class="app-content">
                    <div class="side-app">
                        <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title">Call Forwarding</h4>
                            </div>
                            <div class="page-rightheader ml-auto d-lg-flex d-none">
                                <ol class="breadcrumb">
                                    <!-- <li class="breadcrumb-item"><a href="#">Call</a></li> -->
                                    <li class="breadcrumb-item active" aria-current="page">Call Forwarding</li>
                                </ol>
                            </div>
                        </div>
                        <!--End Page header-->
                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mx-0" id="myTab" role="tablist">
                                  <li class="nav-item">
                                    <a class="nav-link " id="log-tab" data-toggle="tab" href="#log" role="tab" aria-controls="log" aria-selected="true">Logs</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link active" id="number-tab" data-toggle="tab" href="#number" role="tab" aria-controls="number" aria-selected="false">Number</a>
                                  </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade " id="log" role="tabpanel" aria-labelledby="log-tab">
                              <div class="row">
                                    <div class="col-12">
                                        <div class="row flex-lg-nowrap">
                                            <div class="col-12 mb-3">
                                                <div class="e-panel card">
                                                    <div class="card-body">
                                                        <div class="e-table">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <select class="form-control">
                                                                        <option>All Numbers</option>
                                                                        <option>+15102934522</option>
                                                                        <option>+15102934522</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                                                        <i class="fa fa-calendar"></i>&nbsp;
                                                                        <span></span> <i class="fa fa-caret-down"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <select class="form-control">
                                                                        <option>-- Select option --</option>
                                                                        <option>By Day</option>
                                                                        <option>By Month</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <canvas style="height: 100px;" id="myChart"></canvas>
                                                            <hr>
                                                            <div class="d-flex justify-content-between mb-2">
                                                                <div>
                                                                     <h6 class="text-primary">View result one ata time -></h6>
                                                                </div>
                                                                <div>
                                                                    <button class="btn btn-outline-primary">Export</button>
                                                                </div>
                                                            </div>
                                                           
                                                            <table class="table table-bordered border-top text-nowrap " style="width:100%" id="example2">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Tracking Number</th>
                                                                            <th>Start Timer</th>
                                                                            <th>Duration</th>
                                                                            <th>Contact</th>
                                                                            <th>Download Recording</th>
                                                                            
                                                                        </tr>
                                                                    </thead>
                                                                     <tbody>
                                                                        <tr>
                                                                            <td>+1510xxxxxxx</td>
                                                                            <td>Nov 18, 9:30 am</td>
                                                                            <td>27s</td>
                                                                            <td>510xxxxxxxx</td>
                                                                            <td>
                                                                                <a href="#" class="btn btn-primary"><i class="ion ion-arrow-down-c"></i></a>
                                                                                <a href="#" class="btn btn-success"><i class="ion ion-arrow-right-b"></i></a>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td>+1510xxxxxxx</td>
                                                                            <td>Nov 18, 9:30 am</td>
                                                                            <td>27s</td>
                                                                            <td>510xxxxxxxx</td>
                                                                            <td>
                                                                                <a href="#" class="btn btn-primary"><i class="ion ion-arrow-down-c"></i></a>
                                                                                <a href="#" class="btn btn-success"><i class="ion ion-arrow-right-b"></i></a>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td>+1510xxxxxxx</td>
                                                                            <td>Nov 18, 9:30 am</td>
                                                                            <td>27s</td>
                                                                            <td>510xxxxxxxx</td>
                                                                            <td>
                                                                                <a href="#" class="btn btn-outline-primary"><i class="ion ion-arrow-down-c"></i></a>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td>+1510xxxxxxx</td>
                                                                            <td>Nov 18, 9:30 am</td>
                                                                            <td>27s</td>
                                                                            <td>510xxxxxxxx</td>
                                                                            <td>
                                                                                <a href="#" class="btn btn-outline-primary"><i class="ion ion-arrow-down-c"></i></a>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td>+1510xxxxxxx</td>
                                                                            <td>Nov 18, 9:30 am</td>
                                                                            <td>27s</td>
                                                                            <td>510xxxxxxxx</td>
                                                                            <td>
                                                                                <a href="#" class="btn btn-outline-primary"><i class="ion ion-arrow-down-c"></i></a>
                                                                                
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                       {{-- @foreach ($phoneNumbers as $phone)
                                                                             <tr>
                                                                              <td>
                                                                                  {{ $phone->phoneNumber }}
                                                                              </td><td>
                                                                                  {{ $phone->friendlyName }}
                                                                              </td>
                                                                              <td>
                                                                                <a onclick="getvalue({{ $phone->phoneNumber }},'{{ $phone->friendlyName }}')" class="btn" data-target="#modaldemo1" data-toggle="modal" href=""><i class="ion ion-edit"></i></a>
                                                                            </td>
                                                                         </tr>
                                                                        @endforeach--}}
                                                                     
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
                          <div class="tab-pane fade show active" id="number" role="tabpanel" aria-labelledby="number-tab">
                              <div class="row">
                                    <div class="col-12">
                                        <div class="row flex-lg-nowrap">
                                            <div class="col-12 mb-3">
                                                <div class="e-panel card">
                                                    <div class="card-body">
                                                        <div class="e-table">
                                                            <button type=""  data-target="#modaldemo2" data-toggle="modal" class="btn btn-primary" style="float: left"><i class="si si-plus" style="margin-left: 6px"></i> Create Number</button>
                                                            <div class="table-responsive table-lg mt-3 pt-2">
                                                                <table class="table table-bordered border-top text-nowrap " id="example1">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Create Date</th>
                                                                            <th>Number</th>
                                                                            <th>Friendly Name</th>
                                                                            <th>Forward Call To</th>
                                                                            <th>Call Recording</th>
                                                                            <th>Status</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                     <tbody>
                                                                        
                                                                        @foreach($numbers as $number)
                                                                            <tr>
                                                                                <td>{{$number->created_at}}</td>
                                                                                <td>{{$number->phoneNumber}}</td>
                                                                                <td>{{$number->friendlyName}}</td>
                                                                                <td>{{$number->forward_to}}</td>
                                                                                <td>
                                                                                    @if($number->recording_status == 'true')
                                                                                        On
                                                                                    @else
                                                                                        Off
                                                                                    @endif
                                                                                </td>
                                                                                <td>
                                                                                    @if($number->number_status == 'true')
                                                                                        Active
                                                                                    @else
                                                                                        Inactive
                                                                                    @endif
                                                                                </td>
                                                                                <td>
                                                                                    <a class="btn" href="{{ route('forwarding.edit', $number->id) }}">
                                                                                        <i class="ion ion-edit"></i>
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                       {{-- @foreach ($phoneNumbers as $phone)
                                                                             <tr>
                                                                              <td>
                                                                                  {{ $phone->phoneNumber }}
                                                                              </td><td>
                                                                                  {{ $phone->friendlyName }}
                                                                              </td>
                                                                              <td>
                                                                                <a onclick="getvalue({{ $phone->phoneNumber }},'{{ $phone->friendlyName }}')" class="btn" data-target="#modaldemo1" data-toggle="modal" href=""><i class="ion ion-edit"></i></a>
                                                                            </td>
                                                                         </tr>
                                                                        @endforeach--}}
                                                                     
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
                                                                                            <option value="tollfree">Tollfree</option>
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
                                                                                        <select id="addnumber" name="addnumber[]" class="form-control custom-select select2 js-example-basic-multiple" required multiple="multiple">
                                                                                            
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
                        <!--Page header-->
                        {{--<div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title"># Phone Numbers</h4>
                            </div>
                            <div class="page-rightheader ml-auto d-lg-flex d-none">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Call</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Phone NUmbers</li>
                                </ol>
                            </div>
                        </div> --}}
                        <!--End Page header-->
                            
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(function() {
        $('.js-example-basic-multiple').select2();
        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);

    });
    const labels = [10, 20, 30, 40, 50, 60, 70];
    const data = {
      labels: labels,
      datasets: [
        {
          label: '(510) xxx xxxx',
          data: [0, 2, 5, 3, 7, 4, 1],
          borderWidth: 1,
          borderColor: 'rgb(75, 192, 192)',
        },
        {
          label: '(212) xxx xxxx',
          data: [0, 7, 0, 1, 6, 3, 2],
          borderWidth: 1,
          borderColor: 'rgba(54, 162, 235, 1)',
        }
      ]
      /* datasets: [{
        label: 'My First Dataset',
        data: [0, 2, 5, 3, 7, 4, 1],
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
      }] */
    };
    const config = {
      type: 'line',
      data: data,
      options: {
    interaction: {
      intersect: false,
      mode: 'index',
    },
    plugins: {
      title: {
        display: true,
        text: (ctx) => '14 Calls from Oct 20, 2021 - Nov 19, 2001',
      },
    }
  }
    };
    const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );

    $(document).on('click','#get_numbers',function(){
        $(this).prop('disabled', true)
        $(this).html('Processing');
        var areaCode = $('#area_code').val();
        var number_type = $("#number_type").val();
        var $this = this;
        if(areaCode != ''){
            $.ajax({
                url: '{{ route('forwarding.get-number') }}',
                method: 'POST',
                dataType: 'json',
                data: {area_code:areaCode,type:number_type , _token: '{{ csrf_token() }}' },
                success: function(data){
                    $($this).prop('disabled', false)
                    $($this).html('Get Number');
                    var selectHtml = '';
                    $.each(data, function(index,val){
                        selectHtml +=`<option>${val}</option>`;
                    })
                    $('#addnumber').html(selectHtml);
                    $('.js-example-basic-multiple').select2();
                    // console.log(data)
                }, error: function(error){
                    $($this).prop('disabled', false)
                    $($this).html('Get Number');
                    console.log(error)
                }
            })
        }else{
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Area Code required!'
            })
        }
        
    });
</script>
@stop
