@extends('layouts.master')


@section('content')

        
                <div class="app-content">
                    <div class="side-app">
                        <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <a class="btn btn-primary" href="{{ route('forwarding.index') }}">Back</a>
                            </div>
                            <div class="page-rightheader ml-auto d-lg-flex d-none">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('forwarding.index') }}">Call Forwarding</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                                </ol>
                            </div>
                        </div>
                        <!--End Page header-->
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="row flex-lg-nowrap">
                                    <div class="col-12 mb-3">
                                        <div class="e-panel card">
                                            <div class="card-header bg-light border-bottom">
                                                <div class="d-flex" style="width:100%">
                                                    <div>
                                                        <h2>{{$twilio_number->friendlyName}} ({{$twilio_number->phoneNumber}})</h2>
                                                    </div>
                                                    <div>
                                                        
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="card-body pb-0">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <h4>Number Options</h4>
                                                    </div>
                                                    <div>
                                                        <form method="POST" action="{{ route('forwarding.number-status') }}">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$twilio_number->id}}">

                                                            <input type="hidden" name="number_status" @if($twilio_number->number_status === 'true') value="false" @else value="true" @endif>

                                                            <button type="submit" class="btn @if($twilio_number->number_status === 'true') btn-outline-danger @else btn-outline-success @endif">
                                                                @if($twilio_number->number_status === 'true') 
                                                                    Disable Number 
                                                                @else 
                                                                    Enable Number
                                                                @endif
                                                            </button>
                                                        </form>
                                                        
                                                    </div>
                                                </div>
                                                <div class="row border-top mt-2" style="margin-right:-25px">
                                                    <div class="col-md-6">
                                                        <form method="POST" action="{{ route('forwarding.edit', $twilio_number->id) }}" enctype='multipart/form-data'onSubmit="checkFunction()">
                                                            @csrf
                                                            <div class="form-group mt-2">
                                                                <label>Number Name</label>
                                                                <input type="text" name="friendlyName" value="{{$twilio_number->friendlyName}}" class="form-control" required>
                                                            </div>
                                                            <div class="form-group mt-2">
                                                                <label>Whisper Message</label>
                                                                <input type="text" name="whisper_message" @if($twilio_number->whisper_message && $twilio_number->whisper_message != '') value="{{$twilio_number->whisper_message}}" @else value="This call is from note taker pro" @endif class="form-control" required>
                                                            </div>
                                                            <div class="form-group mt-2">
                                                                <div class="form-check">
                                                                  <input class="form-check-input" name="recording_status" type="checkbox" id="recording_status" @if($twilio_number->recording_status == 'true') checked @endif>
                                                                  <label class="form-check-label" for="recording_status">
                                                                    Enable call recording
                                                                  </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mt-2" id="forward_body">
                                                                <div class="d-flex align-items-start flex-column bd-highlight">
                                                                  <div class="bd-highlight">
                                                                      <label>Forward Call To</label>
                                                                  </div>
                                                                  <div class="bd-highlight">
                                                                      <label class="text-muted" style="font-size: 10px;">Enter the number that you want your calls forwarded</label>
                                                                  </div>
                                                                </div>
                                                                <input type="text" name="forward_to" value="{{$twilio_number->forward_to}}" class="form-control" pattern="[0-9]{10}">
                                                            </div>
                                                            
                                                            <div class="form-group mt-2">
                                                                <label>Upload voice mail message</label>
                                                                <div class="form-control pb-4">
                                                                    <input class="mb-2" type="file" name="voicemail"  accept=".mp3">
                                                                </div>
                                                                @if($twilio_number->voicemail)
                                                                <div class="d-flex flex-row bd-highlight align-items-center">
                                                                  <div class="p-1 bd-highlight">
                                                                      <audio controls class="mt-2">
                                                                          <source src="{{ url($twilio_number->voicemail) }}" type="audio/mpeg">
                                                                          Your browser does not support the audio tag.
                                                                        </audio>
                                                                  </div>
                                                                  <div class="p-1 bd-highlight">
                                                                      <a href="{{ url('forwarding/voicemail/remove') }}/{{$twilio_number->id}}" class="btn btn-danger">Remove</a>
                                                                  </div>
                                                                </div>
                                                                    
                                                                @endif
                                                            </div>
                                                            <div class="form-group mt-2" style="display:none">
                                                                <label>Send to vm after X number ring</label>
                                                                <select name="number_of_ring" class="form-control">
                                                                    <option @if($twilio_number->number_of_ring == '1') selected @endif value="1">1 Ring</option>
                                                                    <option @if($twilio_number->number_of_ring == '2') selected @endif value="2">2 Ring</option>
                                                                    <option @if($twilio_number->number_of_ring == '3') selected @endif value="3">3 Ring</option>
                                                                    <option @if($twilio_number->number_of_ring == '4') selected @endif value="4">4 Ring</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group mt-2">
                                                                <div class="d-flex justify-content-between" style="width: 100%;">
                                                                    <a href="{{ route('forwarding.index') }}" class="btn btn-outline-danger">Cancel</a>
                                                                     <button class="btn btn-primary" id="saveButton">Save</button>
                                                                </div>
                                                                
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="col-md-6 bg-light">
                                                        <div class="d-flex align-items-start flex-column bd-highlight pt-2">
                                                          <div class="pb-2 bd-highlight">
                                                                <h6>Number Nickname</h6>
                                                                <p class="pl-3">This is the name assigned to this specific number. Choose whatever you want, but something brief and easy to remember is best. Most of the time this will be a campaign name or a website or a company name.</p>
                                                          </div>
                                                          <div class="pb-2 bd-highlight">
                                                                <h6>Call Destination</h6>
                                                                <p class="pl-3">This is the number where your calls will be forwarded. You can use your main business line, your personal line, or any other existing phone number you own.
                                                                    <br>
                                                                You can also create a custom call flow to route calls within your organization.
                                                                </p>
                                                            </div>

                                                            <div class="pb-2 bd-highlight">
                                                                    <h6>Whisper Message</h6>
                                                                    <p class="pl-3">A "Whisper Message" is a short recording that plays to the recipient before a forwarded call is connected. It's a good way for the recipient to know where the call is coming from. The caller cannot hear this message.</p>
                                                            </div>
                                                            <div class="pb-2 bd-highlight">
                                                                    <h6>Call Recording</h6>
                                                                    <p class="pl-3">You can record incoming phone calls and replay them from your dashboard.</p>
                                                            </div>
                                                            <div class="pb-2 bd-highlight">
                                                                    <h6>Voice Mail</h6>
                                                                    <p class="pl-3">Choose how many rings before your callers goes to your voicemail. Be sure to test this as different companies have differing amounts of rings before sending calls to voicemail. </p>
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
<script type="text/javascript">
    function checkFunction(){
        console.log('test');
        document.getElementById("global-loader").style.display = "block";
        return true;
    }
</script>
@stop
