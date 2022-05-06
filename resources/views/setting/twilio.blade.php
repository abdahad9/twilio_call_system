@extends('layouts.master')


@section('content')
                <div class="app-content">
                    <div class="side-app">

                        <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title">Twilio Settings</h4>
                            </div>
                            <div class="page-rightheader ml-auto d-lg-flex d-none">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">Twilio Settings</li>
                                </ol>
                            </div>
                        </div>
                        <!--End Page header-->

                        <!-- Row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Twilio Settings</div>
                                    </div>

                                    <div class="card-body">
                                        @include('app-partials.messages', ['errors' => $errors])
                                       <form class="form" action="{{ route('setting.storetwilio') }}" method="post">
                                        @csrf
                                            <div class="row row-sm">

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label">sid</label>
                                                        <input class="form-control mb-4" required="" value= "{{ ( isset($twilioSetting) ) ? $twilioSetting->sid : '' }}"name="config[sid]" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                       <label class="form-label">Token</label>
                                                        <input class="form-control mb-4" required="" value= "{{ ( isset($twilioSetting) ) ? $twilioSetting->token : '' }}"name="config[token]" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                       <label class="form-label">From</label>
                                                        <input class="form-control mb-4" required="" value= "{{ ( isset($twilioSetting) ) ? $twilioSetting->from : '' }}"name="config[from]" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-4 mb-0">Save</button>
                                        </form>
                                    </div>
                                </div>
                                <!--/div-->
                            </div>
                        </div>
                        <!-- End Row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Twilio Settings</div>
                                    </div>

                                    <div class="card-body">
                                        <div class="col-lg-6">
                                                    <div class="form-group">
                                                       <label class="form-label">Create call</label>
                                                        <input class="form-control mb-4" readonly="" value= "{{ route('new-call') }}"name="config[from]" type="text">
                                                    </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                               <label class="form-label">Call block webhook</label>
                                                <input class="form-control mb-4" readonly="" value= "{{ route('incomming') }}"name="config[from]" type="text">
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
<script type="text/javascript">

    
</script>
@stop
