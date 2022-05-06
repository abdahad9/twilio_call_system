@extends('layouts.master')


@section('content')

      
                <div class="app-content">
                    <div class="side-app">

                        <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title">Make New Call</h4>
                            </div>
                            <div class="page-rightheader ml-auto d-lg-flex d-none">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Call</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Report</li>
                                </ol>
                            </div>
                        </div>
                        <!--End Page header-->


    <div class="row">

      <div class="col-md-5 order-md-2 mb-4">
        <div class="card">
          <h5 class="card-header">
            Make a call
          </h5>
          <div class="card-body">
            <div class="form-group row">
              <label for="call-status" class="col-3 col-form-label">Status</label>
              <div class="col-9">
                <input id="call-status" class="form-control" type="text" placeholder="Connecting to Twilio..." readonly>
              </div>
            </div>
            <button class="btn btn-lg btn-success answer-button" disabled>Answer call</button>
            <button class="btn btn-lg btn-danger hangup-button" disabled onclick="hangUp()">Hang up</button>
          </div>
        </div>
      </div>

      <div class="col-md-7 order-md-1">
        {{-- @foreach ($tickets as $ticket)
          <div class="card border-default">
            <h5 class="card-header">
              Ticket #{{ $ticket->id }}
              <small class="float-right">{{ $ticket->created_at}}</small>
            </h5>

            <div class="card-body">
              <div class="row">
                <div class="col">
                  <p><strong>Name:</strong> {{ $ticket->name }}</p>
                  <p><strong>Phone number:</strong> {{ $ticket->phone_number }}</p>
                  <p><strong>Description:</strong></p>
                  {{ $ticket->description }}
                </div> --}}

                <div class="col col-auto">
                  <div class="form-group col-12">
                    <label for="phoneNumber">Phone number</label>
                    {{-- <input type="text" class="form-control" name="phone_number" id="phoneNumber" aria-describedby="phoneHelp" placeholder="Example, +18005551212" required> --}}
                    <small id="phoneHelp" class="form-text text-muted">Phone number should match <code>[+][country code][phone number including area code]</code></small>
                  </div>
                  <button onclick="callCustomer()" type="button" class="btn btn-primary btn-lg call-customer-button">
                    Call Number
                  </button>
                  <button type="button" class="btn btn-primary btn-lg" id="dialer">
                    Dialer
                  </button>
                </div>
              </div>
            </div>
          </div>
        {{-- @endforeach --}}
      </div>

    </div>

                    </div>
                </div><!-- end app-content-->

@endsection
@section('scripts')
<script type="text/javascript">
    function play_recording(id) {
        $('.play-'+id).hide();
        $('.stop-'+id).show();
        document.getElementById(id).play();
    }
     function stop_recording(id) {
        $('.stop-'+id).hide();
        $('.play-'+id).show();
        document.getElementById(id).pause();
        document.getElementById(id).currentTime=0;
    }
    
</script>
@stop
