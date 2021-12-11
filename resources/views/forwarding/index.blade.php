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
                                                                <div class="col-md-4 mt-2">
                                                                    <select class="form-control js-number-multiple" name="numbers[]" multiple="multiple"  id="numberfilter" style="width:100%">
                                                                        {{-- <option value="all">All Numbers</option> --}}
                                                                        @foreach($numbers as $number)
                                                                            <option value="{{$number->phoneNumber}}">{{$number->friendlyName}}({{$number->phoneNumber}})</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-4 mt-2">
                                                                    <select class="form-control" id="dateType">
                                                                        <option value="day">By Day</option>
                                                                        <option value="month">By Month</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-4 mt-2" id="reportrangeBody">
                                                                    <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                                                        <i class="fa fa-calendar"></i>&nbsp;
                                                                        <span></span> <i class="fa fa-caret-down"></i>
                                                                    </div>
                                                                    <input type="hidden" id="startDate">
                                                                    <input type="hidden" id="endDate">
                                                                </div>
                                                                <div class="col-md-4 mt-2" id="datepickerBody" style="display:none;">
                                                                    <input class="form-control" type="text" readonly name="month" id="datepicker" value="{{date('Y')}}" placeholder="select year">
                                                                </div>
                                                                
                                                            </div>

                                                            <canvas style="height: 100px;" id="myChart"></canvas>
                                                            <hr>
                                                            <div class="d-flex justify-content-between mb-2">
                                                                <div>
                                                                     <h6 class="text-primary">View result one ata time -></h6>
                                                                </div>
                                                                <div>
                                                                    <button onclick="exportData()" class="btn btn-outline-primary">Export</button>
                                                                </div>
                                                            </div>
                                                           
                                                            <table class="table table-bordered border-top text-nowrap " style="width:100%" id="example_calllogs">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Tracking Number</th>
                                                                            <th>Start Timer</th>
                                                                            <th>Duration</th>
                                                                            <th>From Number</th>
                                                                            <th>Voicemail</th>
                                                                            <th>Recording</th>
                                                                            
                                                                        </tr>
                                                                    </thead>
                                                                     <tbody>
                                                                     
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
                                                                <table class="table table-bordered border-top text-nowrap " id="example_number">
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
    // const autocolors = window['chartjs-plugin-autocolors'];
    // const lighten = (color, value) => Chart.helpers.color(color).lighten(value).rgbString();

    // Chart.register(autocolors);

    $(document).on('click','.playbtn', function(){
        var id = $(this).attr('data-id');
        $(this).hide();
        $(this).closest('tr').find('.stopbtn').show();
        document.getElementById(id).play();
    })
    $(document).on('click','.stopbtn', function(){
        var id = $(this).attr('data-id');
        $(this).hide();
        $(this).closest('tr').find('.playbtn').show();
        document.getElementById(id).pause();
        document.getElementById(id).currentTime=0;
    })
    $(document).on('click','.playbtn1', function(){
        var id = $(this).attr('data-id');
        $(this).hide();
        $(this).closest('tr').find('.stopbtn1').show();
        document.getElementById(id).play();
    })
    $(document).on('click','.stopbtn1', function(){
        var id = $(this).attr('data-id');
        $(this).hide();
        $(this).closest('tr').find('.playbtn1').show();
        document.getElementById(id).pause();
        document.getElementById(id).currentTime=0;
    })
    $(document).on('change','.numberfilter',function(){
        getChart();
    })
    var year = '{{date('Y')}}';
    var start = moment().subtract(29, 'days');
    var end = moment();
    $(function() {
        $('.js-number-multiple').select2({
            placeholder: "All Numbers",
            allowClear: true
        }).on('change', function (e) {
            getChart();
        });
        $("#datepicker").datepicker({
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years",
            autoclose: true
        }).on('changeDate', function(e) {
            // console.log(e)
            year = $("#datepicker").val();
            getChart();
            //console.log($("#datepicker").val());
            // `e` here contains the extra attributes
        });
        cb(start, end);
        // getChart();
        
        $('#example_number').DataTable( {
            "ajax": '{{ route('forwarding.get_all') }}',
            "processing": true,
            "serverSide": true,
            columns: [
                { data: "created_at" },
                { data: "phoneNumber" },
                { data: "friendlyName" },
                { data: "forward_to" },
                { data: "recording_status",
                    "render": function ( data, type, row, meta ) {
                        var status = '';
                        if(data == 'true'){
                            status = 'On';
                        }else{
                            status = 'Off';
                        }
                        return status;
                    }
                },
                { data: "number_status",
                    "render": function ( data, type, row, meta ) {
                        var status = '';
                        if(data == 'true'){
                            status = 'Active';
                        }else{
                            status = 'Inactive';
                        }
                        return status;
                    }
                },
                { data: "id",
                    "render": function ( data, type, row, meta ) {
                        var url = '{{ url("/") }}/forwarding/edit/'+data
                        return `<a class="btn" href="${url}"> <i class="ion ion-edit"></i></a>`
                    }
                }
            ]
        } );
        $('.js-example-basic-multiple').select2({
            placeholder: "Select number",
        }
        );
        
        function cb(start, end) {
            startdate = start;
            enddate = start;
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            $('#startDate').val(start.format('YYYY-MM-DD'));
            $('#endDate').val(end.format('YYYY-MM-DD'));
            getChart();
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

        

    });
    var datatable = null
    function getCallDatatabel(){
        if(datatable){
            datatable.destroy();
        }
        var number = $('#numberfilter').val();
        var startdate = $('#startDate').val();
        var enddate  = $('#endDate').val();
        datatable = $('#example_calllogs').DataTable( {
            "ajax": {
                "url": "{{ route('forwarding.get_all_calllogs') }}",
                "data": {
                    type:type,
                    year:year,
                    startdate: startdate,
                    enddate: enddate,
                    number: number
                }
              },
            // "ajax": '{{ route('forwarding.get_all_calllogs') }}',
            "processing": true,
            "serverSide": true,
            columns: [
                { data: "call_forward_number.friendlyName" },
                { data: "created_at" },
                { data: "duration",
                    "render": function ( data, type, row, meta ) {
                        return `${data}s`;
                    }
                },
                { data: "number" },
                { data: "voicemail", 
                    "render": function ( data, type, row, meta ) {
                        if(data){
                            var id = row.voicemail_id;
                            var voicemail = row.voicemail;
                            return `<button class="btn btn-primary playbtn play${id}>" data-id="${id}"><i class="fa fa-play"></i>
                                    </button>  
                                     <button style='display: none' class="btn btn-primary stopbtn stop${id}" data-id="${id}"><i class="fa fa-pause"></i>
                                    </button>
                                    <audio class="audiofile" id="${id}" controls hidden="false">
                                    <source src="${voicemail}.mp3" type="audio/mpeg">
                                    </audio>
                                    <a target="_blank" class="btn btn-primary" href="${voicemail}.mp3?Download=true">
                                        <i class="fa fa-download"></i>
                                    </a>`;
                        }else{
                            return '';
                        }
                        //return `<a href="#" class="btn btn-primary"><i class="ion ion-arrow-down-c"></i></a>
                                //<a href="#" class="btn btn-success"><i class="ion ion-arrow-right-b"></i></a>`;
                    }
                    
                },
                { data: "recording", 
                    "render": function ( data, type, row, meta ) {
                        if(data){
                            var id = row.recording_sid;
                            var voicemail = row.recording;
                            return `<button class="btn btn-primary playbtn1 play${id}>" data-id="${id}"><i class="fa fa-play"></i>
                                    </button>  
                                     <button style='display: none' class="btn btn-primary stopbtn1 stop${id}" data-id="${id}"><i class="fa fa-pause"></i>
                                    </button>
                                    <audio class="audiofile" id="${id}" controls hidden="false">
                                    <source src="${voicemail}.mp3" type="audio/mpeg">
                                    </audio>
                                    <a target="_blank" class="btn btn-primary" href="${voicemail}.mp3?Download=true">
                                        <i class="fa fa-download"></i>
                                    </a>`;
                        }else{
                            return '';
                        }
                    }
                    
                },
            ]
        });
    }
    function exportData(){
        var number = $('#numberfilter').val();
        var startdate = $('#startDate').val();
        var enddate  = $('#endDate').val();
        $.ajax({
            url: '{{route('forwarding.call-log-export')}}',
            data:{
                type:type,
                year:year,
                startdate: startdate,
                enddate: enddate,
                number: number,
                _token: '{{csrf_token()}}'
            },
            dataType:'json',
            method:'POST',
            success: function(response){
                const rows = response;
                let csvContent = "data:text/csv;charset=utf-8," 
                + rows.map(e => e.join(",")).join("\n");

                var encodedUri = encodeURI(csvContent);
                var link = document.createElement("a");
                link.setAttribute("href", encodedUri);
                link.setAttribute("download", "calllogs.csv");
                document.body.appendChild(link); // Required for FF

                link.click();
            },error:function(error){

            }
        })
    }
    var type = 'day'
    $(document).on('change','#dateType',function(){
        type = $(this).val();
        if(type =='day' ){
            $('#datepickerBody').hide();
            $('#reportrangeBody').show();
        }else{
            $('#datepickerBody').show();
            $('#reportrangeBody').hide();
        }
        getChart();
    });
    var myChart = false
    function getChart(){
        if(myChart){
            myChart.destroy();
        }
        var number = $('#numberfilter').val();
        var startdate = $('#startDate').val();
        var enddate  = $('#endDate').val();
        let config = {
          type: 'line',
          data: [],
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
              autocolors: {
                customize(context) {
                  const colors = context.colors;
                  return {
                    background: lighten(colors.background, 0.5),
                    border: lighten(colors.border, 0.5)
                  };
                }
              }
            }
          }
        };
        getCallDatatabel();
        $.ajax({
            url: '{{ route('forwarding.get-call-chart') }}',
            data:{
                type:type,
                year:year,
                startdate: startdate,
                enddate: enddate,
                _token:'{{ csrf_token() }}',
                number: number
            },
            method: 'POST',
            dataType: 'json',
            success: function(response){
                config.data = response;
                myChart = new Chart(
                    document.getElementById('myChart'),
                    config
                );
            },error: function(error){

            }
        })
    }
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
                    $('.js-example-basic-multiple').select2({
                        placeholder: "Select number",
                    });
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
