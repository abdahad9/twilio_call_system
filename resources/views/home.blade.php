@extends('layouts.master')

@section('content')
<div class="app-content">
    <div class="side-app">


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
                                        <option value="google_meets">Google meets</option>
                                        <option value="zoom">Zoom</option>
                                        <option value="google_meets">Microsoft teams</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Select Number <span class="text-red">*</span></label>
                                    <select name="from_number" id="from_number" class="form-control custom-select select2" required>
                                        <option value="0">--Select--</option>
                                        @foreach ($phoneNumbers as $phone)
                                        <option value="{{$phone->phoneNumber}}">{{$phone->friendlyName}}</option>
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
</script>

@stop