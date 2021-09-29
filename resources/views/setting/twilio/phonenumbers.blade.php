@extends('layouts.master')


@section('content')

      
                <div class="app-content">
                    <div class="side-app">

                        <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title"># Phone Numbers</h4>
                            </div>
                            <div class="page-rightheader ml-auto d-lg-flex d-none">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Call</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Phone NUmbers</li>
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
                                                <div class="e-table">
                                                    <button type=""  data-target="#modaldemo2" data-toggle="modal" class="btn btn-primary" style="float: right"><i class="si si-plus" style="margin-right: 6px"></i>Add New Number</button>
                                                    <div class="table-responsive table-lg mt-3 pt-2">
                                                        <table class="table table-bordered border-top text-nowrap " id="example1">
                                                            <thead>
                                                                <tr>
                                                                     <tr>
                                                                    <th>Phone Number</th>
                                                                   <th>Friendly Name</th>
                                                                   <th>Edit</th>
                                                                </tr>
                                                                </tr>
                                                            </thead>
                                                             <tbody>
                                                                @foreach ($phoneNumbers as $phone)
                                                                     <tr>
                                                                      <td>
                                                                          {{ $phone->phoneNumber }}
                                                                      </td><td>
                                                                          {{ $phone->friendlyName }}
                                                                      </td>
                                                                      <td>
                                                                        <a onclick="getvalue({{ $phone->phoneNumber }},'{{ $phone->friendlyName }}')" class="btn" data-target="#modaldemo1" data-toggle="modal" href=""><i class="ion ion-edit"></i></a>
                                                                    </td>
                                                                 </tr>
                                                                @endforeach
                                                             
                                                            </tbody>
                                                        </table>
                                                  		<!-- BASIC MODAL -->
                                                        <div class="modal" id="modaldemo1">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content modal-content-demo">
                                                                    <div class="modal-header">
                                                                        <h6 class="modal-title">Edit</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Friendly Name</label>
                                                                            <input id="friendlyname" class="form-control mb-4" required="" value="" name="friendlyname" type="text">
                                                                            <input id="phonenumber" value="" name="phonenumber" type="hidden">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button id="update" class="btn btn-indigo" type="button">Update</button> <button class="btn btn-light" data-dismiss="modal" type="button">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- add new number --}}
                                                        <div class="modal" id="modaldemo2">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content modal-content-demo">
                                                                    <div class="modal-header">
                                                                        <h6 class="modal-title">Add New Local Number</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Choose number <span class="text-red">*</span></label>
                                                                            <select id="addnumber" name="addnumber" class="form-control custom-select select2" required>
                                                                          @foreach ( $local as $record )
                                                                            <option value="{{$record->friendlyName}}">{{$record->phoneNumber}}</option>
                                                                            @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button id="add" class="btn btn-indigo" type="button">Add</button> <button class="btn btn-light" data-dismiss="modal" type="button">Close</button>
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
                        </div>

                    </div>
                </div><!-- end app-content-->
@endsection
@section('scripts')
<script type="text/javascript">


function getvalue(phoneNumber,friendlyName){
    document.getElementById("friendlyname").value= friendlyName;
    document.getElementById("phonenumber").value= phoneNumber;
}

    $(document).ready(function(){
        $('#update').on('click', function(){

        var friendlyName = document.getElementById('friendlyname').value;
        var phonenumber = document.getElementById('phonenumber').value;
        console.log(friendlyName,phonenumber)
         $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                        $.ajax({
                         type:'post',
                         url: '{{ route('setting.updatefriendlyname') }}',
                         data: {friendlyName:friendlyName,phonenumber:phonenumber},
                          success: function(response)
                          {
                            window.location.reload(); 
                          },
                        error: function(jqXHR,error, errorThrown) {  
                            if(jqXHR.status&&jqXHR.status==400){
                             
                               console.log(jqXHR.responseText)
                            }else{
                                 console.log('Something went wrong needs to debug')
                              return false;
                            }
                        }
                  });
        });

        $('#add').on('click', function(){

        var number = $('#addnumber').find(":selected").text();
        var friendlyname = $('#addnumber').find(":selected").val();

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                        $.ajax({
                        type:'post',
                        url: '{{ route('setting.addnewnumber') }}',
                        data: {number:number,friendlyname:friendlyname},
                        success: function(response)
                        {
                            window.location.reload(); 
                        },
                        error: function(jqXHR,error, errorThrown) {  
                            if(jqXHR.status&&jqXHR.status==400){
                            
                            console.log(jqXHR.responseText)
                            }else{
                                console.log('Something went wrong needs to debug')
                            return false;
                            }
                        }
                });
        });
    });
    
</script>
@stop
