<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Dialer</title>
 <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"  media="screen,projection"/>
       <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" integrity="sha512-77kidyGDJGWWmJ0MVO0CRp+6nRgZRK67frUVBRvnL1zCcmcw9FkCQxpDHq52SebW+KWTAnnuX0Qk2/MQWogWoQ==" crossorigin="anonymous" />
     <link href="http://cdn.shopify.com/s/files/1/3079/6066/t/5/assets/slick.scss?v=2372082273895222280" rel="stylesheet" type="text/css" media="all" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" />
      <!-- Scripts -->
        {{-- <script src="  https://ea9c9a81f25c.ngrok.io/js/app.js" defer></script> --}}
         <script src="/js/manifest.js"></script>
            <script src="/js/vendor.js"></script>
    {{-- <script src="/js/browser-calls.js"></script> --}}
    <script src="/js/browser-calls.js" defer></script>
     <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('dialer/style.css') }}">


  </head>
<body>

    <div class="floating-chat expand ">

        <div class="chat enter" >
          <div class="header">
                <button>
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
          <div class="panel panel-default">
      <div class="panel-body">
        <div class="tab-content">

              <!-- tabs start -->
              <div class="tab-pane" id="pad">
                <h3>Queue</h3>
               </div>
            <div class="tab-pane" id="log">
            <h2 > Log</h2>
          </div>
          <div class="tab-pane" id="voice_mail">
           <h3>Voicemail</h3>
          </div>
          <div class="pad tab-pane active" id="call">
            <div class="dial-pad">
              <!-- input string -->
              <div class="row mx-4" >
                <div class="col-md-9 ml-2 col-sm-6">
                  <div class="phoneString">
                    <input type="text" name="phone_number" value="+" id="phoneNumber" />
                  </div>
                </div>
                <div class="col-md-2 col-sm-1">
                  <div class="backspace">
                    <button class="hover-dot backspace-icon dig goBack action-dig"   title="Cancel"><i class="fa fa-times"></i></button>
                  </div>
                </div>
              </div>
              <!-- key pad -->
              <div class="digits tab-pane active" id="aa">
                <div class="dig pound number-dig" name="1">1</div>
                <div class="dig number-dig" name="2">2
                  <div class="sub-dig">ABC</div>
                </div>
                <div class="dig number-dig" name="3">3
                  <div class="sub-dig">DEF</div>
                </div>
                <div class="dig number-dig" name="4">4
                  <div class="sub-dig">GHI</div>
                </div>
                <div class="dig number-dig" name="5">5
                  <div class="sub-dig">JKL</div>
                </div>
                <div class="dig number-dig" name="6">6
                  <div class="sub-dig">MNO</div>
                </div>
                <div class="dig number-dig" name="7">7
                  <div class="sub-dig">PQRS</div>
                </div>
                <div class="dig number-dig" name="8">8
                  <div class="sub-dig">TUV</div>
                </div>
                <div class="dig number-dig" name="9">9
                  <div class="sub-dig">WXYZ</div>
                </div>
                <div class="dig number-dig astrisk" name="*">*</div>
                <div class="dig number-dig pound" name="0">0</div>
                <div class="dig number-dig pound" name="#">#</div>
              </div>
              <!-- call buttons -->
              <div class=" text-box d-flex justify-content-around">
                <button class="dig1 addPerson2 action-dig microphone"  title="Hang out"><i class="fas fa-phone-slash"></i></button>
               <button class="dig1 addPerson action-dig" onclick="callCustomer()" title="Call"><i class="fa fa-phone" aria-hidden="true"></i></button>
                <button class="dig1 addPerson3 action-dig reset " onclick="hangUp()" title="Cancel"><i class="fa fa-ban" aria-hidden="true"></i></button>
              </div>

            </div>
          </div>
           <div class="tab-pane" id="agents">
           <h3>Agents</h3>
          </div>
           <div class="tab-pane" id="contacts">
           <h3>Contacts</h3>
          </div>
        </div>
      </div>
 </div>
 <div   style="  box-shadow: 0 -5px 5px -5px #333!important;">
  <footer>
    <ul  class="nav nav-tabs nav-tabs-bottom d-flex justify-content-between border-bottom-0 mx-3 mb-2 fixed-bottom ">
        <li><a href="#pad" data-toggle="tab"> <div class="d-flex flex-column align-items-center"><i class="fa fa-bars mb-3" aria-hidden="true"></i><span>Queue</span></div></a></li>
         <li><a href="#log" data-toggle="tab"><div class="d-flex flex-column align-items-center"><i class="fa fa-clock mb-3" aria-hidden="true"></i><span>Log</span></div></a></li>
        <li><a href="#voice_mail" data-toggle="tab"><div class="d-flex flex-column align-items-center"><i class="fa fa-comments mb-3" aria-hidden="true"></i><span>Voice Mail</span></div></a></li>
        <li><a href="#call" data-toggle="tab"><div class="d-flex flex-column align-items-center"><i class="fa fa-phone mb-3" aria-hidden="true"></i><span>Call</span></div></a></li>
        <li><a href="#agents" data-toggle="tab"><div class="d-flex flex-column align-items-center"><i class="fa fa-user mb-3" aria-hidden="true"></i><span>Agents</span></div></a></li>
        <li><a href="#contacts" data-toggle="tab"> <div class="d-flex flex-column align-items-center"><i class="fa fa-bars mb-3" aria-hidden="true"></i><span>Contacts</span></div></a></li>
        <li><a href="#"><i class="fa fa-circle mt-2" aria-hidden="true"></i></a></li>

      </ul>
</footer>
 </div>


    </div>
    </div>


      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js" integrity="sha512-sR3EKGp4SG8zs7B0MEUxDeq8rw9wsuGVYNfbbO/GLCJ59LBE4baEfQBVsP2Y/h2n8M19YV1mujFANO1yA3ko7Q==" crossorigin="anonymous"></script>
      <script src="{{ asset('dialer/main.js') }}"></script>





</body>
</html>
