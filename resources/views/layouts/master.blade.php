<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <!-- Meta data -->
        <meta charset="UTF-8">
        <title>{{ config('site.site_name') }}</title>
        <meta charset="utf-8">
        <meta content="IE=edge" http-equiv="x-ua-compatible">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">    <meta content="yes" name="apple-mobile-web-app-capable">
        <meta content="yes" name="apple-mobile-web-app-capable">
        <meta content="yes" name="apple-touch-fullscreen">
           <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta content="zendash - Admin Dashboard HTML Template" name="description">
        <meta content="Spruko Technologies Private Limited" name="author">
        <meta name="keywords" content="admin, bootstrap admin template, bootstrap dashboard, dashboard, panel, simple dashboard html template, dashboard template bootstrap 4, simple admin panel template, bootstrap 4 admin dashboard, html css dashboard template, themeforest admin template, premium bootstrap template, admin panel html template, admin template design, dark admin template, admin dashboard ui, css admin template, cool admin template, nice admin template"/>
        <!-- Scripts -->
        {{-- <script src=" /js/app.js" defer></script> --}}
         <script src="js/manifest.js"></script>
            <script src="js/vendor.js"></script>
    {{-- <script src="/js/browser-calls.js"></script> --}}
    <script src="js/browser-calls.js" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">

        <!--Favicon -->
        <link rel="icon" href="{{ asset('storage/' . config('site.favicon')) }}" type="image/x-icon"/>

        <!-- Bootstrap css -->
        <link href="/backend/assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" />

        <!-- Style css -->
        <link href="/backend/assets/css/style.css" rel="stylesheet" />

        <!-- Dark css -->
        <link href="/backend/assets/css/dark.css" rel="stylesheet" />

        <!-- Skins css -->
        {{-- <link href="/backend/assets/css/skins.css" rel="stylesheet" /> --}}
         @include('layouts.partials.skin.skin')

        <!-- Animate css -->
        <link href="/backend/assets/css/animated.css" rel="stylesheet" />

        <!--Sidemenu css -->
        <link href="/backend/assets/css/sidemenu.css" rel="stylesheet">

        <!-- P-scroll bar css-->
        <link href="/backend/assets/plugins/p-scrollbar/p-scrollbar.css" rel="stylesheet" />

        <!---Icons css-->
        <link href="/backend/assets/css/icons.css" rel="stylesheet" />

        <!-- INTERNAl Select2 css -->
        <link href="/backend/assets/plugins/select2/select2.min.css" rel="stylesheet" />

        <!-- INTERNAL Morris Charts css -->
        <link href="/backend/assets/plugins/morris/morris.css" rel="stylesheet" />

        <!-- INTERNAL Data table css -->
        <link href="/backend/assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
        <style type="text/css">

            
        @if (config('site.header_style_mode'))
            .app-header.header {
                background: {{ config('site.header_style_mode') }} !important;    
            }
        @endif
         @if (config('site.header_style_mode'))
            .app-header.header {
                background: {{ config('site.header_style_mode') }} !important;    
            }
        @endif

        @if (config('site.vertical_menu_mode'))
            .app-sidebar {
                background: {{ config('site.vertical_menu_mode') }} !important;    
            }
            .side-menu__item.active:before {
          border-right: 20px solid {{ config('site.vertical_menu_mode') }} !important;    
            }
            .side-menu__item.active:after {
              border-right: 20px solid {{ config('site.vertical_menu_mode') }} !important;    
            }
            .app-sidebar__logo {
                background: {{ config('site.vertical_menu_mode') }} !important;    
            }
        @endif

        @if (config('site.skin_mode') == "#2e3849")
        body{
                background: #11163a !important;    
                color: #edf0f5 !important;
            }
        .card{
          background-color: #1b2352 !important;    
            }    
        .app-header.header {
                background:  #1b2352 !important;    
            }
        .form-control{
                color: #edf0f5;
                opacity: 1;
                background-color: #1b2352;
                border: 1px solid rgba(255, 255, 255, 0.07);
            }   
          input#file-upload-button{
                color: #edf0f5;
                background: #1b2352 !important;
            }   
          .app-sidebar{
            box-shadow: none;
            }
          .side-menu__item.active{
            background: #11163a;
            color: #aaaec5;
            }
            .side-menu__item.active .shape1{
              background: #11163a;
            }
            .side-menu__item.active .shape2{
              background: #11163a;
            }
            .header .form-inline .form-control{
              background: #1b2352;
              border: 1px solid rgba(255, 255, 255, 0.07);
            }
            .form-label{
              color: rgba(255, 255, 255, 0.8);
            }
            .form-control[readonly]{
              background-color: #1b2352;
            }
            .profile-dropdown.show .dropdown-menu{
              box-shadow: 0px 6px 18px rgb(123 130 187 / 20%);
              color: #edf0f5;
              background-color: #181f48;
              border: 1px solid rgba(255, 255, 255, 0.07);
            }
            a {
                color: #edf0f5;
            }
            .dropdown-item {
                color: #8388a0;
            }
            .border-bottom {
                border-bottom: 1px solid rgba(255, 255, 255, 0.07) !important;
            }
            .dropdown-icon {
                color: #edf0f5;
            }
        @endif


        </style>
        <style>
 .floating-chat {
     cursor: pointer;
     display: flex;
     align-items: center;
     justify-content: center;
     color: white;
     position: fixed;
     bottom: 10px;
     right: 10px;
     width: 40px;
     height: 40px;
     transform: translateY(70px);
     transition: all 250ms ease-out;
     border-radius: 50%;
     opacity: 0;
     background: -moz-linear-gradient(-45deg, #183850 0, #183850 25%, #192c46 50%, #22254c 75%, #22254c 100%);
     background: -webkit-linear-gradient(-45deg, #183850 0, #183850 25%, #192c46 50%, #22254c 75%, #22254c 100%);
     background-repeat: no-repeat;
     background-attachment: fixed;
}
 .floating-chat.enter:hover {
     box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
     opacity: 1;
}
 .floating-chat.enter {
     transform: translateY(0);
     opacity: 0.6;
     box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.12), 0px 1px 2px rgba(0, 0, 0, 0.14);
}
 .floating-chat.expand {
     width: 295px;
     max-height: 550px;
     height: 550px;
     border-radius: 5px;
     cursor: auto;
     opacity: 1;
}
 .floating-chat :focus {
     outline: 0;
     box-shadow: 0 0 3pt 2pt rgba(14, 200, 121, 0.3);
}
 .floating-chat button {
     background: transparent;
     border: 0;
     color: white;
     text-transform: uppercase;
     border-radius: 3px;
     cursor: pointer;
}
 .floating-chat .chat {
     display: flex;
     flex-direction: column;
     position: absolute;
     opacity: 0;
     width: 1px;
     height: 1px;
     border-radius: 50%;
     transition: all 250ms ease-out;
     margin: auto;
     top: 0;
     left: 0;
     right: 0;
     bottom: 0;
}
 .floating-chat .chat.enter {
     opacity: 1;
     border-radius: 0;
     margin: 10px;
     width: auto;
     height: auto;
}
 .floating-chat .chat .header {
     flex-shrink: 0;
     padding-bottom: 10px;
     display: flex;
     background: transparent;
}

 .floating-chat .chat .header button {
     flex-shrink: 0;
}

 @keyframes show-chat-even {
     0% {
         margin-left: -480px;
    }
     100% {
         margin-left: 0;
    }
}
 @-moz-keyframes show-chat-even {
     0% {
         margin-left: -480px;
    }
     100% {
         margin-left: 0;
    }
}
 @-webkit-keyframes show-chat-even {
     0% {
         margin-left: -480px;
    }
     100% {
         margin-left: 0;
    }
}
 @keyframes show-chat-odd {
     0% {
         margin-right: -480px;
    }
     100% {
         margin-right: 0;
    }
}
 @-moz-keyframes show-chat-odd {
     0% {
         margin-right: -480px;
    }
     100% {
         margin-right: 0;
    }
}
 @-webkit-keyframes show-chat-odd {
     0% {
         margin-right: -480px;
    }
     100% {
         margin-right: 0;
    }
}
.fas{
    font-size:24px;
  }

  .pad .dial-pad .contact {
    width: 60%;
    position: relative;
    margin-left: 20%;
    margin-top: 40px;
    opacity: 0;
    -webkit-transition: opacity 0.5s ease;
    transition: opacity 0.5s ease;
  }
  
  .pad .dial-pad .contact.showContact {
    opacity: 1;
  }
  .pad .dial-pad .phoneString {
    width: 100%;
    /* height: 45px; */
    background-color: #2D2D2D;
    /* margin-top: 40px; */
  }
  
  .pad .dial-pad .phoneString input {
    background-color: transparent;
    width: 100%;
    /*margin-left: 20%;*/
    height: 80px;
    border: none;
    font-size: 30px;
    color: white;
    font-weight: 700;
    letter-spacing: 2px;
  }
  
  .pad .dial-pad .phoneString input:focus {
    outline: none;
  }
  
  .pad .dial-pad .digits {
    overflow: hidden;
    width: 80%;
    margin-left: 15%;
    margin-top: 10px;
  }
  
  .pad .dial-pad .digits .dig-spacer {
    width: 60px;
    margin: 10px calc(50% - 90px);
    float: left;
  }
  
  .pad .dial-pad .digits .dig {
    color: white;
    font-size: 20px;
    float: left;
    background-color: #2D2D2D;
    text-align: center;
    width: 50px;
    height: 50px;
    border-radius: 100%;
    margin: 10px 0px;
    padding-top: 4px;
    font-weight: 700;
    cursor: pointer;
    padding-top:15px;
  }
  
  .pad .dial-pad .digits .dig.clicked {
    -webkit-animation: pulse-gray linear 0.5s 1;
            animation: pulse-gray linear 0.5s 1;
  }
  
  .pad .dial-pad .digits .dig:nth-child(3n-1) {
    margin: 10px calc(50% - 90px);
  }
  
  .pad .dial-pad .digits .dig.astrisk {
    padding-top: 17px;
    height: 50px;
  }
  
  .pad .dial-pad .digits .dig.pound {
    padding-top: 15px;
    height: 50px;
  }
  
  .pad .dial-pad .digits .dig .sub-dig {
    font-size: 8px;
    font-weight: 300;
    position: relative;
    top: 0px;
  }
  
  .pad .dial-pad .digits .dig.addPerson, .pad .dial-pad .digits .dig.goBack {
    background-repeat: no-repeat;
    background-position: center center;
    background-size: 55% auto;
    margin-bottom: 25px;
    -webkit-box-shadow: 0px  25px 30px -15px black;
            box-shadow: 0px  25px 30px -15px black;
  }
  
  .pad .dial-pad .digits .dig.addPerson {
    background-color: #28fa5c9f;
  
  }
  .pad .dial-pad .digits .dig.addPerson2 {
    background-color: #f6fa099f;
  
  }
  .pad .dial-pad .digits .dig.addPerson.clicked {
    -webkit-animation: pulse-blue linear 0.5s 1;
            animation: pulse-blue linear 0.5s 1;
  }
  .pad .dial-pad .digits .dig.addPerson2.clicked {
    -webkit-animation: pulse-blue linear 0.5s 1;
            animation: pulse-blue linear 0.5s 1;
  }
  
  .pad .dial-pad .digits .dig.goBack {
    background-color: #FA4A5D;
  
  }
  
  .pad .dial-pad .digits .dig.goBack.clicked {
    -webkit-animation: pulse-red linear 0.5s 1;
            animation: pulse-red linear 0.5s 1;
  }
  
  
  .call.clicked {
    -webkit-animation: pulse-green linear 0.5s 1 forwards;
            animation: pulse-green linear 0.5s 1 forwards;
  }
  
  @-webkit-keyframes pulse-gray {
    0% {
      -webkit-box-shadow: inset 0 0 0px 30px #2D2D2D, inset 0 0 0px 30px white;
              box-shadow: inset 0 0 0px 30px #2D2D2D, inset 0 0 0px 30px white;
      -webkit-transform: scale(1, 1);
      transform: scale(1, 1);
    }
    10% {
      -webkit-transform: scale(0.8, 0.8);
      transform: scale(0.8, 0.8);
    }
    30% {
      -webkit-box-shadow: inset 0 0 0px 10px #2D2D2D, inset 0 0 0px 30px white;
              box-shadow: inset 0 0 0px 10px #2D2D2D, inset 0 0 0px 30px white;
    }
    60% {
      -webkit-box-shadow: inset 0 0 0px 0px #2D2D2D, inset 0 0 0px 0px white;
              box-shadow: inset 0 0 0px 0px #2D2D2D, inset 0 0 0px 0px white;
      -webkit-transform: scale(0.8, 0.8);
      transform: scale(0.8, 0.8);
    }
    100% {
      -webkit-transform: scale(1, 1);
      transform: scale(1, 1);
    }
  }
  
  @keyframes pulse-gray {
    0% {
      -webkit-box-shadow: inset 0 0 0px 30px #2D2D2D, inset 0 0 0px 30px white;
              box-shadow: inset 0 0 0px 30px #2D2D2D, inset 0 0 0px 30px white;
      -webkit-transform: scale(1, 1);
      transform: scale(1, 1);
    }
    10% {
      -webkit-transform: scale(0.8, 0.8);
      transform: scale(0.8, 0.8);
    }
    30% {
      -webkit-box-shadow: inset 0 0 0px 10px #2D2D2D, inset 0 0 0px 30px white;
              box-shadow: inset 0 0 0px 10px #2D2D2D, inset 0 0 0px 30px white;
    }
    60% {
      -webkit-box-shadow: inset 0 0 0px 0px #2D2D2D, inset 0 0 0px 0px white;
              box-shadow: inset 0 0 0px 0px #2D2D2D, inset 0 0 0px 0px white;
      -webkit-transform: scale(0.8, 0.8);
      transform: scale(0.8, 0.8);
    }
    100% {
      -webkit-transform: scale(1, 1);
      transform: scale(1, 1);
    }
  }
  
  @-webkit-keyframes pulse-blue {
    0% {
      -webkit-box-shadow: inset 0 0 0px 30px #28fa5c9f, inset 0 0 0px 30px white;
              box-shadow: inset 0 0 0px 30px #28fa5c9f, inset 0 0 0px 30px white;
      -webkit-transform: scale(1, 1);
      transform: scale(1, 1);
    }
    10% {
      -webkit-transform: scale(0.8, 0.8);
      transform: scale(0.8, 0.8);
    }
    30% {
      -webkit-box-shadow: inset 0 0 0px 10px #28fa5c9f, inset 0 0 0px 30px white;
              box-shadow: inset 0 0 0px 10px #28fa5c9f, inset 0 0 0px 30px white;
    }
    60% {
      -webkit-box-shadow: inset 0 0 0px 0px #28fa5c9f, inset 0 0 0px 0px white;
              box-shadow: inset 0 0 0px 0px #28fa5c9f, inset 0 0 0px 0px white;
      -webkit-transform: scale(0.8, 0.8);
      transform: scale(0.8, 0.8);
    }
    100% {
      -webkit-transform: scale(1, 1);
      transform: scale(1, 1);
    }
  }
  
  @keyframes pulse-blue {
    0% {
      -webkit-box-shadow: inset 0 0 0px 30px #28fa5c9f, inset 0 0 0px 30px white;
              box-shadow: inset 0 0 0px 30px #28fa5c9f, inset 0 0 0px 30px white;
      -webkit-transform: scale(1, 1);
      transform: scale(1, 1);
    }
    10% {
      -webkit-transform: scale(0.8, 0.8);
      transform: scale(0.8, 0.8);
    }
    30% {
      -webkit-box-shadow: inset 0 0 0px 10px #28fa5c9f, inset 0 0 0px 30px white;
              box-shadow: inset 0 0 0px 10px #28fa5c9f, inset 0 0 0px 30px white;
    }
    60% {
      -webkit-box-shadow: inset 0 0 0px 0px #28fa5c9f, inset 0 0 0px 0px white;
              box-shadow: inset 0 0 0px 0px #28fa5c9f, inset 0 0 0px 0px white;
      -webkit-transform: scale(0.8, 0.8);
      transform: scale(0.8, 0.8);
    }
    100% {
      -webkit-transform: scale(1, 1);
      transform: scale(1, 1);
    }
  }
  
  @-webkit-keyframes pulse-green {
    0% {
      -webkit-box-shadow: inset 0 0 0px 30px #f6fa099f, inset 0 0 0px 30px white;
              box-shadow: inset 0 0 0px 30px #f6fa099f, inset 0 0 0px 30px white;
      -webkit-transform: scale(1, 1);
      transform: scale(1, 1);
    }
    10% {
      -webkit-transform: scale(0.8, 0.8);
      transform: scale(0.8, 0.8);
    }
    30% {
      -webkit-box-shadow: inset 0 0 0px 10px #f6fa099f, inset 0 0 0px 30px white;
              box-shadow: inset 0 0 0px 10px #f6fa099f, inset 0 0 0px 30px white;
    }
    60% {
      -webkit-box-shadow: inset 0 0 0px 0px #f6fa099f, inset 0 0 0px 0px white;
              box-shadow: inset 0 0 0px 0px #f6fa099f, inset 0 0 0px 0px white;
      -webkit-transform: scale(0.8, 0.8);
      transform: scale(0.8, 0.8);
    }
    100% {
      -webkit-transform: scale(1, 1);
      transform: scale(1, 1);
    }
  }
  
  @keyframes pulse-green {
    0% {
      -webkit-box-shadow: inset 0 0 0px 30px #f6fa099f, inset 0 0 0px 30px white;
              box-shadow: inset 0 0 0px 30px #f6fa099f, inset 0 0 0px 30px white;
      -webkit-transform: scale(1, 1);
      transform: scale(1, 1);
    }
    10% {
      -webkit-transform: scale(0.8, 0.8);
      transform: scale(0.8, 0.8);
    }
    30% {
      -webkit-box-shadow: inset 0 0 0px 10px #f6fa099f, inset 0 0 0px 30px white;
              box-shadow: inset 0 0 0px 10px #f6fa099f, inset 0 0 0px 30px white;
    }
    60% {
      -webkit-box-shadow: inset 0 0 0px 0px #f6fa099f, inset 0 0 0px 0px white;
              box-shadow: inset 0 0 0px 0px #f6fa099f, inset 0 0 0px 0px white;
      -webkit-transform: scale(0.8, 0.8);
      transform: scale(0.8, 0.8);
    }
    100% {
      -webkit-transform: scale(1, 1);
      transform: scale(1, 1);
    }
  }
  
  @-webkit-keyframes pulse-red {
    0% {
      -webkit-box-shadow: inset 0 0 0px 30px #FA4A5D, inset 0 0 0px 30px white;
              box-shadow: inset 0 0 0px 30px #FA4A5D, inset 0 0 0px 30px white;
      -webkit-transform: scale(1, 1);
      transform: scale(1, 1);
    }
    10% {
      -webkit-transform: scale(0.8, 0.8);
      transform: scale(0.8, 0.8);
    }
    30% {
      -webkit-box-shadow: inset 0 0 0px 10px #FA4A5D, inset 0 0 0px 30px white;
              box-shadow: inset 0 0 0px 10px #FA4A5D, inset 0 0 0px 30px white;
    }
    60% {
      -webkit-box-shadow: inset 0 0 0px 0px #FA4A5D, inset 0 0 0px 0px white;
              box-shadow: inset 0 0 0px 0px #FA4A5D, inset 0 0 0px 0px white;
      -webkit-transform: scale(0.8, 0.8);
      transform: scale(0.8, 0.8);
    }
    100% {
      -webkit-transform: scale(1, 1);
      transform: scale(1, 1);
    }
  }
  
  @keyframes pulse-red {
    0% {
      -webkit-box-shadow: inset 0 0 0px 30px #FA4A5D, inset 0 0 0px 30px white;
              box-shadow: inset 0 0 0px 30px #FA4A5D, inset 0 0 0px 30px white;
      -webkit-transform: scale(1, 1);
      transform: scale(1, 1);
    }
    10% {
      -webkit-transform: scale(0.8, 0.8);
      transform: scale(0.8, 0.8);
    }
    30% {
      -webkit-box-shadow: inset 0 0 0px 10px #FA4A5D, inset 0 0 0px 30px white;
              box-shadow: inset 0 0 0px 10px #FA4A5D, inset 0 0 0px 30px white;
    }
    60% {
      -webkit-box-shadow: inset 0 0 0px 0px #FA4A5D, inset 0 0 0px 0px white;
              box-shadow: inset 0 0 0px 0px #FA4A5D, inset 0 0 0px 0px white;
      -webkit-transform: scale(0.8, 0.8);
      transform: scale(0.8, 0.8);
    }
    100% {
      -webkit-transform: scale(1, 1);
      transform: scale(1, 1);
    }
  }
  
  @-webkit-keyframes pulsator {
    0% {
      -webkit-transform: scale(1, 1);
      transform: scale(1, 1);
    }
    40% {
      -webkit-transform: scale(0.8, 0.8);
      transform: scale(0.8, 0.8);
    }
    100% {
      -webkit-transform: scale(1, 1);
      transform: scale(1, 1);
    }
  }
  
  @keyframes pulsator {
    0% {
      -webkit-transform: scale(1, 1);
      transform: scale(1, 1);
    }
    40% {
      -webkit-transform: scale(0.8, 0.8);
      transform: scale(0.8, 0.8);
    }
    100% {
      -webkit-transform: scale(1, 1);
      transform: scale(1, 1);
    }
  }
  
  @-webkit-keyframes showPad {
    0% {
      top: 50px;
      opacity: 0;
    }
    100% {
      top: 0px;
      opacity: 1;
    }
  }
  
  @keyframes showPad {
    0% {
      top: 50px;
      opacity: 0;
    }
    100% {
      top: 0px;
      opacity: 1;
    }
  }
  


</style>
     
            <script>
              !function(){var analytics=window.analytics=window.analytics||[];if(!analytics.initialize)if(analytics.invoked)window.console&&console.error&&console.error("Segment snippet included twice.");else{analytics.invoked=!0;analytics.methods=["trackSubmit","trackClick","trackLink","trackForm","pageview","identify","reset","group","track","ready","alias","debug","page","once","off","on","addSourceMiddleware","addIntegrationMiddleware","setAnonymousId","addDestinationMiddleware"];analytics.factory=function(e){return function(){var t=Array.prototype.slice.call(arguments);t.unshift(e);analytics.push(t);return analytics}};for(var e=0;e<analytics.methods.length;e++){var key=analytics.methods[e];analytics[key]=analytics.factory(key)}analytics.load=function(key,e){var t=document.createElement("script");t.type="text/javascript";t.async=!0;t.src="https://cdn.segment.com/analytics.js/v1/" + key + "/analytics.min.js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(t,n);analytics._loadOptions=e};analytics.SNIPPET_VERSION="4.13.1";
              analytics.load("a1KWKGrLCcgahxUcYqE16PSX25jFfcOW");
              analytics.page();
              }}();
            </script>

    </head>

    <body class="app sidebar-mini">
        <div  id="app">
         @include('layouts.partials.header')
        <!---Global-loader-->
        <div id="global-loader" >
            <img src="/backend/assets/images/svgs/loader.svg" alt="loader">
        </div>
        <!---/Global-loader-->

        <!-- Page -->
        <div class="page">
            <div class="page-main">
                @include('layouts.partials.sidebar.main')
                  @yield('content')
            </div>
        @include('layouts.partials.footer')
        </div>
        <!-- Back to top -->
        {{-- <a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a> --}}
</div>
  <div class="floating-chat">
        <i class="fa fa-phone" aria-hidden="true"></i>
    </div>
      
        @include('layouts.partials.scripts')
      <script type="text/javascript">
        $(document).ready(function(){
            var recognition = new webkitSpeechRecognition();
            $('.microphone').on('click', function(){
                navigator.mediaDevices.getUserMedia({ audio: true })
                  .then(function(stream) {
                    console.log('You let me use your mic!');
                    // $('.microphone').hide();
                    // $('.disable-microphone').show();
                  })
                  .catch(function(err) {
                    console.log('No mic for you!')
                  });
            });
            // $('.disable-microphone').on('click', function(){
            //     navigator.mediaDevices.getUserMedia({ audio: false })
            //       .then(function(stream) {
            //         console.log('You let me disable your mic!');
            //          $('.disable-microphone').hide();
            //         $('.microphone').show();
                   
            //       })
            //       .catch(function(err) {
            //         console.log('No mic for you!')
            //       });
            // });

        });
          var element = $('.floating-chat');
          // $('.floating-chat').on('click', function(){
          //   alert(4);
          // });

var myStorage = localStorage;

// if (!myStorage.getItem('chatID')) {
//     myStorage.setItem('chatID', createUUID());
// }

setTimeout(function() {
    element.addClass('enter');
}, 1000);

// element.click(openElement);

// function openElement() {
//     var messages = element.find('.messages');
//     var textInput = element.find('.text-box');
//     element.find('>i').hide();
//     element.addClass('expand');
//     element.find('.chat').addClass('enter');
//     var strLength = textInput.val().length * 2;
//     textInput.keydown(onMetaAndEnter).prop("disabled", false).focus();
//     element.off('click', openElement);
//     element.find('.header button').click(closeElement);
// }

// function closeElement() {
//     element.find('.chat').removeClass('enter').hide();
//     element.find('>i').show();
//     element.removeClass('expand');
//     element.find('.text-box').off('keydown', onMetaAndEnter).prop("disabled", true).blur();
//     setTimeout(function() {
//         element.find('.chat').removeClass('enter').show()
//         element.click(openElement);
//     }, 500);
// }

// function onMetaAndEnter(event) {
//     if ((event.metaKey || event.ctrlKey) && event.keyCode == 13) {
//         sendNewMessage();
//     }
// }
// $('.number-dig').click(function(){
//     //add animation
//     addAnimationToButton(this);
//     //add number
//     var currentValue = $('.phoneString input').val();
//     var valueToAppend = $(this).attr('name');
//     $('.phoneString input').val(currentValue + valueToAppend);
    
//     checkNumber();
//   });
//   var timeoutTimer = true;
//   var timeCounter = 0;
//   var timeCounterCounting = true;
//   $('.action-dig').click(function(){
//     //add animation
//     addAnimationToButton(this);
//     if($(this).hasClass('goBack')){
//       var currentValue = $('.phoneString input').val();
//       var newValue = currentValue.substring(0, currentValue.length - 1);
//       $('.phoneString input').val(newValue);
//       checkNumber();
//     }else if($(this).hasClass('call')){
//       if($('.call-pad').hasClass('in-call')){
//       }else{
//         setTimeout(function(){
//           setToInCall();
//           timeoutTimer = true;
//           looper();
//         },500);
//       }
//     }else{
      
//     }
//   });
  // var addAnimationToButton = function(thisButton){
  //   //add animation
  //   $(thisButton).removeClass('clicked');
  //   var _this = thisButton;
  //   setTimeout(function(){
  //     $(_this).addClass('clicked');
  //   },1);
  // };
      </script>
            <script>
// function openForm() {
//   document.getElementById("myForm").style.display = "block";
// }

// function closeForm() {
//   document.getElementById("myForm").style.display = "none";
// }
</script>
    </body>
</html>