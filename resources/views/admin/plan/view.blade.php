@extends('layouts.master')


@section('content')
    <div class="app-content">
        <div class="side-app">
            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">Plan View</h4>
                </div>
                <div class="page-rightheader ml-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('plan.') }}">Plans</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View</li>
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
                                    <form class="row" action="{{ route('plan.store') }}" method="POST">
                                        @csrf
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input class="form-control" type="text" name="title" placeholder="Title" value="{{$plan->title}}" readonly required>
                                            </div>
                                            <div class="form-group">
                                                <label>Price per month</label>
                                                <input class="form-control" type="number" name="amount" placeholder="Price" readonly required value="{{$plan->amount}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description" placeholder="Description" readonly required>{{$plan->description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Total Number</label>
                                                <input class="form-control" type="number" name="total_number" readonly placeholder="Total Number" required value="{{$plan->total_number}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Total Minute</label>
                                                <input class="form-control" type="number" name="calling_minute" readonly placeholder="Total Calling Minute" required value="{{$plan->calling_minute}}">
                                            </div>
                                        </div>
                                        {{-- <button type="submit" class="btn btn-primary">Create</button> --}}
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

@stop
