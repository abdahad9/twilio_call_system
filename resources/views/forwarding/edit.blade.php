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
                                                <h2>+1510xxxxxxxxxxxxx</h2>
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
                                                        <div class="form-group mt-2">
                                                            <label>Number Name</label>
                                                            <input type="text" name="name" class="form-control">
                                                        </div>
                                                        <div class="form-group mt-2">
                                                            <label>Whisper Message</label>
                                                            <input type="text" name="message" class="form-control">
                                                        </div>
                                                        <div class="form-group mt-2">
                                                            <div class="d-flex align-items-start flex-column bd-highlight">
                                                              <div class="bd-highlight">
                                                                  <label>Forward Call To</label>
                                                              </div>
                                                              <div class="bd-highlight">
                                                                  <label class="text-muted" style="font-size: 10px;">Enter the number that you want your calls forward to</label>
                                                              </div>
                                                            </div>
                                                            <input type="text" name="forward_call_to" class="form-control">
                                                        </div>
                                                        <div class="form-group mt-2">
                                                            <div class="form-check">
                                                              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                              <label class="form-check-label" for="defaultCheck1">
                                                                Enable call recording
                                                              </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mt-2">
                                                            <label>Upload Voice mail message</label>
                                                            <input type="file" name="name" class="form-control">
                                                        </div>
                                                        <div class="form-group mt-2">
                                                            <label>Send to vm after X number ring</label>
                                                            <select name="name" class="form-control">
                                                                <option>1 Ring</option>
                                                                <option>2 Ring</option>
                                                                <option>3 Ring</option>
                                                                <option>4 Ring</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group mt-2">
                                                            <button class="btn btn-primary">Save</button>
                                                            <a href="{{ route('forwarding.index') }}" class="btn btn-outline-danger">Cancel</a>
                                                        </div>
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
    
</script>
@stop
