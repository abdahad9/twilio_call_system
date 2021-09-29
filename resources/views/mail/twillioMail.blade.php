<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>ItsolutionStuff.com</title>

            <style type="text/css">
            .container{
                width: 95%;
                margin: auto;
            }
            .card{
                font-size: 16px;
            }
            .header{
                color: green;
                margin-left: 15px;
            }
            .mail-logo{
                    height: 48px !important;
            }
            .mail-logo-border{
                    margin-top: 10px;
                    border-bottom: 8px solid darkblue;
            }
            .text-heading{
                font-weight: 700;
                color: black;
            }
            .flex{
                display: flex;
            }
            .space{
                margin-left: 25px;
            }
            .text{
                margin-left:5px;
            }
            .footer{
                background: darkblue;
                padding: 35px 20px;
                margin-top: 20px;
            }
            .footer-text{
                color: white;              
            }
            p{
                margin: 0px 1px 10px 0px;
            }
            .footer-logo{
                text-align: right;
                margin-right: 30px;
            }
            .margin-right{
                margin-right: 8px;
            }
            @media only screen and (max-width: 450px) {
            .flex-non {
                display: block !important;
            }
            .space {
                margin-left: 0px;
            }
            .center-text{
                margin-top: -5px;
            }
            .bottom{
                margin-bottom: 4px;
            }
            .top{
                margin-top: 10px;
            }
            .footer {
                padding: 10px 14px;   
            }
            .font{
                font-size: 12px;
            }
            }
            </style>
            
</head>

<body>
<div class="container">

    {{-- <img src="{{ asset('storage/1DashPro-Logo-Final.png') }}" class="header-brand-img desktop-lgo mail-logo" alt="Covido logo"> --}}
 	<!--Page header-->
    <div class="mail-logo-border"></div>

    <div class="card">
        {{-- <h4 class="header">Hi David Moceri,</h4> --}}
    <div class="card-body">
        <div class="flex flex-non">
            <div class="flex">
                <p class="text-heading">Phone call :</p>
                <p class="text">{{ $details['phonenumber'] }}</p>
            </div>
            <div class="flex">
                <p class="text-heading space">Duration :</p>
                <p class="text">
                @if ($details['CallDuration'])
                <?php 
                $duration = $details['CallDuration'];
                $dtF = new \DateTime('@0');
                $dtT = new \DateTime("@$duration");
                echo $dtF->diff($dtT)->format('%i minutes %s seconds');
                ?>      
                @endif
                </p>
            </div>
        </div>

            <div class="flex flex-non">
            <p class="text-heading">Call Date & time:</p>
            <p class="text center-text">
                <?php 
                $datetime = $details['datetime'];
                echo $datetime;
                // $tz = new DateTimeZone('America/Los_Angeles');  
                // $saleEndDate = new DateTime($datetime->format('Y/m/d H:i:s'));
                // $saleEndDate->setTimezone($tz);
                // $stamp = $saleEndDate->format('U');
                // $zone = $tz->getTransitions($stamp, $stamp);
                // if(!$zone[0]['isdst']) $saleEndDate->modify('+1 hour');
                // echo $saleEndDate->format('m/d/Y');
                // echo '<br>';
                // echo $saleEndDate->format('H:i:s');
                // ?>
            </p>
            </div>
            <?php 
            $count =0;
            $sid = config('twilio.sid');
                    $token = config('twilio.token');
                    $twilio = new \Twilio\Rest\Client($sid, $token);

                    $recordings = $twilio->recordings
                                                ->read(["callSid" => $details['sid']],
                                                        20
                                                );
                   foreach ($recordings as $record) {
                        $call_recording = $record->sid;
                    }

                           $count++;
            ?>

            <div class="flex flex-non">
                <p class="text-heading margin-right">Call recording:</p>
                {{-- <a style="color: red" href="" >Click to download the Call recording</a> --}}
            <?php if (isset($call_recording)){?>
                <a class="center-text" style="color: red" href="https://api.twilio.com/2010-04-01/Accounts/<?=config('twilio.sid')?>/Recordings/<?=$call_recording?>.mp3?Download=true" >Click to Download the Call recording</a>
            <?php }
            else { 
            ?>
                <p class="center-text">No call recording availible for this call</p>
            <?php  } ?>
            </div>

        </div>

    </div>    
</div>
        <!--End Page header-->
    {{-- <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}</p> --}}
   

</body>

</html>