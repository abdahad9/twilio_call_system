<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>401</title>

    <link href="{{ asset('theme-assets/plugins/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=PT+Sans+Caption:400,700|Roboto:500|Crete+Round:400i');

        body {
            background: #2a323c;
            font-family: 'PT Sans Caption', sans-serif;
            margin: 0;
            color: #9fa2a7;
        }
        html {
            overflow-x: hidden;
            position: relative;
            min-height: 100%;
            background: #2a323c;
        }
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #ffffff;
            font-weight: bold;
            margin: 10px 0;
        }
        .h1 .small,
        .h1 small,
        .h2 .small,
        .h2 small,
        .h3 .small,
        .h3 small,
        .h4 .small,
        .h4 small,
        .h5 .small,
        .h5 small,
        .h6 .small,
        .h6 small,
        h1 .small,
        h1 small,
        h2 .small,
        h2 small,
        h3 .small,
        h3 small,
        h4 .small,
        h4 small,
        h5 .small,
        h5 small,
        h6 .small,
        h6 small {
            color: #9fa2a7;
        }
        h1 {
            line-height: 43px;
        }
        h2 {
            line-height: 35px;
        }
        h3 {
            line-height: 30px;
        }
        h3 small {
            color: #444444;
        }
        h4 {
            line-height: 22px;
        }
        h4 small {
            color: #444444;
        }
        h5 small {
            color: #444444;
        }
        * {
            outline: none !important;
        }
        a:hover {
            outline: 0;
            text-decoration: none;
        }
        a:active {
            outline: 0;
            text-decoration: none;
        }
        a:focus {
            outline: 0;
            text-decoration: none;
        }
        .container {
            width: auto;
        }
        .container-alt {
            margin-left: auto;
            margin-right: auto;
            padding-left: 15px;
            padding-right: 15px;
        }
        .footer {
            background-color: #323c48;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            bottom: 0px;
            color: #9fa2a7;
            text-align: center !important;
            padding: 20px 30px;
            position: absolute;
            right: 0;
            left: 240px;
        }
        #wrapper {
            height: 100%;
            overflow: hidden;
            width: 100%;
        }
        .page {
            bottom: 0;
            left: 0;
            right: 0;
            top: 0;
        }
        .social-links li a {
            -webkit-border-radius: 50%;
            background: #04a2b3;
            border-radius: 50%;
            color: #ffffff;
            display: inline-block;
            height: 30px;
            line-height: 30px;
            text-align: center;
            width: 30px;
        }
        /* ==============
  Bootstrap-custom
===================*/
        .row {
            margin-right: -10px;
            margin-left: -10px;
        }
        .col-lg-1,
        .col-lg-10,
        .col-lg-11,
        .col-lg-12,
        .col-lg-2,
        .col-lg-3,
        .col-lg-4,
        .col-lg-5,
        .col-lg-6,
        .col-lg-7,
        .col-lg-8,
        .col-lg-9,
        .col-md-1,
        .col-md-10,
        .col-md-11,
        .col-md-12,
        .col-md-2,
        .col-md-3,
        .col-md-4,
        .col-md-5,
        .col-md-6,
        .col-md-7,
        .col-md-8,
        .col-md-9,
        .col-sm-1,
        .col-sm-10,
        .col-sm-11,
        .col-sm-12,
        .col-sm-2,
        .col-sm-3,
        .col-sm-4,
        .col-sm-5,
        .col-sm-6,
        .col-sm-7,
        .col-sm-8,
        .col-sm-9,
        .col-xs-1,
        .col-xs-10,
        .col-xs-11,
        .col-xs-12,
        .col-xs-2,
        .col-xs-3,
        .col-xs-4,
        .col-xs-5,
        .col-xs-6,
        .col-xs-7,
        .col-xs-8,
        .col-xs-9 {
            padding-left: 10px;
            padding-right: 10px;
        }
        .breadcrumb {
            background-color: transparent;
            margin-bottom: 15px;
            margin-top: 5px;
        }
        hr {
            border-top: 1px solid rgba(255, 255, 255, 0.7);
        }
        .dropdown-menu {
            padding: 4px 0;
            border: 0;
        }
        .dropdown-menu > li > a {
            padding: 6px 20px;
        }
        .bg-primary {
            background-color: #04a2b3 !important;
        }
        .bg-success {
            background-color: #66d203 !important;
        }
        .bg-info {
            background-color: #00a4fe !important;
        }
        .bg-warning {
            background-color: #ffb600 !important;
        }
        .bg-danger {
            background-color: #e66060 !important;
        }
        .bg-muted {
            background-color: #d0d0d0 !important;
        }
        .bg-inverse {
            background-color: #212121 !important;
        }
        .bg-purple {
            background-color: #715ded !important;
        }
        .bg-pink {
            background-color: #e866ff !important;
        }
        .bg-white {
            background-color: #ffffff !important;
        }
        .text-white {
            color: #ffffff;
        }
        .text-danger {
            color: #e66060;
        }
        .text-muted {
            color: #9fa2a7;
        }
        .text-primary {
            color: #04a2b3;
        }
        .text-warning {
            color: #ffb600;
        }
        .text-success {
            color: #66d203;
        }
        .text-info {
            color: #00a4fe;
        }
        .text-pink {
            color: #e866ff;
        }
        .text-purple {
            color: #715ded;
        }
        .text-dark {
            color: #2a323c !important;
        }
        .form-control {
            -moz-border-radius: 2px;
            -moz-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
            -webkit-border-radius: 2px;
            -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
            background-color: #2a323c;
            border-radius: 2px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: none;
            height: 38px;
            color: #ffffff;
            font-size: 14px;
        }
        .form-control:focus {
            background: #2a323c;
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: none;
        }
        .form-control[disabled],
        .form-control[readonly],
        fieldset[disabled] .form-control {
            background-color: #394451;
            opacity: 1;
        }
        .input-lg {
            height: 46px;
            padding: 10px 16px;
            font-size: 16px;
            line-height: 1.3333333;
            border-radius: 3px;
        }
        .input-sm {
            height: 30px;
            padding: 5px 10px;
            font-size: 12px;
            line-height: 1.5;
            border-radius: 3px;
        }
        .label-primary {
            background-color: #04a2b3;
        }
        .label-success {
            background-color: #66d203;
        }
        .label-info {
            background-color: #00a4fe;
        }
        .label-warning {
            background-color: #ffb600;
        }
        .label-danger {
            background-color: #e66060;
        }
        .label-dark {
            background-color: #2a323c;
        }
        .badge {
            text-transform: uppercase;
            padding: 3px 7px;
            font-size: 11px;
            margin-top: 1px;
        }
        .badge-xs {
            font-size: 9px;
        }
        .badge-xs,
        .badge-sm {
            -webkit-transform: translate(0, -2px);
            -ms-transform: translate(0, -2px);
            -o-transform: translate(0, -2px);
            transform: translate(0, -2px);
        }
        .badge-primary {
            background-color: #04a2b3;
        }
        .badge-success {
            background-color: #66d203;
        }
        .badge-info {
            background-color: #00a4fe;
        }
        .badge-warning {
            background-color: #ffb600;
        }
        .badge-danger {
            background-color: #e66060;
        }
        .badge-dark {
            background-color: #2a323c;
        }
        .popover {
            border-radius: 3px;
        }
        .pagination > li > a {
            background-color: #2a323c !important;
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
            color: #ffffff !important;
        }
        .pagination > li > span {
            background-color: #2a323c !important;
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
            color: #ffffff !important;
        }
        .pagination > .active > a,
        .pagination > .active > span,
        .pagination > .active > a:hover,
        .pagination > .active > span:hover,
        .pagination > .active > a:focus,
        .pagination > .active > span:focus {
            background-color: #04a2b3 !important;
            border-color: #04a2b3 !important;
        }
        .tabs {
            background-color: #ffffff;
            margin: 0 auto;
            padding: 0px;
            position: relative;
            white-space: nowrap;
            width: 100%;
        }
        .tabs li.tab {
            background-color: #ffffff;
            display: block;
            float: left;
            margin: 0;
            text-align: center;
        }
        .tabs li.tab a {
            -moz-transition: color 0.28s ease;
            -ms-transition: color 0.28s ease;
            -o-transition: color 0.28s ease;
            -webkit-transition: color 0.28s ease;
            color: #ffffff;
            display: block;
            height: 100%;
            text-decoration: none;
            transition: color 0.28s ease;
            width: 100%;
        }
        .tabs li.tab a.active {
            color: #04a2b3 !important;
        }
        .tabs .indicator {
            background-color: #04a2b3;
            bottom: 0;
            height: 2px;
            position: absolute;
            will-change: left, right;
        }
        .tabs-top .indicator {
            top: 0;
        }
        .nav.nav-tabs + .tab-content {
            background: #323c48;
            border-color: rgba(255, 255, 255, 0.3);
            margin-bottom: 30px;
            padding: 30px;
        }
        .tabs-vertical-env {
            margin-bottom: 30px;
        }
        .tabs-vertical-env .tab-content {
            background: #323c48;
            display: table-cell;
            margin-bottom: 30px;
            padding: 30px;
            vertical-align: top;
        }
        .tabs-vertical-env .nav.tabs-vertical {
            display: table-cell;
            min-width: 120px;
            vertical-align: top;
            width: 150px;
        }
        .tabs-vertical-env .nav.tabs-vertical li.active > a {
            background-color: #04a2b3;
            color: #ffffff !important;
            border: 0;
        }
        .tabs-vertical-env .nav.tabs-vertical li.active > a:hover {
            color: #ffffff !important;
        }
        .tabs-vertical-env .nav.tabs-vertical li > a {
            color: #9fa2a7;
            text-align: center;
            white-space: nowrap;
        }
        .nav.nav-tabs > li.active > a {
            background-color: #04a2b3;
            color: #ffffff !important;
            border: 0;
        }
        .nav.nav-tabs > li.active > a:hover {
            color: #ffffff !important;
        }
        .nav.nav-tabs > li > a,
        .nav.tabs-vertical > li > a {
            background-color: transparent;
            border-radius: 0;
            border: none;
            color: #9fa2a7 !important;
            cursor: pointer;
            line-height: 50px;
            font-weight: 500;
            padding-left: 20px;
            padding-right: 20px;
            font-family: 'Roboto', sans-serif;
        }
        .nav.nav-tabs > li > a:hover,
        .nav.tabs-vertical > li > a:hover {
            color: #04a2b3 !important;
        }
        .tab-content {
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
            color: #9fa2a7;
        }
        .nav.nav-tabs > li:last-of-type a {
            margin-right: 0px;
        }
        .nav.nav-tabs {
            border-bottom: 0;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        }
        .nav-tabs.nav-justified > .active > a,
        .nav-tabs.nav-justified > .active > a:hover,
        .nav-tabs.nav-justified > .active > a:focus,
        .tabs-vertical-env .nav.tabs-vertical li.active > a {
            border: none;
        }
        /* Dropcap */
        .dropcap {
            font-size: 3.1em;
        }
        .dropcap,
        .dropcap-circle,
        .dropcap-square {
            display: block;
            float: left;
            font-weight: 400;
            line-height: 36px;
            margin-right: 6px;
            text-shadow: none;
        }
        .modal .modal-title {
            color: #2a323c;
        }
        .modal .modal-dialog .modal-content {
            border-radius: 2px;
            padding: 20px 20px 0 20px;
            box-shadow: none;
        }
        .modal .modal-dialog .modal-content .modal-header {
            border-bottom-width: 2px;
            margin: 0;
            padding: 0 0 10px 0;
        }
        .modal .modal-dialog .modal-content .modal-body {
            padding: 10px 0;
        }
        .modal .modal-dialog .modal-content .modal-body h1,
        .modal .modal-dialog .modal-content .modal-body h2,
        .modal .modal-dialog .modal-content .modal-body h3,
        .modal .modal-dialog .modal-content .modal-body h4,
        .modal .modal-dialog .modal-content .modal-body h5,
        .modal .modal-dialog .modal-content .modal-body h6 {
            color: #2a323c;
        }
        .modal .modal-dialog .modal-content .modal-footer {
            padding-top: 15px;
        }
        .modal-full {
            width: 98%;
        }
        .modal-content .nav.nav-tabs + .tab-content {
            margin-bottom: 0px;
        }
        .modal-content .panel-group {
            margin-bottom: 0px;
        }
        .modal-content .panel {
            border-top: none;
        }
        .tabs-vertical-env .tab-content {
            margin-bottom: 0px;
        }
        .legendLabel {
            padding-left: 10px !important;
        }
        /* =============
   Alerts
============= */
        .alert {
            position: relative;
            border: 0;
        }
        .alert .alert-link {
            font-weight: 600;
        }
        .alert-success {
            color: #ffffff;
            background-color: rgba(102, 210, 3, 0.8);
        }
        .alert-success .alert-link {
            color: #e6e6e6;
        }
        .alert-success hr {
            border-top-color: #000000;
        }
        .alert-info {
            color: #ffffff;
            background-color: rgba(0, 164, 254, 0.8);
        }
        .alert-info .alert-link {
            color: #e6e6e6;
        }
        .alert-info hr {
            border-top-color: #000000;
        }
        .alert-warning {
            color: #ffffff;
            background-color: rgba(255, 182, 0, 0.8);
        }
        .alert-warning .alert-link {
            color: #e6e6e6;
        }
        .alert-warning hr {
            border-top-color: #000000;
        }
        .alert-danger {
            color: #ffffff;
            background-color: rgba(230, 96, 96, 0.8);
        }
        .alert-danger .alert-link {
            color: #e6e6e6;
        }
        .alert-danger hr {
            border-top-color: #000000;
        }
        .alert-dismissable .close,
        .alert-dismissible .close {
            opacity: 0.5;
        }
        .list-group-item.active {
            background-color: #353f4b;
            border-color: #353f4b;
            color: #9fa2a7;
            z-index: 2;
        }
        .list-group-item.active:hover {
            background-color: #353f4b !important;
            border-color: #353f4b;
            color: #ffffff;
            z-index: 2;
        }
        .list-group-item.active:hover .list-group-item-text {
            color: #04a2b3;
        }
        .list-group-item.active:focus {
            background-color: #353f4b !important;
            border-color: #353f4b;
            color: #ffffff;
            z-index: 2;
        }
        .list-group-item.active:focus .list-group-item-text {
            color: #04a2b3;
        }
        .list-group-item.active .list-group-item-text {
            color: #04a2b3;
        }
        a.list-group-item,
        button.list-group-item {
            color: #9fa2a7;
        }
        .list-group-item {
            border-radius: 0px;
            padding: 12px 20px;
            background-color: #2a323c;
            border-color: rgba(255, 255, 255, 0.25) !important;
        }
        .list-group-item:first-child {
            border-radius: 0px;
            padding: 12px 20px;
        }
        .list-group-item:last-child {
            border-radius: 0px;
            padding: 12px 20px;
        }
        .list-group-item-heading {
            font-weight: 300;
        }
        .list-group-item.active > .badge {
            color: #04a2b3;
        }
        .nav-pills > .active > a > .badge {
            color: #04a2b3;
        }
        .has-success .form-control {
            border-color: #66d203;
            box-shadow: none !important;
        }
        .has-warning .form-control {
            border-color: #ffb600;
            box-shadow: none !important;
        }
        .has-error .form-control {
            border-color: #e66060;
            box-shadow: none !important;
        }
        .input-group-addon {
            border-radius: 2px;
            background-color: #4a5869;
            color: #ffffff;
            border: 1px solid #4a5869;
        }
        /* ==============
  Helper Classes
===================*/
        .p-0 {
            padding: 0px !important;
        }
        .p-t-0 {
            padding-top: 0px !important;
        }
        .p-t-10 {
            padding-top: 10px !important;
        }
        .p-b-10 {
            padding-bottom: 10px !important;
        }
        .m-0 {
            margin: 0px !important;
        }
        .m-r-5 {
            margin-right: 5px;
        }
        .m-r-10 {
            margin-right: 10px;
        }
        .m-r-15 {
            margin-right: 15px !important;
        }
        .m-l-10 {
            margin-left: 10px;
        }
        .m-l-15 {
            margin-left: 15px;
        }
        .m-t-5 {
            margin-top: 5px !important;
        }
        .m-t-0 {
            margin-top: 0px;
        }
        .m-t-10 {
            margin-top: 10px !important;
        }
        .m-t-15 {
            margin-top: 15px !important;
        }
        .m-t-20 {
            margin-top: 20px;
        }
        .m-t-30 {
            margin-top: 30px !important;
        }
        .m-t-40 {
            margin-top: 40px !important;
        }
        .m-b-0 {
            margin-bottom: 0 !important;
        }
        .m-b-5 {
            margin-bottom: 5px;
        }
        .m-b-10 {
            margin-bottom: 10px;
        }
        .m-b-15 {
            margin-bottom: 15px;
        }
        .m-b-30 {
            margin-bottom: 30px;
        }
        .w-xs {
            min-width: 80px;
        }
        .w-sm {
            min-width: 95px;
        }
        .w-md {
            min-width: 110px;
        }
        .w-lg {
            min-width: 140px;
        }
        .m-h-50 {
            min-height: 50px;
        }
        .l-h-34 {
            line-height: 34px;
        }
        .font-light {
            font-weight: 300;
        }
        .wrapper-md {
            padding: 20px;
        }
        .pull-in {
            margin-left: -15px;
            margin-right: -15px;
        }
        .b-0 {
            border: none !important;
        }
        .no-border {
            border: none;
        }
        .bx-shadow {
            -moz-box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.1);
            -webkit-box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.1);
            box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.1);
        }
        .mx-box {
            max-height: 380px;
            min-height: 380px;
        }
        .thumb-sm {
            height: 32px;
            width: 32px;
        }
        .thumb-md {
            height: 48px;
            width: 48px;
        }
        .thumb-lg {
            height: 88px;
            width: 88px;
        }
        .grid-structure .grid-container {
            background-color: #f5f5f5;
            margin-bottom: 10px;
            padding: 10px 20px;
        }
        .icon-list div {
            cursor: pointer;
            line-height: 40px;
            white-space: nowrap;
        }
        .icon-list i {
            -webkit-transition: all 0.2s;
            -webkit-transition: font-size 0.2s;
            display: inline-block;
            font-size: 14px;
            margin: 0;
            text-align: center;
            transition: all 0.2s;
            transition: font-size 0.2s;
            vertical-align: middle;
            width: 40px;
        }
        .icon-list .col-md-3:hover i {
            -o-transform: scale(2);
            -webkit-transform: scale(2);
            moz-transform: scale(2);
            transform: scale(2);
        }
        .ionicon-list i {
            font-size: 16px;
        }
        .ionicon-list .col-md-3:hover i {
            -o-transform: scale(2);
            -webkit-transform: scale(2);
            moz-transform: scale(2);
            transform: scale(2);
        }
        /* ==============
  Waves Effect
===================*/
        /*!
 * Waves v0.6.0
 * http://fian.my.id/Waves
 *
 * Copyright 2014 Alfiana E. Sibuea and other contributors
 * Released under the MIT license
 * https://github.com/fians/Waves/blob/master/LICENSE
 */
        .waves-effect {
            position: relative;
            cursor: pointer;
            display: inline-block;
            overflow: hidden;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-tap-highlight-color: transparent;
            vertical-align: middle;
            z-index: 1;
            will-change: opacity, transform;
            -webkit-transition: all 0.3s ease-out;
            -moz-transition: all 0.3s ease-out;
            -o-transition: all 0.3s ease-out;
            -ms-transition: all 0.3s ease-out;
            transition: all 0.3s ease-out;
        }
        .waves-effect .waves-ripple {
            position: absolute;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            margin-top: -10px;
            margin-left: -10px;
            opacity: 0;
            background: rgba(0, 0, 0, 0.2);
            -webkit-transition: all 0.7s ease-out;
            -moz-transition: all 0.7s ease-out;
            -o-transition: all 0.7s ease-out;
            -ms-transition: all 0.7s ease-out;
            transition: all 0.7s ease-out;
            -webkit-transition-property: -webkit-transform, opacity;
            -moz-transition-property: -moz-transform, opacity;
            -o-transition-property: -o-transform, opacity;
            transition-property: transform, opacity;
            -webkit-transform: scale(0);
            -moz-transform: scale(0);
            -ms-transform: scale(0);
            -o-transform: scale(0);
            transform: scale(0);
            pointer-events: none;
        }
        .waves-effect.waves-light .waves-ripple {
            background-color: rgba(255, 255, 255, 0.45);
        }
        .waves-effect.waves-red .waves-ripple {
            background-color: rgba(244, 67, 54, 0.7);
        }
        .waves-effect.waves-yellow .waves-ripple {
            background-color: rgba(255, 235, 59, 0.7);
        }
        .waves-effect.waves-orange .waves-ripple {
            background-color: rgba(255, 152, 0, 0.7);
        }
        .waves-effect.waves-purple .waves-ripple {
            background-color: rgba(156, 39, 176, 0.7);
        }
        .waves-effect.waves-green .waves-ripple {
            background-color: rgba(76, 175, 80, 0.7);
        }
        .waves-effect.waves-teal .waves-ripple {
            background-color: rgba(0, 150, 136, 0.7);
        }
        .waves-notransition {
            -webkit-transition: none !important;
            -moz-transition: none !important;
            -o-transition: none !important;
            -ms-transition: none !important;
            transition: none !important;
        }
        .waves-circle {
            -webkit-transform: translateZ(0);
            -moz-transform: translateZ(0);
            -ms-transform: translateZ(0);
            -o-transform: translateZ(0);
            transform: translateZ(0);
            text-align: center;
            width: 2.5em;
            height: 2.5em;
            line-height: 2.5em;
            border-radius: 50%;
            -webkit-mask-image: none;
        }
        .waves-input-wrapper {
            border-radius: 0.2em;
            vertical-align: bottom;
        }
        .waves-input-wrapper .waves-button-input {
            position: relative;
            top: 0;
            left: 0;
            z-index: 1;
        }
        .waves-block {
            display: block;
        }
        /* ==============
  Animation
===================*/
        /* Bounce 1 */
        @-webkit-keyframes cd-bounce-1 {
            0% {
                opacity: 0;
                -webkit-transform: scale(0.5);
            }
            60% {
                opacity: 1;
                -webkit-transform: scale(1.2);
            }
            100% {
                -webkit-transform: scale(1);
            }
        }
        @-moz-keyframes cd-bounce-1 {
            0% {
                opacity: 0;
                -moz-transform: scale(0.5);
            }
            60% {
                opacity: 1;
                -moz-transform: scale(1.2);
            }
            100% {
                -moz-transform: scale(1);
            }
        }
        @-o-keyframes cd-bounce-1 {
            0% {
                opacity: 0;
                -o-transform: scale(0.5);
            }
            60% {
                opacity: 1;
                -o-transform: scale(1.2);
            }
            100% {
                -o-transform: scale(1);
            }
        }
        @keyframes cd-bounce-1 {
            0% {
                opacity: 0;
                -webkit-transform: scale(0.5);
                -moz-transform: scale(0.5);
                -ms-transform: scale(0.5);
                -o-transform: scale(0.5);
                transform: scale(0.5);
            }
            60% {
                opacity: 1;
                -webkit-transform: scale(1.2);
                -moz-transform: scale(1.2);
                -ms-transform: scale(1.2);
                -o-transform: scale(1.2);
                transform: scale(1.2);
            }
            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -ms-transform: scale(1);
                -o-transform: scale(1);
                transform: scale(1);
            }
        }
        /* Bounce 2 */
        @-webkit-keyframes cd-bounce-2 {
            0% {
                opacity: 0;
                -webkit-transform: translateX(-100px);
            }
            60% {
                opacity: 1;
                -webkit-transform: translateX(20px);
            }
            100% {
                -webkit-transform: translateX(0);
            }
        }
        @-moz-keyframes cd-bounce-2 {
            0% {
                opacity: 0;
                -moz-transform: translateX(-100px);
            }
            60% {
                opacity: 1;
                -moz-transform: translateX(20px);
            }
            100% {
                -moz-transform: translateX(0);
            }
        }
        @-o-keyframes cd-bounce-2 {
            0% {
                opacity: 0;
                -o-transform: translateX(-100px);
            }
            60% {
                opacity: 1;
                -o-transform: translateX(20px);
            }
            100% {
                opacity: 1;
                -o-transform: translateX(0);
            }
        }
        @keyframes cd-bounce-2 {
            0% {
                opacity: 0;
                -webkit-transform: translateX(-100px);
                -moz-transform: translateX(-100px);
                -ms-transform: translateX(-100px);
                -o-transform: translateX(-100px);
                transform: translateX(-100px);
            }
            60% {
                opacity: 1;
                -webkit-transform: translateX(20px);
                -moz-transform: translateX(20px);
                -ms-transform: translateX(20px);
                -o-transform: translateX(20px);
                transform: translateX(20px);
            }
            100% {
                opacity: 1;
                -webkit-transform: translateX(0);
                -moz-transform: translateX(0);
                -ms-transform: translateX(0);
                -o-transform: translateX(0);
                transform: translateX(0);
            }
        }
        /* Dropdown */
        @-webkit-keyframes dropdownOpen {
            0% {
                opacity: 0;
                -webkit-transform: scale(0);
            }
            100% {
                -webkit-transform: scale(1);
            }
        }
        @-moz-keyframes dropdownOpen {
            0% {
                opacity: 0;
                -moz-transform: scale(0);
            }
            100% {
                -moz-transform: scale(1);
            }
        }
        @-o-keyframes dropdownOpen {
            0% {
                opacity: 0;
                -o-transform: scale(0);
            }
            100% {
                -o-transform: scale(1);
            }
        }
        @keyframes dropdownOpen {
            0% {
                opacity: 0;
                -webkit-transform: scale(0);
                -moz-transform: scale(0);
                -ms-transform: scale(0);
                -o-transform: scale(0);
                transform: scale(0);
            }
            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -ms-transform: scale(1);
                -o-transform: scale(1);
                transform: scale(1);
            }
        }
        /* Progressbar Animated */
        @-webkit-keyframes animationProgress {
            from {
                width: 0;
            }
        }
        @keyframes animationProgress {
            from {
                width: 0;
            }
        }
        /* Portlets loader */
        @-webkit-keyframes loaderAnimate {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(220deg);
            }
        }
        @-moz-keyframes loaderAnimate {
            0% {
                -moz-transform: rotate(0deg);
            }
            100% {
                -moz-transform: rotate(220deg);
            }
        }
        @-o-keyframes loaderAnimate {
            0% {
                -o-transform: rotate(0deg);
            }
            100% {
                -o-transform: rotate(220deg);
            }
        }
        @keyframes loaderAnimate {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(220deg);
            }
        }
        @-webkit-keyframes loaderAnimate2 {
            0% {
                box-shadow: inset #555 0 0 0 8px;
                -webkit-transform: rotate(-140deg);
            }
            50% {
                box-shadow: inset #555 0 0 0 2px;
            }
            100% {
                box-shadow: inset #555 0 0 0 8px;
                -webkit-transform: rotate(140deg);
            }
        }
        @-moz-keyframes loaderAnimate2 {
            0% {
                box-shadow: inset #555 0 0 0 8px;
                -moz-transform: rotate(-140deg);
            }
            50% {
                box-shadow: inset #555 0 0 0 2px;
            }
            100% {
                box-shadow: inset #555 0 0 0 8px;
                -moz-transform: rotate(140deg);
            }
        }
        @-o-keyframes loaderAnimate2 {
            0% {
                box-shadow: inset #555 0 0 0 8px;
                -o-transform: rotate(-140deg);
            }
            50% {
                box-shadow: inset #555 0 0 0 2px;
            }
            100% {
                box-shadow: inset #555 0 0 0 8px;
                -o-transform: rotate(140deg);
            }
        }
        @keyframes loaderAnimate2 {
            0% {
                box-shadow: inset #555 0 0 0 8px;
                -webkit-transform: rotate(-140deg);
                -moz-transform: rotate(-140deg);
                -ms-transform: rotate(-140deg);
                transform: rotate(-140deg);
            }
            50% {
                box-shadow: inset #555 0 0 0 2px;
            }
            100% {
                box-shadow: inset #555 0 0 0 8px;
                -webkit-transform: rotate(140deg);
                -moz-transform: rotate(140deg);
                -ms-transform: rotate(140deg);
                transform: rotate(140deg);
            }
        }
        @keyframes loaderAnimate2 {
            0% {
                box-shadow: inset #999 0 0 0 17px;
                transform: rotate(-140deg);
            }
            50% {
                box-shadow: inset #999 0 0 0 2px;
            }
            100% {
                box-shadow: inset #999 0 0 0 17px;
                transform: rotate(140deg);
            }
        }
        @media print {
            .logo,
            .page-title,
            .breadcrumb,
            .footer {
                display: none !important;
                margin: 0px !important;
                padding: 0px !important;
            }
            .left {
                display: none;
            }
            .right-bar {
                display: none !important;
            }
            .content {
                margin-top: 0px;
                padding-top: 0px;
            }
            .content-page {
                margin-left: 0px !important;
                margin-top: 0px;
            }
        }
        .bs-example-modal {
            position: relative;
            top: auto;
            right: auto;
            bottom: auto;
            left: auto;
            z-index: 1;
            display: block;
        }
        .responsive-utilities td.is-visible {
            background-color: #2a323c;
            color: #66d203;
        }
        .icon-demo-content {
            text-align: center;
            color: #9fa2a7;
        }
        .icon-demo-content i {
            display: block;
            font-size: 28px;
            color: #ffffff;
            margin-bottom: 5px;
        }
        .icon-demo-content .col-sm-6 {
            margin-bottom: 30px;
        }
        .icon-demo-content .col-sm-6:hover i {
            color: #04a2b3;
        }
        @media print {
            .topbar,
            .footer,
            .side-menu {
                display: none;
                margin: 0;
                padding: 0;
            }
        }
        /*
File: Components
*/
        /*
  - Buttons
  - Panels
  - Portlets
  - Checkbox and Radio
  - Progressbars
  - Tables
  - Form Elements
  - Calendar
  - Widgets
*/
        /* ==============
  Buttons
===================*/
        /* =============
   Buttons
============= */
        .btn {
            border-radius: 2px;
            padding: 6px 14px;
        }
        .btn-md {
            padding: 8px 18px;
        }
        .btn-group-lg > .btn,
        .btn-lg {
            padding: 10px 16px !important;
            font-size: 16px;
        }
        .btn-group-sm > .btn,
        .btn-sm {
            padding: 5px 10px !important;
        }
        .btn-group-xs > .btn,
        .btn-xs {
            padding: 1px 5px !important;
        }
        .btn-group.open .dropdown-toggle {
            -webkit-box-shadow: 0 0 0 100px rgba(0, 0, 0, 0.1) inset;
            box-shadow: 0 0 0 100px rgba(0, 0, 0, 0.1) inset;
        }
        .btn-primary,
        .btn-success,
        .btn-info,
        .btn-warning,
        .btn-danger,
        .btn-inverse,
        .btn-purple,
        .btn-pink,
        .btn-orange,
        .btn-brown,
        .btn-teal {
            color: #ffffff !important;
        }
        .btn-default {
            background-color: #e6e6e6;
            border-color: rgba(255, 255, 255, 0.2);
        }
        .btn-default:hover,
        .btn-default:focus,
        .btn-default:active,
        .btn-default.active,
        .btn-default.focus,
        .btn-default:active,
        .btn-default:focus,
        .btn-default:hover,
        .open > .dropdown-toggle.btn-default {
            background-color: #ffffff !important;
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
        }
        .btn-primary {
            background-color: #04a2b3 !important;
            border: 1px solid #04a2b3 !important;
        }
        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active,
        .btn-primary.active,
        .btn-primary.focus,
        .btn-primary:active,
        .btn-primary:focus,
        .btn-primary:hover,
        .open > .dropdown-toggle.btn-primary {
            background-color: #038b9a !important;
            border: 1px solid #038b9a !important;
        }
        .btn-success {
            background-color: #66d203 !important;
            border: 1px solid #66d203 !important;
        }
        .btn-success:hover,
        .btn-success:focus,
        .btn-success:active,
        .btn-success.active,
        .btn-success.focus,
        .btn-success:active,
        .btn-success:focus,
        .btn-success:hover,
        .open > .dropdown-toggle.btn-success {
            background-color: #5ab903 !important;
            border: 1px solid #5ab903 !important;
        }
        .btn-info {
            background-color: #00a4fe !important;
            border: 1px solid #00a4fe !important;
        }
        .btn-info:hover,
        .btn-info:focus,
        .btn-info:active,
        .btn-info.active,
        .btn-info.focus,
        .btn-info:active,
        .btn-info:focus,
        .btn-info:hover,
        .open > .dropdown-toggle.btn-info {
            background-color: #0094e5 !important;
            border: 1px solid #0094e5 !important;
        }
        .btn-warning {
            background-color: #ffb600 !important;
            border: 1px solid #ffb600 !important;
        }
        .btn-warning:hover,
        .btn-warning:focus,
        .btn-warning:active,
        .btn-warning.active,
        .btn-warning.focus,
        .btn-warning:active,
        .btn-warning:focus,
        .btn-warning:hover,
        .open > .dropdown-toggle.btn-warning {
            background-color: #e6a400 !important;
            border: 1px solid #e6a400 !important;
        }
        .btn-danger {
            background-color: #e66060 !important;
            border: 1px solid #e66060 !important;
        }
        .btn-danger:active,
        .btn-danger:focus,
        .btn-danger:hover,
        .btn-danger.active,
        .btn-danger.focus,
        .btn-danger:active,
        .btn-danger:focus,
        .btn-danger:hover,
        .open > .dropdown-toggle.btn-danger {
            background-color: #e34a4a !important;
            border: 1px solid #e34a4a !important;
        }
        .btn-dark {
            background-color: #2a323c !important;
            border: 1px solid #2a323c !important;
            color: #ffffff;
        }
        .btn-dark:hover,
        .btn-dark:focus,
        .btn-dark:active,
        .btn-dark.active,
        .btn-dark.focus,
        .btn-dark:active,
        .btn-dark:focus,
        .btn-dark:hover,
        .open > .dropdown-toggle.btn-dark {
            background-color: #20262d !important;
            border: 1px solid #20262d !important;
            color: #ffffff;
        }
        .btn-link {
            color: #2a323c;
        }
        .btn-link:hover {
            color: #04a2b3;
        }
        .fileupload {
            overflow: hidden;
            position: relative;
        }
        .fileupload input.upload {
            cursor: pointer;
            filter: alpha(opacity=0);
            font-size: 20px;
            margin: 0;
            opacity: 0;
            padding: 0;
            position: absolute;
            right: 0;
            top: 0;
        }
        /* ==============
  Panels
===================*/
        .panel {
            border: none;
            background-color: #323c48;
            -moz-box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.1);
            -webkit-box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.1);
            box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .panel .panel-body {
            padding: 20px;
        }
        .panel-heading {
            border: none !important;
            padding: 10px 20px;
        }
        .panel-default > .panel-heading {
            background-color: #fafafa;
            border-bottom: none;
            color: #2a323c;
        }
        .panel-footer {
            background: #fafafa;
            border-top: 0;
        }
        .panel-color .panel-title {
            color: #ffffff;
        }
        .panel-primary > .panel-heading {
            background-color: #04a2b3;
        }
        .panel-success > .panel-heading {
            background-color: #66d203;
        }
        .panel-info > .panel-heading {
            background-color: #00a4fe;
        }
        .panel-warning > .panel-heading {
            background-color: #ffb600;
        }
        .panel-danger > .panel-heading {
            background-color: #e66060;
        }
        .panel-dark > .panel-heading {
            background-color: #2a323c;
            color: #ffffff;
        }
        .panel-fill {
            border-radius: 3px;
        }
        .panel-fill .panel-heading {
            background-color: transparent;
            color: #ffffff;
            border-bottom: 1px solid rgba(255, 255, 255, 0.5) !important;
        }
        .panel-fill .panel-body {
            color: rgba(255, 255, 255, 0.85);
        }
        .panel-fill.panel-default .panel-body {
            color: #666;
        }
        .panel-fill.panel-default .panel-heading {
            background-color: transparent;
            color: #333333;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1) !important;
        }
        .panel-fill.panel-primary {
            background-color: #04a2b3;
        }
        .panel-fill.panel-success {
            background-color: #66d203;
        }
        .panel-fill.panel-info {
            background-color: #00a4fe;
        }
        .panel-fill.panel-warning {
            background-color: #ffb600;
        }
        .panel-fill.panel-danger {
            background-color: #e66060;
        }
        .panel-fill.panel-dark {
            background-color: #2a323c;
        }
        .panel-group .panel .panel-heading a[data-toggle=collapse].collapsed:before {
            content: '\f067';
        }
        .panel-group .panel .panel-heading .accordion-toggle.collapsed:before {
            content: '\f067';
        }
        .panel-group .panel .panel-heading a[data-toggle=collapse] {
            display: block;
        }
        .panel-group .panel .panel-heading a[data-toggle=collapse]:before {
            content: '\f068';
            display: block;
            float: right;
            font-family: 'FontAwesome';
            font-size: 14px;
            text-align: right;
            width: 25px;
        }
        .panel-group .panel .panel-heading .accordion-toggle {
            display: block;
        }
        .panel-group .panel .panel-heading .accordion-toggle:before {
            content: '\f068';
            display: block;
            float: right;
            font-family: 'FontAwesome';
            font-size: 14px;
            text-align: right;
            width: 25px;
        }
        .panel-group .panel .panel-heading + .panel-collapse .panel-body {
            border-top: none;
        }
        .panel-group .panel-heading {
            padding: 12px 26px;
        }
        .panel-group.panel-group-joined .panel + .panel {
            border-top: 1px solid #eeeeee;
            margin-top: 0;
        }
        .panel-group-joined .panel-group .panel + .panel {
            border-top: 1px solid #eeeeee;
            margin-top: 0;
        }
        /* ==============
  Portlets
===================*/
        .portlet {
            -moz-box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.1);
            -moz-transition: all 0.4s;
            -o-transition: all 0.4s;
            -webkit-box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.1);
            -webkit-transition: all 0.4s;
            background: #ffffff;
            box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: all 0.4s;
        }
        .portlet .portlet-heading {
            border-radius: 3px;
            color: #ffffff;
            padding: 12px 20px;
        }
        .portlet .portlet-heading .portlet-title {
            color: #ffffff;
            float: left;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 0;
            margin-top: 0;
        }
        .portlet .portlet-heading .portlet-widgets {
            display: inline-block;
            float: right;
            font-size: 15px;
            line-height: 30px;
            padding-left: 15px;
            position: relative;
            text-align: right;
        }
        .portlet .portlet-heading .portlet-widgets .divider {
            margin: 0 5px;
        }
        .portlet .portlet-heading a {
            color: #999999;
        }
        .portlet .portlet-body {
            -moz-border-radius-bottomleft: 5px;
            -moz-border-radius-bottomright: 5px;
            -webkit-border-bottom-left-radius: 5px;
            -webkit-border-bottom-right-radius: 5px;
            background: #ffffff;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
            padding: 15px;
        }
        .portlet-default .portlet-title {
            color: #797979 !important;
        }
        .portlet .portlet-heading.bg-purple a,
        .portlet .portlet-heading.bg-info a,
        .portlet .portlet-heading.bg-success a,
        .portlet .portlet-heading.bg-primary a,
        .portlet .portlet-heading.bg-danger a,
        .portlet .portlet-heading.bg-warning a,
        .portlet .portlet-heading.bg-inverse a,
        .portlet .portlet-heading.bg-pink a {
            color: #ffffff;
        }
        .panel-disabled {
            background: rgba(243, 242, 241, 0.5);
            bottom: 15px;
            left: 0px;
            position: absolute;
            right: -5px;
            top: 0;
        }
        .loader-1 {
            -moz-animation: loaderAnimate 1000ms linear infinite;
            -o-animation: loaderAnimate 1000ms linear infinite;
            -webkit-animation: loaderAnimate 1000ms linear infinite;
            animation: loaderAnimate 1000ms linear infinite;
            clip: rect(0, 30px, 30px, 15px);
            height: 30px;
            left: 50%;
            margin-left: -15px;
            margin-top: -15px;
            position: absolute;
            top: 50%;
            width: 30px;
        }
        .loader-1:after {
            -moz-animation: loaderAnimate2 1000ms ease-in-out infinite;
            -o-animation: loaderAnimate2 1000ms ease-in-out infinite;
            -webkit-animation: loaderAnimate2 1000ms ease-in-out infinite;
            animation: loaderAnimate2 1000ms ease-in-out infinite;
            border-radius: 50%;
            clip: rect(0, 30px, 30px, 15px);
            content: '';
            height: 30px;
            position: absolute;
            width: 30px;
        }
        /* ==============
  Checkbox and Radio
===================*/
        .checkbox {
            padding-left: 20px;
        }
        .checkbox label {
            display: inline-block;
            padding-left: 5px;
            position: relative;
        }
        .checkbox label::before {
            -o-transition: 0.3s ease-in-out;
            -webkit-transition: 0.3s ease-in-out;
            background-color: #ffffff;
            border-radius: 3px;
            border: 1px solid #cccccc;
            content: "";
            display: inline-block;
            height: 17px;
            left: 0;
            margin-left: -20px;
            position: absolute;
            transition: 0.3s ease-in-out;
            width: 17px;
            outline: none !important;
        }
        .checkbox label::after {
            color: #555555;
            display: inline-block;
            font-size: 11px;
            height: 16px;
            left: 0;
            margin-left: -20px;
            padding-left: 3px;
            padding-top: 1px;
            position: absolute;
            top: 0;
            width: 16px;
        }
        .checkbox input[type="checkbox"] {
            cursor: pointer;
            opacity: 0;
            z-index: 1;
            outline: none !important;
        }
        .checkbox input[type="checkbox"]:disabled + label {
            opacity: 0.65;
        }
        .checkbox input[type="checkbox"]:focus + label::before {
            outline-offset: -2px;
            outline: none;
        }
        .checkbox input[type="checkbox"]:checked + label::after {
            content: "\f00c";
            font-family: 'FontAwesome';
        }
        .checkbox input[type="checkbox"]:disabled + label::before {
            background-color: #eeeeee;
            cursor: not-allowed;
        }
        .checkbox.checkbox-circle label::before {
            border-radius: 50%;
        }
        .checkbox.checkbox-inline {
            margin-top: 0;
        }
        .checkbox.checkbox-single label {
            height: 17px;
        }
        .checkbox-primary input[type="checkbox"]:checked + label::before {
            background-color: #04a2b3;
            border-color: #04a2b3;
        }
        .checkbox-primary input[type="checkbox"]:checked + label::after {
            color: #ffffff;
        }
        .checkbox-danger input[type="checkbox"]:checked + label::before {
            background-color: #e66060;
            border-color: #e66060;
        }
        .checkbox-danger input[type="checkbox"]:checked + label::after {
            color: #ffffff;
        }
        .checkbox-info input[type="checkbox"]:checked + label::before {
            background-color: #00a4fe;
            border-color: #00a4fe;
        }
        .checkbox-info input[type="checkbox"]:checked + label::after {
            color: #ffffff;
        }
        .checkbox-warning input[type="checkbox"]:checked + label::before {
            background-color: #ffb600;
            border-color: #ffb600;
        }
        .checkbox-warning input[type="checkbox"]:checked + label::after {
            color: #ffffff;
        }
        .checkbox-success input[type="checkbox"]:checked + label::before {
            background-color: #66d203;
            border-color: #66d203;
        }
        .checkbox-success input[type="checkbox"]:checked + label::after {
            color: #ffffff;
        }
        .radio {
            padding-left: 20px;
        }
        .radio label {
            display: inline-block;
            padding-left: 5px;
            position: relative;
        }
        .radio label::before {
            -o-transition: border 0.5s ease-in-out;
            -webkit-transition: border 0.5s ease-in-out;
            background-color: #ffffff;
            border-radius: 50%;
            border: 1px solid #cccccc;
            content: "";
            display: inline-block;
            height: 17px;
            left: 0;
            margin-left: -20px;
            outline: none !important;
            position: absolute;
            transition: border 0.5s ease-in-out;
            width: 17px;
        }
        .radio label::after {
            -moz-transition: -moz-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
            -ms-transform: scale(0, 0);
            -o-transform: scale(0, 0);
            -o-transition: -o-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
            -webkit-transform: scale(0, 0);
            -webkit-transition: -webkit-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
            background-color: #555555;
            border-radius: 50%;
            content: " ";
            display: inline-block;
            height: 11px;
            left: 3px;
            margin-left: -20px;
            position: absolute;
            top: 3px;
            transform: scale(0, 0);
            transition: transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
            width: 11px;
        }
        .radio input[type="radio"] {
            cursor: pointer;
            opacity: 0;
            z-index: 1;
            outline: none !important;
        }
        .radio input[type="radio"]:disabled + label {
            opacity: 0.65;
        }
        .radio input[type="radio"]:focus + label::before {
            outline-offset: -2px;
            outline: none;
        }
        .radio input[type="radio"]:checked + label::after {
            -ms-transform: scale(1, 1);
            -o-transform: scale(1, 1);
            -webkit-transform: scale(1, 1);
            transform: scale(1, 1);
        }
        .radio input[type="radio"]:disabled + label::before {
            cursor: not-allowed;
        }
        .radio.radio-inline {
            margin-top: 0;
        }
        .radio.radio-single label {
            height: 17px;
        }
        .radio-primary input[type="radio"] + label::after {
            background-color: #04a2b3;
        }
        .radio-primary input[type="radio"]:checked + label::before {
            border-color: #04a2b3;
        }
        .radio-primary input[type="radio"]:checked + label::after {
            background-color: #04a2b3;
        }
        .radio-danger input[type="radio"] + label::after {
            background-color: #e66060;
        }
        .radio-danger input[type="radio"]:checked + label::before {
            border-color: #e66060;
        }
        .radio-danger input[type="radio"]:checked + label::after {
            background-color: #e66060;
        }
        .radio-info input[type="radio"] + label::after {
            background-color: #00a4fe;
        }
        .radio-info input[type="radio"]:checked + label::before {
            border-color: #00a4fe;
        }
        .radio-info input[type="radio"]:checked + label::after {
            background-color: #00a4fe;
        }
        .radio-warning input[type="radio"] + label::after {
            background-color: #ffb600;
        }
        .radio-warning input[type="radio"]:checked + label::before {
            border-color: #ffb600;
        }
        .radio-warning input[type="radio"]:checked + label::after {
            background-color: #ffb600;
        }
        .radio-success input[type="radio"] + label::after {
            background-color: #66d203;
        }
        .radio-success input[type="radio"]:checked + label::before {
            border-color: #66d203;
        }
        .radio-success input[type="radio"]:checked + label::after {
            background-color: #66d203;
        }
        /* ==============
  Progressbars
===================*/
        .progress {
            -webkit-box-shadow: none !important;
            background-color: rgba(245, 245, 245, 0.2);
            box-shadow: none !important;
            height: 10px;
            margin-bottom: 18px;
            overflow: hidden;
        }
        .progress-bar {
            box-shadow: none;
            font-size: 8px;
            font-weight: 600;
            line-height: 12px;
        }
        .progress.progress-sm {
            height: 5px !important;
        }
        .progress.progress-sm .progress-bar {
            font-size: 8px;
            line-height: 5px;
        }
        .progress.progress-md {
            height: 15px !important;
        }
        .progress.progress-md .progress-bar {
            font-size: 10.8px;
            line-height: 14.4px;
        }
        .progress.progress-lg {
            height: 20px !important;
        }
        .progress.progress-lg .progress-bar {
            font-size: 12px;
            line-height: 20px;
        }
        .progress-bar-primary {
            background-color: #04a2b3;
        }
        .progress-bar-success {
            background-color: #66d203;
        }
        .progress-bar-info {
            background-color: #00a4fe;
        }
        .progress-bar-warning {
            background-color: #ffb600;
        }
        .progress-bar-danger {
            background-color: #e66060;
        }
        .progress-bar-dark {
            background-color: #2a323c;
        }
        .progress-bar-purple {
            background-color: #715ded;
        }
        .progress-bar-pink {
            background-color: #e866ff;
        }
        .progress-animated {
            -webkit-animation-duration: 5s;
            -webkit-animation-name: animationProgress;
            -webkit-transition: 5s all;
            animation-duration: 5s;
            animation-name: animationProgress;
            transition: 5s all;
        }
        /* ==============
  Tables
===================*/
        .table {
            margin-bottom: 10px;
        }
        tbody {
            color: #9fa2a7;
        }
        th {
            color: #ffffff;
            font-size: 15px;
        }
        .table > tbody > tr > td,
        .table > tbody > tr > th,
        .table > tfoot > tr > td,
        .table > tfoot > tr > th,
        .table > thead > tr > td,
        .table > thead > tr > th {
            border-top: 1px solid rgba(159, 162, 167, 0.25);
        }
        .table-bordered > tbody > tr > td,
        .table-bordered > tbody > tr > th,
        .table-bordered > tfoot > tr > td,
        .table-bordered > tfoot > tr > th,
        .table-bordered > thead > tr > td,
        .table-bordered > thead > tr > th {
            border: 1px solid rgba(159, 162, 167, 0.25);
        }
        .table-bordered {
            border: 1px solid rgba(159, 162, 167, 0.25);
        }
        .table-striped > tbody > tr:nth-of-type(odd) {
            background-color: #394451;
        }
        .table > thead > tr > th {
            border-bottom: 2px solid rgba(159, 162, 167, 0.35);
        }
        .table-hover > tbody > tr:hover {
            background-color: #3f4b5a;
        }
        table.focus-on tbody tr.focused th {
            background-color: #04a2b3;
            color: #ffffff;
        }
        table.focus-on tbody tr.focused td {
            background-color: #04a2b3;
            color: #ffffff;
        }
        .table-rep-plugin tbody th {
            font-size: 14px;
            font-weight: normal;
        }
        .modal-block {
            background: transparent;
            margin: 40px auto;
            max-width: 600px;
            padding: 0;
            position: relative;
            text-align: left;
        }
        .dt-buttons {
            float: left;
        }
        div#datatable-buttons_info {
            float: left;
        }
        table.dataTable th.focus,
        table.dataTable td.focus {
            outline: 3px solid #04a2b3 !important;
            outline-offset: -1px;
        }
        .fixedHeader-floating {
            top: 70px !important;
        }
        #datatable-editable .actions a {
            padding: 5px;
        }
        #datatable-editable .form-control {
            background-color: #ffffff;
            width: 100%;
        }
        #datatable-editable .fa-trash-o {
            color: #e66060;
        }
        #datatable-editable .fa-times {
            color: #e66060;
        }
        #datatable-editable .fa-pencil {
            color: #29b6f6;
        }
        #datatable-editable .fa-save {
            color: #33b86c;
        }
        #datatable td {
            font-weight: normal;
        }
        div.dataTables_paginate ul.pagination {
            margin-top: 30px;
        }
        div.dataTables_info {
            padding-top: 38px;
        }
        div.DTS tbody tr.even {
            background-color: #3f4b5a;
        }
        .dataTables_scrollBody table {
            border-left: none !important;
        }
        .table-bordered.dataTable > thead > tr > td,
        .table-bordered.dataTable > thead > tr > th {
            border-bottom-width: 1px !important;
        }
        table.dataTable {
            margin-top: 10px !important;
            margin-bottom: 18px !important;
        }
        /* ==============
  Form-elements
===================*/
        .error {
            color: #e66060;
        }
        /* Form validation */
        .parsley-error {
            border-color: #e66060 !important;
        }
        .parsley-errors-list {
            display: none;
            margin: 0;
            padding: 0;
        }
        .parsley-errors-list.filled {
            display: block;
        }
        .parsley-errors-list > li {
            font-size: 12px;
            list-style: none;
            color: #e66060;
            margin-top: 5px;
        }
        /* Bootstrap-touchSpin */
        .bootstrap-touchspin .input-group-btn-vertical .btn {
            padding: 9px 12px;
        }
        .bootstrap-touchspin .input-group-btn-vertical i {
            top: 4px;
            left: 8px;
        }
        /* Summernote */
        .note-editor {
            position: relative;
        }
        .note-editor .btn-default {
            background-color: transparent;
            border-color: transparent !important;
        }
        .note-editor .btn-group-sm > .btn,
        .note-editor .btn-sm {
            padding: 8px 12px !important;
        }
        .note-editor .note-toolbar {
            background-color: #f3f3f3;
            border-bottom: 1px solid #eeeeee;
            margin: 0;
        }
        .note-editor .note-statusbar {
            background-color: #ffffff;
        }
        .note-editor .note-statusbar .note-resizebar {
            border-top: none;
            height: 15px;
            padding-top: 3px;
        }
        .note-editor.note-frame {
            border: 1px solid #eeeeee !important;
        }
        .note-popover .popover .popover-content {
            padding: 5px 0 10px 5px;
        }
        .note-popover .btn-default {
            background-color: transparent;
            border-color: transparent !important;
        }
        .note-popover .btn-group-sm > .btn,
        .note-popover .btn-sm {
            padding: 8px 12px !important;
        }
        .note-toolbar {
            padding: 5px 0 10px 5px;
        }
        .datepicker {
            border: 1px solid #dddddd;
            padding: 8px;
        }
        .datepicker th {
            font-size: 14px !important;
            color: #2a323c;
        }
        #datepicker-inline {
            background-color: #ffffff;
        }
        .search-input {
            margin-bottom: 10px;
        }
        .ms-selectable {
            box-shadow: none;
            outline: none !important;
        }
        .ms-container .ms-list.ms-focus {
            box-shadow: none;
        }
        .ms-container .ms-selectable li.ms-hover {
            background-color: #04a2b3;
        }
        .ms-container .ms-selection li.ms-hover {
            background-color: #04a2b3;
        }
        .spinner-buttons.btn-group-vertical .btn {
            background-color: #eeeeee;
            border: none !important;
            box-shadow: none !important;
            height: 17px;
            line-height: 16px;
            margin: 0;
            padding-left: 6px;
            padding-right: 6px;
            text-align: center;
            width: 22px;
        }
        .spinner-buttons.btn-group-vertical .btn i {
            color: #333333 !important;
            line-height: 10px;
            margin-top: -3px;
        }
        .spinner-buttons.btn-group-vertical .btn:first-child {
            -webkit-border-radius: 0 0px 0 0 !important;
            border-radius: 0 0px 0 0 !important;
        }
        .spinner-buttons.btn-group-vertical .btn:last-child {
            -webkit-border-radius: 0 0 0px !important;
            border-radius: 0 0 0px !important;
        }
        .note-editor {
            border: 1px solid #dddddd;
            position: relative;
        }
        .note-editor .note-toolbar {
            background-color: #f3f3f3;
            border-bottom: 1px solid #dddddd;
            margin: 0;
        }
        .note-editor .note-statusbar {
            background-color: #ffffff;
        }
        .note-editor .note-statusbar .note-resizebar {
            border-top: 1px solid #dddddd;
            height: 15px;
            padding-top: 3px;
        }
        .note-popover .popover .popover-content {
            padding: 5px 0 10px 5px;
        }
        .note-toolbar {
            padding: 5px 0 10px 5px;
        }
        .code-edit-wrap {
            padding: 0px !important;
        }
        .cm-s-ambiance .CodeMirror-linenumber {
            color: #bcbcbc;
        }
        .cm-s-ambiance .CodeMirror-gutters {
            background-color: #212121 !important;
            box-shadow: none;
        }
        .cm-s-ambiance.CodeMirror {
            background-color: #212121 !important;
            box-shadow: none;
        }
        .bootstrap-timepicker-widget table td a:hover {
            background-color: transparent;
            border-color: transparent;
            border-radius: 4px;
            color: #04a2b3;
            text-decoration: none;
        }
        .editor-horizontal .popover-content {
            padding: 9px 30px;
        }
        .datepicker table tr td.active,
        .datepicker table tr td.active:hover,
        .datepicker table tr td.active.disabled,
        .datepicker table tr td.active.disabled:hover {
            background-color: #04a2b3 !important;
            background-image: none;
            box-shadow: none;
        }
        /* Select2 */
        .select2-container .select2-choice {
            background-image: none !important;
            border: none !important;
            height: auto  !important;
            padding: 0px !important;
            line-height: 22px !important;
            background-color: transparent !important;
            box-shadow: none !important;
        }
        .select2-container .select2-choice .select2-arrow {
            background-image: none !important;
            background: transparent;
            border: none;
            width: 14px;
            top: 2px;
            right: 5px;
        }
        .select2-container .select2-container-multi.form-control {
            height: auto;
        }
        .select2-results .select2-highlighted {
            background-color: #04a2b3;
        }
        .select2-drop-active {
            border: 1px solid #e3e3e3 !important;
            padding-top: 5px;
            -webkit-box-shadow: 0 2px 2px rgba(0, 0, 0, 0.15);
            box-shadow: 0 2px 2px rgba(0, 0, 0, 0.15);
            -moz-box-shadow: 0 2px 2px rgba(0, 0, 0, 0.15);
        }
        .select2-search input {
            border: 1px solid #e3e3e3;
        }
        .select2-container-multi {
            width: 100%;
        }
        .select2-container-multi .select2-choices {
            border: 2px solid rgba(255, 255, 255, 0.2) !important;
            box-shadow: none !important;
            background: transparent !important;
            background-image: none  !important;
            -webkit-border-radius: 4px !important;
            border-radius: 4px !important;
            -moz-border-radius: 4px !important;
            background-clip: padding-box !important;
            min-height: 34px;
        }
        .select2-container-multi .select2-choices .select2-search-choice {
            padding: 6px 8px 7px 19px;
            margin: 5px 0 3px 5px;
            background: #eeeeee;
            border: none;
            -webkit-box-shadow: none;
            box-shadow: none;
        }
        .select2-container-multi .select2-choices .select2-search-field input {
            padding: 7px 7px 7px 10px;
            font-family: inherit;
        }
        .select2-container-multi .select2-choices .select2-search-choice-close {
            top: 6px;
        }
        .select2-chosen {
            line-height: 34px;
            padding-left: 15px;
            color: #444444;
        }
        /* Timepiker */
        .bootstrap-timepicker-widget table td input {
            border: none;
        }
        /* Dropzone */
        .dropzone {
            min-height: 230px;
            border: 2px dashed #4a5869;
            background: #2a323c;
            border-radius: 6px;
        }
        .dropzone .dz-message {
            font-size: 30px;
        }
        /* ==============
  Calendar
===================*/
        .calendar {
            float: left;
            margin-bottom: 0px;
        }
        .none-border .modal-footer {
            border-top: none;
        }
        .fc-toolbar {
            margin-bottom: 5px;
        }
        .fc-toolbar h2 {
            font-size: 18px;
            font-weight: 600;
            line-height: 30px;
            text-transform: uppercase;
        }
        .fc-day {
            background: #2a323c;
        }
        .fc-unthemed .fc-content,
        .fc-unthemed .fc-divider,
        .fc-unthemed .fc-popover,
        .fc-unthemed .fc-row,
        .fc-unthemed tbody,
        .fc-unthemed td,
        .fc-unthemed th,
        .fc-unthemed thead {
            border-color: #3f4b5a;
        }
        .fc-toolbar .fc-state-active,
        .fc-toolbar .ui-state-active,
        .fc-toolbar button:focus,
        .fc-toolbar button:hover,
        .fc-toolbar .ui-state-hover {
            z-index: 0;
        }
        .fc-widget-header {
            border: 1px solid #9fa2a7;
        }
        .fc-widget-content {
            border: 1px solid #9fa2a7;
        }
        .fc th.fc-widget-header {
            background: #3f4b5a;
            font-size: 14px;
            line-height: 20px;
            padding: 10px 0;
            text-transform: uppercase;
        }
        .fc-button {
            background: #3f4b5a;
            border: 1px solid #3f4b5a;
            color: #ffffff;
            text-transform: capitalize;
        }
        .fc-button:hover {
            background: #353f4b;
        }
        .fc-text-arrow {
            font-size: 16px;
        }
        .fc-state-hover {
            background: #F5F5F5;
        }
        .fc-state-highlight {
            background: #f0f0f0;
        }
        .fc-cell-overlay {
            background: #f0f0f0;
        }
        .fc-unthemed .fc-today {
            background: #3f4b5a;
        }
        .fc-event {
            border-radius: 2px;
            border: none;
            cursor: move;
            font-size: 13px;
            margin: 5px 7px;
            padding: 5px 5px;
            text-align: center;
            background-color: #04a2b3;
        }
        .external-event {
            color: #ffffff;
            cursor: move;
            margin: 10px 0;
            padding: 6px 10px;
        }
        .fc-basic-view td.fc-week-number span {
            padding-right: 5px;
        }
        .fc-basic-view td.fc-day-number {
            padding-right: 5px;
        }
        /* ==============
  Widgets
===================*/
        .widget-chart li {
            width: 31.5%;
            display: inline-block;
            padding: 0;
        }
        .widget-chart li i {
            font-size: 22px;
        }
        .morris-hover.morris-default-style {
            background-color: #ffffff;
            border-radius: 3px;
        }
        .legend div:first-of-type {
            background-color: transparent !important;
        }
        /*
File: Pages
*/
        /*
  - Sweet Alerts
  - Maps
  - Email
  - Timeline
  - Charts
  - Count Down
  - Gallery
  - Maintenance
  - Account Pages
*/
        /* =========== */
        /* Sweet Alert */
        /* =========== */
        .sweet-alert h2 {
            font-size: 24px;
            position: relative;
            color: #2a323c;
        }
        .sweet-alert p {
            font-size: 14px;
            line-height: 22px;
        }
        .sweet-alert .icon.success .placeholder {
            border: 4px solid rgba(102, 210, 3, 0.3);
        }
        .sweet-alert .icon.success .line {
            background-color: #66d203;
        }
        .sweet-alert .icon.warning {
            border-color: #ffb600;
        }
        .sweet-alert .icon.info {
            border-color: #00a4fe;
        }
        .sweet-alert .btn-warning:focus,
        .sweet-alert .btn-info:focus,
        .sweet-alert .btn-success:focus,
        .sweet-alert .btn-danger:focus,
        .sweet-alert .btn-default:focus {
            box-shadow: none;
        }
        .sweet-alert .btn-lg {
            font-size: 15px !important;
            padding: 6px 14px !important;
        }
        .sweet-alert .icon.error {
            border-color: #e66060;
        }
        .sweet-alert .icon.error .line {
            background-color: #e66060;
        }
        .sweet-alert .icon.warning .body,
        .sweet-alert .icon.warning .dot {
            background-color: #ffb600;
        }
        /* ==============
  Timeline
===================*/
        .cd-container {
            width: 90%;
            max-width: 1170px;
            margin: 0 auto;
        }
        .cd-container::after {
            content: '';
            display: table;
            clear: both;
        }
        #cd-timeline {
            margin-bottom: 2em;
            margin-top: 2em;
            padding: 2em 0;
            position: relative;
        }
        #cd-timeline::before {
            background: #fafafa;
            content: '';
            height: 100%;
            left: 18px;
            position: absolute;
            top: 0;
            width: 4px;
        }
        @media only screen and (min-width: 1170px) {
            #cd-timeline {
                margin-bottom: 3em;
                margin-top: 3em;
            }
            #cd-timeline::before {
                left: 50%;
                margin-left: -2px;
            }
        }
        .cd-timeline-block {
            margin: 2em 0;
            position: relative;
        }
        .cd-timeline-block:after {
            clear: both;
            content: "";
            display: table;
        }
        .cd-timeline-block:first-child {
            margin-top: 0;
        }
        .cd-timeline-block:last-child {
            margin-bottom: 0;
        }
        @media only screen and (min-width: 1170px) {
            .cd-timeline-block {
                margin: 4em 0;
            }
            .cd-timeline-block:first-child {
                margin-top: 0;
            }
            .cd-timeline-block:last-child {
                margin-bottom: 0;
            }
        }
        .cd-timeline-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            box-shadow: 0 0 0 4px white, inset 0 2px 0 rgba(0, 0, 0, 0.08), 0 3px 0 4px rgba(0, 0, 0, 0.05);
            text-align: center;
            line-height: 40px;
            font-size: 20px;
            color: #fff;
        }
        .cd-timeline-img.cd-success {
            background: #66d203;
        }
        .cd-timeline-img.cd-info {
            background: #00a4fe;
        }
        .cd-timeline-img.cd-pink {
            background: #e866ff;
        }
        .cd-timeline-img.cd-danger {
            background: #e66060;
        }
        .cd-timeline-img.cd-primary {
            background: #04a2b3;
        }
        .cd-timeline-img.cd-warning {
            background: #ffb600;
        }
        @media only screen and (min-width: 1170px) {
            .cd-timeline-img {
                width: 60px;
                height: 60px;
                line-height: 60px;
                left: 50%;
                margin-left: -30px;
                -webkit-transform: translateZ(0);
                -webkit-backface-visibility: hidden;
            }
            .cssanimations .cd-timeline-img.is-hidden {
                visibility: hidden;
            }
            .cssanimations .cd-timeline-img.bounce-in {
                visibility: visible;
                -webkit-animation: cd-bounce-1 0.6s;
                -moz-animation: cd-bounce-1 0.6s;
                animation: cd-bounce-1 0.6s;
            }
        }
        .cd-timeline-content {
            -moz-box-shadow: 0 5px 5px -5px rgba(0, 0, 0, 0.1);
            -webkit-box-shadow: 0 5px 5px -5px rgba(0, 0, 0, 0.1);
            background: #3f4b5a;
            border-radius: 0;
            box-shadow: 0 5px 5px -5px rgba(0, 0, 0, 0.1);
            margin-left: 60px;
            padding: 1em;
            position: relative;
        }
        .cd-timeline-content img {
            display: block;
            width: 100%;
        }
        .cd-timeline-content:after {
            clear: both;
            content: "";
            display: table;
        }
        .cd-timeline-content h2 {
            margin-top: 0;
        }
        .cd-timeline-content p {
            color: #9fa2a7;
            font-size: 14px;
            margin: 10px 0px 10px 0px;
        }
        .cd-timeline-content .cd-read-more {
            background: #acb7c0;
            border-radius: 0.25em;
            color: white;
            display: inline-block;
            float: right;
            font-size: 14px;
            padding: .8em 1em;
        }
        .cd-timeline-content .cd-date {
            display: inline-block;
            font-size: 14px;
        }
        .cd-timeline-content h3 {
            font-size: 21px;
            margin: 0px;
        }
        .no-touch .cd-timeline-content .cd-read-more:hover {
            background-color: #bac4cb;
        }
        .cd-timeline-content .cd-date {
            float: left;
            padding: .8em 0;
            opacity: .7;
        }
        .cd-timeline-content::before {
            content: '';
            position: absolute;
            top: 16px;
            right: 100%;
            height: 0;
            width: 0;
            border: 12px solid transparent;
            border-right: 12px solid #3f4b5a;
        }
        @media only screen and (min-width: 1170px) {
            .cd-timeline-content {
                margin-left: 0;
                padding: 1.6em;
                width: 45%;
            }
            .cd-timeline-content::before {
                top: 24px;
                left: 100%;
                border-color: transparent;
                border-left-color: #3f4b5a;
            }
            .cd-timeline-content .cd-read-more {
                float: left;
            }
            .cd-timeline-content .cd-date {
                position: absolute;
                width: 100%;
                left: 122%;
                top: 6px;
            }
            .cd-timeline-block:nth-child(even) .cd-timeline-content {
                float: right;
            }
            .cd-timeline-block:nth-child(even) .cd-timeline-content::before {
                top: 24px;
                left: auto;
                right: 100%;
                border-color: transparent;
                border-right-color: #3f4b5a;
            }
            .cd-timeline-block:nth-child(even) .cd-timeline-content .cd-read-more {
                float: right;
            }
            .cd-timeline-block:nth-child(even) .cd-timeline-content .cd-date {
                left: auto;
                right: 122%;
                text-align: right;
            }
            .cssanimations .cd-timeline-content.is-hidden {
                visibility: hidden;
            }
            .cssanimations .cd-timeline-content.bounce-in {
                visibility: visible;
                -webkit-animation: cd-bounce-2 0.6s;
                -moz-animation: cd-bounce-2 0.6s;
                animation: cd-bounce-2 0.6s;
            }
        }
        @media only screen and (min-width: 1170px) {
            .cssanimations .cd-timeline-block:nth-child(even) .cd-timeline-content.bounce-in {
                -webkit-animation: cd-bounce-2-inverse 0.6s;
                -moz-animation: cd-bounce-2-inverse 0.6s;
                animation: cd-bounce-2-inverse 0.6s;
            }
        }
        /* ==============
  Charts
===================*/
        .jqstooltip {
            -webkit-box-sizing: content-box;
            -moz-box-sizing: content-box;
            box-sizing: content-box;
        }
        .chart {
            position: relative;
            display: inline-block;
            width: 110px;
            height: 110px;
            margin-top: 20px;
            margin-bottom: 20px;
            text-align: center;
        }
        .chart canvas {
            position: absolute;
            top: 0;
            left: 0;
        }
        .chart.chart-widget-pie {
            margin-top: 5px;
            margin-bottom: 5px;
        }
        .percent {
            display: inline-block;
            line-height: 110px;
            z-index: 2;
        }
        .percent:after {
            content: '%';
            margin-left: 0.1em;
            font-size: .8em;
        }
        #flotTip {
            padding: 4px 8px;
            background-color: #000000;
            z-index: 100;
            color: #ffffff;
            opacity: .7;
            font-size: 12px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }
        /* ==============
  Email
===================*/
        .mails a {
            color: #444444;
        }
        .mails .checkbox {
            margin-bottom: 0px;
            margin-top: 0px;
            vertical-align: middle;
        }
        .mails .checkbox label {
            min-height: 16px;
        }
        /* ==============
  Count Down
===================*/
        .home-wrapper {
            margin: 10% 0px;
        }
        .home-text {
            font-family: 'Nunito', sans-serif;
        }
        .lj-countdown {
            color: #04a2b3;
            margin-top: 40px;
            text-align: center;
        }
        .lj-countdown div {
            display: inline-block;
        }
        .lj-countdown div span {
            display: block;
            width: 150px;
        }
        .lj-countdown div span:first-child {
            font-size: 3em;
            font-weight: 700;
            height: 48px;
            line-height: 48px;
        }
        .lj-countdown div span:last-child {
            color: #333333;
            font-size: 0.9em;
            height: 25px;
            line-height: 25px;
        }
        .lj-countdown > * {
            text-align: center;
        }
        /* ==============
  Gallery
===================*/
        .portfolioFilter a {
            -moz-box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.1);
            -moz-transition: all 0.3s ease-out;
            -ms-transition: all 0.3s ease-out;
            -o-transition: all 0.3s ease-out;
            -webkit-box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.1);
            -webkit-transition: all 0.3s ease-out;
            box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.1);
            color: #333333;
            padding: 5px 10px;
            transition: all 0.3s ease-out;
        }
        .portfolioFilter a:hover {
            background-color: #04a2b3;
            color: #ffffff;
        }
        .portfolioFilter a.current {
            background-color: #04a2b3;
            color: #ffffff;
        }
        .thumb {
            background-color: #ffffff;
            border-radius: 3px;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);
            margin-top: 30px;
            padding-bottom: 10px;
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 10px;
            width: 100%;
        }
        .thumb-img {
            border-radius: 2px;
            overflow: hidden;
            width: 100%;
        }
        .gal-detail h4 {
            margin-top: 16px;
        }
        /* ==============
  Maintenance
===================*/
        .icon-main {
            font-size: 88px;
            margin-bottom: 50px;
        }
        .maintenance-page {
            margin: 10% 0%;
        }
        .mainten-box {
            margin-bottom: 30px;
        }
        .mainten-box .text-m-mode {
            margin: 0px auto;
            width: 80%;
        }
        .media-main a.pull-left {
            width: 100px;
        }
        .media-main .info {
            color: #2a323c;
            overflow: hidden;
        }
        .media-main .info h4 {
            margin-bottom: 5px;
        }
        .user-card p.info-text {
            line-height: 26px;
            margin-top: 15px;
        }
        /* ==============
  Maps
===================*/
        .gmaps,
        .gmaps-panaroma {
            height: 300px;
            background: #eeeeee;
            border-radius: 3px;
        }
        .gmaps-overlay {
            display: block;
            text-align: center;
            color: #ffffff;
            font-size: 16px;
            line-height: 40px;
            background: #04a2b3;
            border-radius: 4px;
            padding: 10px 20px;
        }
        .gmaps-overlay_arrow {
            left: 50%;
            margin-left: -16px;
            width: 0;
            height: 0;
            position: absolute;
        }
        .gmaps-overlay_arrow.above {
            bottom: -15px;
            border-left: 16px solid transparent;
            border-right: 16px solid transparent;
            border-top: 16px solid #04a2b3;
        }
        .gmaps-overlay_arrow.below {
            top: -15px;
            border-left: 16px solid transparent;
            border-right: 16px solid transparent;
            border-bottom: 16px solid #04a2b3;
        }
        /* ==============
  Account Pages
===================*/
        .accountbg {
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0;
        }
        .wrapper-page {
            margin: 7.5% auto;
            width: 420px;
            position: relative;
        }
        .panel-pages .logo-admin {
            font-size: 28px;
        }
        .panel-pages .panel-body {
            padding: 25px 30px;
        }
        .panel-pages .panel-heading {
            -moz-border-radius: 6px 6px 0 0;
            -webkit-border-radius: 6px 6px 0 0;
            border-radius: 6px 6px 0 0;
            padding: 40px 20px;
            position: relative;
        }
        .panel-pages .panel-heading h3 {
            position: relative;
            z-index: 999;
        }
        .panel-pages a.text-muted:hover {
            color: #04a2b3;
        }
        .user-thumb {
            position: relative;
            z-index: 999;
        }
        .user-thumb img {
            height: 88px;
            margin: 0 auto;
            width: 88px;
        }
        .ex-page-content h1 {
            font-size: 98px;
            font-weight: 700;
            line-height: 150px;
            text-shadow: rgba(61, 61, 61, 0.3) 1px 1px, rgba(61, 61, 61, 0.2) 2px 2px, rgba(61, 61, 61, 0.3) 3px 3px;
        }
        /* ==== =====
Invoice
============= */
        .table > thead > tr > .no-line {
            border-bottom: none;
        }
        .table > tbody > tr > .no-line {
            border-top: none;
        }
        .table > tbody > tr > .thick-line {
            border-top: 2px solid;
        }
        /*
File: Menu
*/
        .topbar {
            background: #ffffff;
            left: 0;
            position: fixed;
            right: 0;
            top: 0;
            z-index: 999;
        }
        .topbar .topbar-left {
            background-color: #ffffff;
            float: left;
            height: 70px;
            position: relative;
            width: 240px;
            z-index: 1;
        }
        .logo img,
        .logo-sm img {
            height: 28px;
        }
        .logo,
        .logo-sm {
            color: #2a323c !important;
            font-size: 20px;
            font-weight: 700;
            letter-spacing: .03em;
            line-height: 70px;
        }
        .logo span,
        .logo-sm span {
            color: #04a2b3;
            font-family: 'Crete Round', serif;
        }
        .logo-sm {
            display: none;
        }
        .logo-sm span {
            background-color: #eee;
            height: 44px;
            width: 44px;
            display: block;
            line-height: 44px;
            margin-top: 13px;
        }
        .navbar-default {
            background-color: #2a323c;
            border-radius: 0px;
            border: none;
            margin-bottom: 0px;
        }
        .navbar-default .navbar-nav > .open > a {
            background-color: rgba(255, 255, 255, 0.1);
        }
        .navbar-default .navbar-nav > .open > a:focus {
            background-color: rgba(255, 255, 255, 0.1);
        }
        .navbar-default .navbar-nav > .open > a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        .nav > li > a {
            color: #ffffff !important;
            padding: 0px 15px;
            position: relative;
        }
        .nav > li > a i {
            font-size: 20px;
        }
        .nav > li > a .badge {
            position: absolute;
            right: 8px;
            top: 7px;
            display: block;
            height: 7px;
            width: 7px;
            padding: 0;
            min-width: 1px;
        }
        .profile {
            padding-top: 17px !important;
            padding-bottom: 12px !important;
        }
        .profile img {
            border: 2px solid #edf0f0;
            height: 36px;
            width: 36px;
            float: left;
        }
        .profile .profile-username {
            margin-left: 45px;
            display: block;
        }
        .dropdown-menu-lg {
            width: 270px;
        }
        .dropdown-menu-lg .list-group {
            margin-bottom: 0;
        }
        .dropdown-menu-lg .list-group-item {
            padding: 10px 20px;
            border-left: 0;
            border-right: 0;
        }
        .dropdown-menu-lg .list-group-item:last-child {
            border-bottom: none;
        }
        .dropdown-menu-lg .media p {
            color: #9fa2a7;
        }
        .dropdown-menu-lg .media-heading,
        .dropdown-menu-lg p {
            margin-bottom: 0;
            text-overflow: ellipsis;
            white-space: nowrap;
            display: block;
            width: 100%;
            font-weight: normal;
            overflow: hidden;
        }
        .notifi-title {
            color: #ffffff;
            font-size: 16px;
            font-weight: 400;
            padding: 10px 0 10px;
            margin-top: -5px;
            background-color: #04a2b3;
        }
        .notifi-title .badge-success {
            background-color: rgba(255, 255, 255, 0.5);
            color: #2a323c;
            font-weight: bold;
            margin-left: 5px;
        }
        .navbar-form {
            border: none;
            box-shadow: none;
            padding: 0;
        }
        .search-bar {
            background-color: rgba(255, 255, 255, 0.1) !important;
            border: 2px solid rgba(255, 255, 255, 0.15) !important;
            box-shadow: none !important;
            color: #ffffff;
            font-size: 14px;
            height: 42px;
            margin-top: 6px;
            margin-left: 15px;
            border-radius: 5px;
            padding-left: 20px;
        }
        .search-bar:focus {
            border: 2px solid rgba(255, 255, 255, 0.3) !important;
        }
        .btn-search {
            display: none;
        }
        input.search-bar::-webkit-input-placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        input.search-bar:-moz-placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        input.search-bar::-moz-placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        input.search-bar:-ms-input-placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        .navbar-nav {
            margin: 0;
        }
        .side-menu {
            bottom: 0;
            top: 0;
            width: 240px;
            z-index: 2;
        }
        .side-menu.left {
            background: #ffffff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15);
            position: absolute;
            top: 70px;
            z-index: 99;
        }
        body.fixed-left .side-menu.left {
            bottom: 50px;
            height: 100%;
            margin-bottom: -70px;
            margin-top: 0px;
            padding-bottom: 70px;
            position: fixed;
        }
        .content-page {
            margin-left: 240px;
            overflow: hidden;
        }
        .content-page > .content {
            margin-bottom: 60px;
            margin-top: 70px;
            padding: 20px 5px 15px 5px;
        }
        .button-menu-mobile {
            background: #323c48;
            border: none;
            color: rgba(255, 255, 255, 0.8);
            font-size: 28px;
            height: 42px;
            width: 42px;
            border-radius: 3px;
            margin-top: 14px;
            margin-left: 15px;
        }
        .button-menu-mobile:hover {
            color: #ffffff;
        }
        .sidebar-inner {
            height: 100%;
        }
        #sidebar-menu,
        #sidebar-menu ul,
        #sidebar-menu li,
        #sidebar-menu a {
            border: 0;
            font-weight: normal;
            line-height: 1;
            list-style: none;
            margin: 0;
            padding: 0;
            position: relative;
            text-decoration: none;
        }
        .noti-list-box .list-group-item {
            background-color: #ffffff !important;
        }
        .noti-list-box .list-group-item:hover {
            background-color: #f2f2f2 !important;
        }
        .notification-icon-box {
            height: 36px;
            width: 36px;
            padding: 0 !important;
            border: 2px solid rgba(255, 255, 255, 0.5) !important;
            line-height: 35px !important;
            text-align: center;
            border-radius: 50%;
            margin: 17px 5px;
        }
        .notification-icon-box i {
            font-size: 16px !important;
        }
        #sidebar-menu {
            background-color: #ffffff;
            padding-bottom: 50px;
            width: 100%;
        }
        #sidebar-menu a {
            line-height: 1.3;
        }
        #sidebar-menu .badge {
            margin-top: 4px;
        }
        #sidebar-menu ul ul {
            display: none;
        }
        #sidebar-menu ul ul li {
            border-top: 0;
        }
        #sidebar-menu ul ul li.active a {
            color: #2a323c;
        }
        #sidebar-menu ul ul a {
            color: rgba(42, 50, 60, 0.8);
            display: block;
            padding: 10px 25px 10px 65px;
        }
        #sidebar-menu ul ul a:hover {
            color: #2a323c;
        }
        #sidebar-menu ul ul a i {
            margin-right: 5px;
        }
        #sidebar-menu ul ul ul a {
            padding-left: 80px;
        }
        #sidebar-menu > ul > li > a {
            color: #2a323c;
            display: block;
            padding: 15px 25px;
            background-color: #ffffff;
            font-size: 15px;
            height: 50px !important;
        }
        #sidebar-menu > ul > li > a:hover {
            background-color: #f2f2f2;
            text-decoration: none;
        }
        #sidebar-menu > ul > li > a > span {
            vertical-align: middle;
        }
        #sidebar-menu > ul > li > a > i {
            display: inline-block;
            font-size: 18px;
            line-height: 17px;
            margin-left: 3px;
            margin-right: 10px;
            text-align: center;
            vertical-align: middle;
            width: 20px;
            color: #4a5869;
        }
        #sidebar-menu > ul > li > a > i.i-right {
            float: right;
            margin: 3px 0 0 0;
        }
        #sidebar-menu > ul > li > a.active {
            color: #ffffff !important;
            background-color: #04a2b3 !important;
        }
        #sidebar-menu > ul > li > a.active i {
            color: #ffffff;
        }
        #sidebar-menu > ul > li > a.active .badge-primary {
            background-color: #05b9cc;
        }
        .subdrop {
            background: #f2f2f2 !important;
        }
        .menu-title {
            padding: 12px 25px !important;
            letter-spacing: .035em;
            pointer-events: none;
            cursor: default;
            font-size: 13px;
        }
        #wrapper.enlarged .menu-title {
            display: none;
        }
        #wrapper.enlarged #sidebar-menu ul ul {
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        }
        #wrapper.enlarged .left.side-menu {
            padding-top: 0;
            width: 70px;
            z-index: 5;
        }
        #wrapper.enlarged .left.side-menu #sidebar-menu > ul > li > a i {
            margin-right: 20px !important;
            margin-left: 0 !important;
            font-size: 22px;
        }
        #wrapper.enlarged .left.side-menu span.pull-right {
            display: none !important;
        }
        #wrapper.enlarged .left.side-menu #sidebar-menu ul > li {
            position: relative;
            white-space: nowrap;
        }
        #wrapper.enlarged .left.side-menu #sidebar-menu ul > li:hover > a {
            position: relative;
            width: 260px;
            background-color: #f2f2f2;
        }
        #wrapper.enlarged .left.side-menu #sidebar-menu ul > li:hover > ul {
            display: block;
            left: 70px;
            position: absolute;
            width: 190px;
        }
        #wrapper.enlarged .left.side-menu #sidebar-menu ul > li:hover > ul a {
            background: #ffffff;
            border: none;
            box-shadow: none;
            padding-left: 15px;
            position: relative;
            width: 190px;
            z-index: 6;
        }
        #wrapper.enlarged .left.side-menu #sidebar-menu ul > li:hover > ul a:hover {
            color: #2a323c;
        }
        #wrapper.enlarged .left.side-menu #sidebar-menu ul > li:hover a span {
            display: inline;
        }
        #wrapper.enlarged .left.side-menu #sidebar-menu ul > li > ul {
            display: none;
        }
        #wrapper.enlarged .left.side-menu #sidebar-menu ul ul li:hover > ul {
            display: block;
            left: 190px;
            margin-top: -36px;
            position: absolute;
            width: 190px;
        }
        #wrapper.enlarged .left.side-menu #sidebar-menu ul ul li > a span.pull-right {
            -ms-transform: rotate(270deg);
            -webkit-transform: rotate(270deg);
            position: absolute;
            right: 20px;
            top: 12px;
            transform: rotate(270deg);
        }
        #wrapper.enlarged .left.side-menu #sidebar-menu ul ul li.active a {
            color: #2a323c;
        }
        #wrapper.enlarged .left.side-menu #sidebar-menu ul > li > a span {
            display: none;
            padding-left: 10px;
        }
        #wrapper.enlarged .left.side-menu .user-details {
            display: none;
        }
        #wrapper.enlarged .content-page {
            margin-left: 70px;
        }
        #wrapper.enlarged .topbar .topbar-left {
            width: 70px !important;
        }
        #wrapper.enlarged .topbar .topbar-left .logo {
            display: none;
            opacity: 0;
        }
        #wrapper.enlarged .topbar .topbar-left .logo-sm {
            display: inline-block;
        }
        #wrapper.enlarged .footer {
            left: 70px;
        }
        .user-details {
            min-height: 80px;
            padding: 20px;
            position: relative;
        }
        .user-details img {
            position: relative;
            z-index: 9999;
        }
        .user-details .user-info {
            color: #444444;
            margin-left: 60px;
            position: relative;
            z-index: 99999;
        }
        .user-details .user-info a.dropdown-toggle {
            color: #2a323c;
            display: block;
            font-size: 16px;
            font-weight: 600;
            padding-top: 5px;
        }
        #wrapper.right-bar-enabled .right-bar {
            right: 0;
        }
        #wrapper.right-bar-enabled .left-layout {
            left: 0;
        }
        .side-bar.right-bar {
            float: right !important;
            right: -266px;
            top: 70px;
        }
        .side-bar {
            -moz-transition: all 200ms ease-out;
            -webkit-transition: all 200ms ease-out;
            background-color: #ffffff;
            box-shadow: 0px 0px 8px 1px rgba(0, 0, 0, 0.1);
            display: block;
            float: left;
            height: 100%;
            overflow-y: auto;
            position: fixed;
            transition: all 200ms ease-out;
            width: 240px;
        }
        .right-bar {
            background: #ffffff !important;
            z-index: 99 !important;
        }
        .right-bar h4 {
            border-bottom: 1px solid #eeeeee;
            padding-bottom: 10px;
        }
        .contact-list {
            max-height: 600px;
        }
        .contact-list .list-group-item {
            border: none;
        }
        .contact-list .list-group-item:hover {
            background: #f5f5f5;
        }
        .contact-list i.offline {
            color: #e66060;
        }
        .contact-list i.away {
            color: #ffb600;
        }
        .page-header-title {
            background-color: #2a323c;
            margin: -20px -5px 23px -5px;
            padding: 10px 15px 100px 20px;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
        }
        .page-header-title .breadcrumb {
            margin-bottom: 0;
        }
        .page-header-title .page-title {
            margin-bottom: 12px;
            color: #ffffff;
            font-size: 22px;
        }
        .page-content-wrapper {
            margin-top: -100px;
        }
        body.fixed-left-void {
            min-height: 1024px;
        }
        .small-menu .side-menu,
        .small-menu .topbar-left {
            width: 190px;
        }
        .small-menu .side-menu .badge,
        .small-menu .topbar-left .badge {
            display: none;
        }
        .small-menu #sidebar-menu > ul > li > a {
            height: auto !important;
            text-align: center;
        }
        .small-menu #sidebar-menu > ul > li > a > i {
            font-size: 24px;
            line-height: 26px;
            display: block;
            width: auto;
            margin: 0;
        }
        .small-menu #sidebar-menu > ul > li > a > span.pull-right {
            display: none !important;
        }
        .small-menu #sidebar-menu ul ul a {
            padding: 10px;
            text-align: center;
        }
        .small-menu .content-page {
            margin-left: 190px;
        }
        .small-menu #wrapper.enlarged .left.side-menu #sidebar-menu > ul > li > a {
            text-align: left;
            height: 50px !important;
        }
        .small-menu #wrapper.enlarged .left.side-menu #sidebar-menu ul ul a {
            text-align: left;
        }
        .small-menu #wrapper.enlarged .left.side-menu #sidebar-menu > ul > li > a i {
            margin-right: 20px !important;
            margin-left: 0 !important;
            font-size: 22px;
            display: inline-block;
            line-height: 17px;
            text-align: center;
            vertical-align: middle;
            width: 20px;
        }
        .layout2 .topbar-left,
        .layout2 .navbar-default {
            background-color: #04a2b3;
        }
        .layout2 .topbar-left .logo,
        .layout2 .navbar-default .logo,
        .layout2 .topbar-left .logo-sm,
        .layout2 .navbar-default .logo-sm {
            color: #ffffff !important;
        }
        .layout2 .page-header-title {
            background-color: transparent;
            box-shadow: none;
            padding: 10px 15px 85px 20px;
        }
        /*
File: Responsive
*/
        @media only screen and (max-width: 6000px) and (min-width: 700px) {
            .wrapper.right-bar-enabled .right-bar {
                right: 0;
                z-index: 99;
            }
        }
        @media (min-width: 768px) and (max-width: 991px) {
            body {
                overflow-x: hidden;
            }
            .search-bar {
                display: none !important;
            }
        }
        @media (max-width: 767px) {
            body {
                overflow-x: hidden;
            }
            .content-page {
                margin-left: 0 !important;
            }
            .enlarged .left.side-menu {
                margin-left: -75px;
            }
            .mobile-sidebar {
                left: 0;
            }
            .mobile-content {
                left: 250px;
                right: -250px;
            }
            .wrapper-page {
                width: 90%;
            }
            .navbar-nav .open .dropdown-menu {
                background-color: #ffffff;
                box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
                left: auto;
                position: absolute;
                right: 0;
            }
            .footer {
                left: 0 !important;
            }
        }
        @media (max-width: 620px) {
            .topbar-left {
                width: 70px !important;
            }
            .logo {
                display: none !important;
            }
            .logo-sm {
                display: inline-block !important;
            }
            .page-header-title {
                text-align: center;
                padding: 10px 15px 88px 20px;
            }
        }
        @media (max-width: 480px) {
            .side-menu {
                z-index: 10 !important;
            }
            .button-menu-mobile {
                display: block;
            }
            .search-bar {
                display: none !important;
            }
        }
        @media (max-width: 420px) {
            .hide-phone {
                display: none !important;
            }
        }
    </style>
</head>
<body>
<div class="accountbg"></div>
<div class="wrapper-page">
    <div class="ex-page-content text-center"><h1 class="text-white">401!</h1>
        <h2 class="text-white">Sorry, page not found</h2>
        <br>
        <a class="btn btn-info waves-effect waves-light" href="{{ url()->previous() }}">Back to Dashboard</a>
    </div>
</div>

</body>
</html>