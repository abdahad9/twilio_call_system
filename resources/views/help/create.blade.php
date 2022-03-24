@extends('layouts.master')


@section('content')
    <div class="app-content">
        <div class="side-app">
            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">Support</h4>
                </div>
                <div class="page-rightheader ml-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('help.index') }}">Support</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->
            <div class="row">
                <div class="col-12">
                    <div class="row flex-lg-nowrap">
                        <div class="col-12 mb-3">
                            <div class="e-panel card">
                                <div class="card-body">
                                    <form class="row" action="{{ route('help.store') }}" method="POST">
                                        @csrf
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input class="form-control" type="text" name="name" placeholder="Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" type="email" name="email" placeholder="Email" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Messager</label>
                                                <textarea class="form-control" name="message" placeholder="Message" required></textarea>
                                                {{-- <input class="form-control" type="number" name="total_number" placeholder="Total Number" required> --}}
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
                
        </div><!-- end app-content-->
@endsection
@section('scripts')
<style type="text/css">
    .modal {
        z-index: 1050 !important;
    }
    .modal-backdrop {
        z-index: 1049 !important;
    }
</style>
@stop
