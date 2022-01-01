@extends('layouts.master')


@section('content')
    <div class="app-content">
        <div class="side-app">
            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">Create</h4>
                </div>
                <div class="page-rightheader ml-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.') }}">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                                                    <td>11</td>
                                                </tr>
                                                <tr>
                                                    <td>Name</td>
                                                    <td>name</td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td>name@gmail.com</td>
                                                </tr>
                                                <tr>
                                                    <td>Phone</td>
                                                    <td>+918490025654</td>
                                                </tr>
                                                <tr>
                                                    <td>Type</td>
                                                    <td>Member</td>
                                                </tr>
                                                <tr>
                                                    <td>Address</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Status</td>
                                                    <td>Active</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-lg-6">
                                            <h5><i class="fa fa-user"></i> Login Active</h5>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Activity</th>
                                                    <th>Ip</th>
                                                    <th>Date</th>
                                                </tr>
                                                <tr>
                                                    <td>Login</td>
                                                    <td>192.168.0.1</td>
                                                    <td>2021-12-31</td>
                                                </tr>
                                            </table>
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
                                                    
                                                </tr>
                                                <tr>
                                                    <td>test</td>
                                                    <td>+1510546525</td>
                                                    
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                                                    <td>test name</td>
                                                    <td>2021-12-31</td>
                                                    <td>2022-02-25</td>
                                                    <td>$ 50</td>
                                                </tr>
                                            </table>
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
