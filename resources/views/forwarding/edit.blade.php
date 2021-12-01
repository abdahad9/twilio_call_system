@extends('layouts.master')


@section('content')

        
                <div class="app-content">
                    <div class="side-app">
                        <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title">Edit</h4>
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
                                                <h2>{{$twilio_number->friendlyName}} ({{$twilio_number->phoneNumber}})</h2>
                                            </div>
                                            <div class="card-body pb-0">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <h4>Number Options</h4>
                                                    </div>
                                                    <div>
                                                        <button class="btn btn-outline-danger">Disable Number</button>
                                                    </div>
                                                </div>
                                                <div class="row border-top mt-2" style="margin-right:-25px">
                                                    <div class="col-md-6">
                                                        <form method="POST" action="{{ route('forwarding.edit', $twilio_number->id) }}" enctype='multipart/form-data'>
                                                            @csrf
                                                            <div class="form-group mt-2">
                                                                <label>Number Name</label>
                                                                <input type="text" name="friendlyName" value="{{$twilio_number->friendlyName}}" class="form-control" required>
                                                            </div>
                                                            <div class="form-group mt-2">
                                                                <label>Whisper Message</label>
                                                                <input type="text" name="whisper_message" value="{{$twilio_number->whisper_message}}" class="form-control" required>
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
                                                                      <label class="text-muted" style="font-size: 10px;">Enter the number that you want your calls forward to</label>
                                                                  </div>
                                                                </div>
                                                                <input type="text" name="forward_to" value="{{$twilio_number->forward_to}}" class="form-control" required>
                                                            </div>
                                                            
                                                            <div class="form-group mt-2">
                                                                <label>Upload Voice mail message</label>
                                                                <input type="file" name="voicemail" class="form-control" accept=".mp3">
                                                                @if($twilio_number->voicemail)
                                                                <audio controls class="mt-2">
                                                                  <source src="{{ url($twilio_number->voicemail) }}" type="audio/mpeg">
                                                                  Your browser does not support the audio tag.
                                                                </audio>
                                                                @endif
                                                            </div>
                                                            <div class="form-group mt-2">
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
                                                                     <button class="btn btn-primary">Save</button>
                                                                </div>
                                                                
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="col-md-6 bg-light">
                                                        <div class="d-flex align-items-start flex-column bd-highlight pt-2">
                                                          <div class="pb-2 bd-highlight">
                                                                <h6>This numebr</h6>
                                                                <p class="pl-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                          </div>
                                                          <div class="pb-2 bd-highlight">
                                                                <h6>Call Destination</h6>
                                                                <p class="pl-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                            </div>

                                                            <div class="pb-2 bd-highlight">
                                                                    <h6>Whisper Message</h6>
                                                                    <p class="pl-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                            </div>
                                                            <div class="pb-2 bd-highlight">
                                                                    <h6>Call Recording</h6>
                                                                    <p class="pl-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                            </div>
                                                            <div class="pb-2 bd-highlight">
                                                                    <h6>Call Greeting</h6>
                                                                    <p class="pl-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                            </div>

                                                            <div class="pb-2 bd-highlight">
                                                                    <h6>Campaign Name</h6>
                                                                    <p class="pl-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
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
    $(document).on('change','#recording_status', function(){
        if (this.checked) {
            $('#forward_body').show();
            //alert('checked');
        }else{
            $('#forward_body').hide();
        }
    });

    $(function(){
        if($('#recording_status').is(':checked')){
            $('#forward_body').show();
        }else{
            $('#forward_body').hide();
        }
    })
</script>
@stop
