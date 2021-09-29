@extends('layouts.master')


@section('content')

      
                <div class="app-content">
                    <div class="side-app">

                        <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title">Choose number</h4>
                            </div>
                            <div class="page-rightheader ml-auto d-lg-flex d-none">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Call</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">choose number</li>
                                </ol>
                            </div>
                        </div>
                        <!--End Page header-->


    <div class="row">

      <div class="col-md-5 order-md-2 mb-4" style="margin: auto; margin-top:50px">
        <div class="card">
          <h5 class="card-header">
            please select number for which you which to see call logs
          </h5>
          <form method = "GET" action="/calls/tracking/report" id="preferencesForm" class="form-group">
          <div class="card-body">
            <div class="form-group row">
              <div class="col-12">
                <select id="phonenumber" name="phonenumber" class="form-control custom-select select2" required>
                    @foreach ( $phoneNumbers as $phoneNumber )
                      <option value="{{$phoneNumber->phoneNumber}}">{{$phoneNumber->phoneNumber}}</option>
                      @endforeach
                    </select>
              </div>
              <div class="modal-footer">
                <button id="add" class="btn btn-indigo" type="submit">Next</button>
            </div>
            </div>
          </div>
          </form>
        </div>
      </div>


    </div>

                    </div>
                </div><!-- end app-content-->

@endsection
@section('scripts')

@stop
