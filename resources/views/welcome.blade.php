<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('site.site_name') }}</title>

            <!-- Bootstrap css -->
            <link href="/backend/assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" />

            <!-- Style css -->
            <link href="/backend/assets/css/style.css" rel="stylesheet" />
    
            <!-- Dark css -->
            <link href="/backend/assets/css/dark.css" rel="stylesheet" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .email{
                color: black;
                text-align: start;
                padding: 0px;
            }
            ul li:before {
            content: '✓';
            margin-right: 6px;
            color: #FF9800;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref">
            {{-- @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}

            <div class="content">
               <div style="display: flex; padding: 60px 10px 0px 10px;" class="form-group">

                   <div style="width: 32%; margin-left:80px;">
                       <ul style="text-align: start;
                       font-weight: bold;
                       font-size: 20px;
                       color: black;">
                           <li style="margin-bottom: 5px;">Get the meeting notes</li>
                           <li style="margin-bottom: 5px;">The voice recording</li>
                           <li style="margin-bottom: 5px;">Transcript of the meeting</li>
                           <li style="margin-bottom: 5px;">full list of contacts</li>
                           <li style="margin-bottom: 5px;">All email to you at the end of the call Automatically</li>
                           <li style="margin-bottom: 5px;">Get started free today</li>
                       </ul>
                       <div class="col-md-12 email" style="margin-top: -48px;">
                           <div style="position: relative; overflow: hidden;"><iframe src="https://ripplemydata.com/form/notetakerpro" class="autoHeight" style="border: medium none; height: 448px;" scrolling="yes" width="100%" height="700"></iframe></div>
                        </div>
                   </div>
                    <div style="width: 68%">
                        <div class="d-flex flex-column bd-highlight mb-3">
                          <div class="bd-highlight">
                            <a href="{{ route('plan.signup') }}" class="btn btn-primary btn-lg">Signup</button></a>
                          <div class="bd-highlight">
                              <img style="width: 90%; height:580px; margin-top:24px;" src="/backend/assets/notetakergif.gif" alt="No GIF">
                          </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </body>
</html>
