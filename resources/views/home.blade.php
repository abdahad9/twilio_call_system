@extends('layouts.master')

@section('content')
<div class="app-content">
    <div id="call_loader">
    <div id="global-loader" style="background: rgba(0,0,0,0.2)">
        <img src="/backend/assets/images/svgs/loader.svg" alt="loader">
    </div>
    </div>
    <div class="side-app">
        <h1 id="demo" style="float: right; margin-top: 12px;" ><time>00:00:00</time></h1>
        {{-- <button type="button" onclick="start2()">start</button> --}}
        {{-- <button id="stop">stop</button> --}}
        {{-- <button id="clear">clear</button> --}}

        <!-- Row-->
        {{-- @include('app-partials.messages', ['errors' => $errors]) --}}
        <form class="mb-5" action="{{ route('new-call') }}" method="post" id="contactForm" name="contactForm">
        @csrf
        <div class="row mt-8">
            <div class="col-xl-6 col-lg-12 col-md-12" style="margin-left:auto; margin-right:auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Dail Number</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Select Calling server <span class="text-red">*</span></label>
                                    <select onchange="val()" id="server" name="server" class="form-control custom-select select2" required>
                                        <option value="0">--Select--</option>
                                        <option value="google_meets">Google Meet</option>
                                        <option value="zoom">Zoom</option>
                                        <option value="google_meets">Microsoft Teams</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Select Number <span class="text-red">*</span></label>
                                    <select name="from_number" id="from_number" class="form-control custom-select select2" required>
                                        <option value="0">--Select--</option>
                                        @foreach ($phoneNumbers as $phone)
                                            {{-- @if(!in_array($phone->phoneNumber, $forwardNumbers)) --}}
                                                <option value="{{$phone->phoneNumber}}">{{$phone->friendlyName}}</option>
                                            {{-- @endif --}}
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">To number <span class="text-red">*</span></label>
                                    <input type="text" name="phoneNumber" id="phoneNumber" class="form-control" placeholder="Enter phone" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Pin Number <span class="text-red">*</span></label>
                                    <input type="text" name="pin" id="pin" class="form-control" placeholder="Enter Pin" required>
                                </div>
                            </div>
                            <div class="col-md-12" id='participant' style="display: none">
                                <div class="form-group">
                                    <label class="form-label">participant ID <span class="text-red">*</span></label>
                                    <input type="text" name="participant_id" id="participant_id" class="form-control" placeholder="Enter participant_id">
                                </div>
                            </div>
                            <div class="form-group mb-0 mt-4 row justify-content-end ml-2">
                                <div class="col-md-12">
                                    <a onclick="callCustomer()">
                                        <button  type="button" class="btn btn-primary">
                                        Dail
                                      </button> 
                                    </a>
                                    <button onclick="hangUp()" id="endbtn" type="button" class="btn btn-danger">End</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Row-->

    </form>
    </div>
</div><!-- end app-content-->
@endsection
@section('scripts')
<script>
function val() {
    d = document.getElementById("server").value;
    if(d == 'zoom'){
        document.getElementById("participant").style.display=('block');
    }
    else{
        document.getElementById("participant").style.display=('none');
    }
}

var h1 = document.getElementsByTagName('h1')[0],
    start = document.getElementById('start'),
    stop = document.getElementById('stop'),
    clear = document.getElementById('clear'),
    seconds = 0, minutes = 0, hours = 0,
    t;

function add() {
    seconds++;
    if (seconds >= 60) {
        seconds = 0;
        minutes++;
        if (minutes >= 60) {
            minutes = 0;
            hours++;
        }
    }
    
    h1.textContent = (hours ? (hours > 9 ? hours : "0" + hours) : "00") + ":" + (minutes ? (minutes > 9 ? minutes : "0" + minutes) : "00") + ":" + (seconds > 9 ? seconds : "0" + seconds);

    timer();
}
function timer() {
    t = setTimeout(add, 1000);
}

</script>

@stop