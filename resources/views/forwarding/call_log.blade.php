@extends('layouts.master')


@section('content')
    <div class="app-content">
        <div class="side-app">
            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">Call Logs</h4>
                </div>
                <div class="page-rightheader ml-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        {{-- <li class="breadcrumb-item"><a href="{{ route('forwarding.index') }}">Call Forwarding</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Call Logs</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->
            
            <div class="row">
                <div class="col-12">
                    <div class="row flex-lg-nowrap">
                        <div class="col-12 mb-3">
                            <div class="e-panel card">
                                
                                <div class="card-body pb-0">
                                    
                                    <div class="row">
                                        <div class="col-md-12">
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
                                                <button class="btn btn-outline-danger">Cancel</button>
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
