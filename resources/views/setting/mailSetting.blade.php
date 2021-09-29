@extends('layouts.master')


@section('content')
                <div class="app-content">
                    <div class="side-app">

                        <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title">Mail Settings</h4>
                            </div>
                            <div class="page-rightheader ml-auto d-lg-flex d-none">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">Mail Settings</li>
                                </ol>
                            </div>
                        </div>
                        <!--End Page header-->

                        <!-- Row-->
                        @include('app-partials.messages', ['errors' => $errors])
                       <form class="form" action="{{ route('setting.storeemail') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Smtp Settings</div>
                                    </div>

                                    <div class="card-body">
                                            <div class="row row-sm">

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Mail host</label>
                                                        <input class="form-control mb-4" required="" value= "{{ ( isset($mailSetting) ) ? $mailSetting->host : '' }}"name="config[host]" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                       <label class="form-label">Mail Port</label>
                                                        <input class="form-control mb-4" required="" value= "{{ ( isset($mailSetting) ) ? $mailSetting->port : '' }}"name="config[port]" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                       <label class="form-label">Mail username</label>
                                                        <input class="form-control mb-4" required="" value= "{{ ( isset($mailSetting) ) ? $mailSetting->username : '' }}"name="config[username]" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                       <label class="form-label">Mail password</label>
                                                        <input class="form-control mb-4" required="" value= "{{ ( isset($mailSetting) ) ? $mailSetting->password : '' }}"name="config[password]" type="password">
                                                    </div>
                                                </div>
                                            </div>
                                      
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
                                        <div class="card-title">Mail</div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row row-sm">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                               <label class="form-label">Mail From Address</label>
                                                <input class="form-control mb-4" required="" value= "{{ ( isset($mailSetting) ) ? $mailSetting->from['address'] : '' }}"name="config[from][address]" type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                               <label class="form-label">Mail From Name</label>
                                                <input class="form-control mb-4" required="" value= "{{ ( isset($mailSetting) ) ? $mailSetting->from['name'] : '' }}"name="config[from][name]" type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                               <label class="form-label">Mail To Address</label>
                                                <input class="form-control mb-4" required="" value= "{{ ( isset($mailSetting) ) ? $mailSetting->to : '' }}"name="config[to]" type="text">
                                            </div>
                                        </div>
                                        
                                       </div>
                                       <button type="submit" class="btn btn-primary mt-4 mb-0">Save</button>
                                    </div>
                                </div>
                               </div>           
                        </div>
                    </form>
                    </div>
                </div><!-- end app-content-->
@endsection
@section('scripts')
<script type="text/javascript">

    
</script>
@stop
