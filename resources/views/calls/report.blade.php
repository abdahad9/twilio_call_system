@extends('layouts.master')


@section('content')

      
                <div class="app-content">
                    <div class="side-app">

                        <!--Page header-->
                        <div class="page-header">
                            <div class="page-leftheader">
                                <h4 class="page-title">Recent calls</h4>
                            </div>
                            <div class="page-rightheader ml-auto d-lg-flex d-none">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Call</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Report</li>
                                </ol>
                            </div>
                        </div>
                        <a style="color: blue" href="{{ route('calls.choosenumber') }}"><i style="font-size: 17px;margin-right:10px" class="fa fa-angle-left"></i>Change Number</a>
                        <!--End Page header-->
                           <div class="card-body">
                                        {{-- <ul class="pagination">
                                            <li class="page-item page-prev {{ $calls->getPreviousPageUrl() ? '' : 'disabled' }}">
                                                <a class="page-link" href="{{ route('calls.pagination',['url'=> $calls->getPreviousPageUrl()]) }}" tabindex="-1">Prev</a>
                                            </li>
                                            <li>
                                                <a class="page-link {{ $calls->getNextPageUrl() ? '' : 'disabled' }}"  href="{{ route('calls.pagination',['url' => $calls->getNextPageUrl() ]) }}">Next</a>
                                            </li>
                                        </ul> --}}
                            </div>

                            <div class="row">
                            <div class="col-12">
                                <div class="row flex-lg-nowrap">
                                    <div class="col-12 mb-3">
                                        <div class="e-panel card">
                                            <div class="card-body">
                                                <div class="e-table">
                                                    <div class="table-responsive table-lg mt-3">
                                                        <table class="table table-bordered border-top text-nowrap" id="example1">
                                                            <thead>
                                                                <tr>
                                                                     <tr>
                                                                    <th>DATE TIME</th>
                                                                    <th>Call From</th>
                                                                    <th>Call To</th>
                                                                    <!-- <th>Answered by</th>
                                                 -->                 <th>CAll STATUS</th>
                                                                    <th colpan="2">CALL MINUTES <br>CALL SECONDS</th>
                                                                    <th>CALL <br>RECORDINGS</th>
                                                                    {{-- <th>BLOCK NUMBER</th> --}}
                                                                    {{-- <th>CALL NOTES</th> --}}
                                                                </tr>
                                                                </tr>
                                                            </thead>
                                                             <tbody>
                                                                @foreach ($calls as $call) 
                                                                <tr>

                                                                    <td>{{$call->time}}</td>
                                                                    <td>{{$call->call_from}}</td>
                                                                    <td>
                                                                        {{$call->call_to}}
                                                                    <td>{{$call->status}}</td>
                                                                     <td>
                                                                        <?php 
                                                                        $dtF = new \DateTime('@0');
                                                                        $dtT = new \DateTime("@$call->duration");
                                                                        echo $dtF->diff($dtT)->format('%i minutes <br> %s seconds');
                                                                        ?>  
                                                                    </td>
                                                                     <td>
                                                                         
                                                                                @if ($call->recording_sid)
                                                                              
                                                                                <button class="btn btn-primary play-<?=$call->id?><?=$call->recording_sid?>"  onclick="play_recording('{{$call->id}}{{$call->recording_sid}}')"><i class="fa fa-play"></i>
                                                                                </button>
                                                                                    <a target="_blank" class="btn btn-primary" href="https://api.twilio.com/2010-04-01/Accounts/<?=config('twilio.sid')?>/Recordings/<?=$call->recording_sid?>.mp3?Download=true">
                                                                                    <i class="fa fa-download"></i>
                                                                                </a>
                                                                                 <button style='display: none' class="btn btn-primary stop-<?=$call->id?><?=$call->recording_sid?>" onclick="stop_recording('<?=$call->id?><?=$call->recording_sid?>')"><i class="fa fa-pause"></i>
                                                                                </button>
                                                                                <audio id="<?=$call->id?><?=$call->recording_sid?>" controls hidden="false">
                                                                                <source src="https://api.twilio.com/2010-04-01/Accounts/<?=config('twilio.sid')?>/Recordings/<?=$call->recording_sid?>.mp3" type="audio/mpeg">
                                                                                </audio>
                                                                         
                                                                            @else { 
                                                                          
                                                                                <span>-</span>
                                                                            }
                                                                            @endif
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
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
                    <!-- BASIC MODAL -->
            {{-- ?page={{ urlencode($messages->getNextPageUrl()) }}

            ?page={{ urlencode($messages->getPreviousPageUrl()) }} --}}
        <div class="modal" id="add_notes">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Notes For Call</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <form id="notes" class="form">
                           <textarea class="form-control" name="note"></textarea>
                           <input type="hidden" name="call_sid">
                           <input type="hidden" name="phone_number">

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-indigo" type="submit">Save changes</button> <button class="btn btn-light" data-dismiss="modal" type="button">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal" id="view_notes">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Call Note</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                          <div class="notes"></div>

                    </div>
                    <div class="modal-footer">
                       <button class="btn btn-light" data-dismiss="modal" type="button">Close</button>
                    </div>
                   
                </div>
            </div>
        </div>

        {{-- @if ($calls->end > 1)
            <ul class="pagination">
                <li class="{{ ($calls->currentPage() == 1) ? ' disabled' : '' }}">
                    <a href="{{ $calls->url(1) }}">Previous</a>
                </li>
                @for ($i = 1; $i <= $calls->getEnd(); $i++)
                    <li class="{{ ($calls->currentPage() == $i) ? ' active' : '' }}">
                        <a href="{{ $calls->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="{{ ($calls->currentPage() == $calls->lastPage()) ? ' disabled' : '' }}">
                    <a href="{{ $calls->url($calls->currentPage()+1) }}" >Next</a>
                </li>
            </ul>
            @endif --}}

        {{-- {{ $calls->getPreviousPageUrl() }}
        {{ $calls->getNextPageUrl() }} --}}
@endsection
@section('scripts')
<script type="text/javascript">
    function play_recording(id) {
        $('.play-'+id).hide();
        $('.stop-'+id).show();
        document.getElementById(id).play();
    }
     function stop_recording(id) {
        $('.stop-'+id).hide();
        $('.play-'+id).show();
        document.getElementById(id).pause();
        document.getElementById(id).currentTime=0;
    }
    
</script>
@stop
