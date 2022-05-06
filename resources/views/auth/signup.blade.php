@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>

    <style type="text/css">
        body {
            font-family: 'Karla', sans-serif;
        }

        .pricing-table-subtitle {
            margin-top: 68px;
            font-weight: normal;
        }

        .pricing-table-title {
            font-weight: bold;
            margin-bottom: 68px;
        }

        .pricing-card {
            border: none;
            border-radius: 10px;
            margin-bottom: 40px;
            text-align: center;
            -webkit-transition: all 0.6s;
            transition: all 0.6s;
        }

        .pricing-card:hover {
            box-shadow: 0 2px 40px 0 rgba(205, 205, 205, 0.55);
        }

        .pricing-card.pricing-card-highlighted {
            box-shadow: 0 2px 40px 0 rgba(205, 205, 205, 0.55);
        }

        .pricing-card:hover {
            box-shadow: 0 2px 40px 0 rgba(205, 205, 205, 0.55);
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px);
        }

        .pricing-card .card-body {
            padding-top: 55px;
            padding-bottom: 62px;
        }

        .pricing-plan-title {
            font-size: 20px;
            color: #000;
            margin-bottom: 11px;
            font-weight: normal;
        }

        .pricing-plan-cost {
            font-size: 50px;
            color: #000;
            font-weight: bold;
            margin-bottom: 29px;
        }

        .pricing-plan-icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            font-size: 40px;
            line-height: 1;
            margin-bottom: 24px;
        }

        .pricing-plan-basic .pricing-plan-icon {
            color: #fe397a;
        }

        .pricing-plan-pro .pricing-plan-icon {
            color: #10bb87;
        }

        .pricing-plan-enterprise .pricing-plan-icon {
            color: #5d78ff;
        }

        .pricing-plan-features {
            list-style: none;
            padding-left: 0;
            font-size: 14px;
            line-height: 2.14;
            margin-bottom: 35px;
            color: #303132;
        }

        .pricing-plan-purchase-btn {
            color: #000;
            font-size: 16px;
            font-weight: bold;
            width: 145px;
            height: 45px;
            border-radius: 22.5px;
            -webkit-transition: all 0.4s;
            transition: all 0.4s;
            position: relative;
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            margin-left: auto;
            margin-right: auto;
            -webkit-box-pack: center;
            justify-content: center;
        }

        .pricing-plan-basic .pricing-plan-purchase-btn {
            background-color: #fe397a;
            color: #fff;
        }

        .pricing-plan-basic .pricing-plan-purchase-btn:hover {
            box-shadow: 0 3px 0 0 #b7013d;
        }

        .pricing-plan-basic .pricing-plan-purchase-btn:active {
            -webkit-transform: translateY(3px);
            transform: translateY(3px);
            box-shadow: none;
        }

        .pricing-plan-pro .pricing-plan-purchase-btn {
            background-color: #10bb87;
            color: #fff;
        }

        .pricing-plan-pro .pricing-plan-purchase-btn:hover {
            box-shadow: 0 3px 0 0 #0a7554;
        }

        .pricing-plan-pro .pricing-plan-purchase-btn:active {
            -webkit-transform: translateY(3px);
            transform: translateY(3px);
            box-shadow: none;
        }

        .pricing-plan-enterprise .pricing-plan-purchase-btn {
            background-color: #5d78ff;
            color: #fff;
        }

        .pricing-plan-enterprise .pricing-plan-purchase-btn:hover {
            box-shadow: 0 3px 0 0 #1138ff;
        }

        .pricing-plan-enterprise .pricing-plan-purchase-btn:active {
            -webkit-transform: translateY(3px);
            transform: translateY(3px);
            box-shadow: none;
        }

        /*# sourceMappingURL=pricing-plan.css.map */

        /**
         * The CSS shown here will not be introduced in the Quickstart guide, but shows
         * how you can use CSS to style your Element's container.
         */
        .StripeElement {
            box-sizing: border-box;

            height: 40px;

            padding: 10px 12px;

            border: 1px solid #ced4da;
            border-radius: 4px;
            background-color: white;

            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }

        .help-block {
            color: #fe397a;
        }

        #global-loader {
            position: fixed;
            z-index: 50000;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            background: #fff;
            margin: 0 auto;
            text-align: center;
        }
    </style>

    <div class="container">
        <!---Global-loader-->
        <div id="global-loader">
            <img src="{{ asset('public') }}/backend/assets/images/svgs/loader.svg" alt="loader">
        </div>
        <!---/Global-loader-->
        <main>
            <div class="container">
                {{-- <h5 class="text-center pricing-table-subtitle">We can scale with you from startup to enterprise, We can halp </h5> --}}
                <h1 class="text-center pricing-table-title" style="font-size:20px">We can scale with you from startup to
                    enterprise, We can halp </h1>

                <div class="row">
                    @foreach($plans as $plan)
                        <div class="col-md-4" id="card_{{$plan->id}}">
                            <div class="card pricing-card pricing-plan-basic border">
                                <div class="card-body">
                                    <i class="mdi mdi-cube-outline pricing-plan-icon"></i>
                                    <p class="pricing-plan-title">{{$plan->title}}</p>
                                    <h3 class="pricing-plan-cost ml-auto">${{$plan->amount}}</h3>
                                    <ul class="pricing-plan-features">
                                        <li>{{$plan->description}}</li>
                                        <li>{{$plan->total_number}} Numbers</li>
                                        <li>{{$plan->calling_minute}} Minute</li>
                                        {{-- <li>80 Minute Recording</li> --}}
                                    </ul>
                                    <a href="javascript:void(0)" data-id="{{$plan->id}}" data-title="{{$plan->title}}"
                                       class="btn pricing-plan-purchase-btn">Purchase</a>
                                </div>
                            </div>
                        </div>
                    @endforeach



                    {{-- <button id="card-button" class="btn btn-success" data-secret="{{ $intent->client_secret }}">
                        Update Payment Method
                    </button> --}}


                    {{-- <button id="subscribe-button" class="btn btn-success">
                        Subscribe
                    </button> --}}


                </div>
            </div>
        {{-- <div class="col-md-4">
          <div class="card pricing-card pricing-card-highlighted  pricing-plan-pro border">
            <div class="card-body">
                <i class="mdi mdi-trophy pricing-plan-icon"></i>
              <p class="pricing-plan-title">Pro</p>
              <h3 class="pricing-plan-cost ml-auto">$49</h3>
              <ul class="pricing-plan-features">
                <li>Unlimited conferences</li>
                <li>2 Numbers</li>
                <li>100 Minute Calling</li>
                <li>80 Minute Recording</li>
              </ul>
              <a href="#!" class="btn pricing-plan-purchase-btn">Purchase</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card pricing-card pricing-plan-enterprise border">
            <div class="card-body">
              <i class="mdi mdi-wallet-giftcard pricing-plan-icon"></i>
              <p class="pricing-plan-title">Enterprise</p>
              <h3 class="pricing-plan-cost ml-auto">$69</h3>
              <ul class="pricing-plan-features">
                <li>Unlimited conferences</li>
                <li>2 Numbers</li>
                <li>100 Minute Calling</li>
                <li>80 Minute Recording</li>
              </ul>
              <a href="#!" class="btn pricing-plan-purchase-btn">Purchase</a>
            </div>
          </div>
        </div> --}}
    </div>

    {{-- <div class="container">
        <div id="card-element" style="width: 100%"></div>
    </div>  --}}

    <!-- Button trigger modal -->
    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Launch demo modal
    </button> --}}

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Purchase Plan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('plan.signup') }}" id="signInForm">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required placeholder="Name"
                                   data-bv-notempty-message="The name is required">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required placeholder="Email"
                                   data-bv-notempty-message="The email is required"
                                   data-bv-remote="true"
                                   data-bv-remote-url="{{ route('email-check') }}"
                                   data-bv-remote-message="The email is not available">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required placeholder="Password"
                                   data-bv-notempty-message="The password is required"
                            >
                        </div>

                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="c_password" class="form-control" required
                                   placeholder="Confirm Password"
                                   data-bv-notempty-message="The confirm password is required"
                                   data-bv-identical="true"
                                   data-bv-identical-field="password"
                                   data-bv-identical-message="The password and its confirm are not the same">
                        </div>

                        <div class="form-group">
                            <label>Selectd Plan</label>
                            <select id="modal_plan" name="plan" class="form-control">

                            </select>
                        </div>
                        <input type="hidden" name="token" id="token">
                        <div class="form-group">
                            <div id="card-element" style="width: 100%"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="purchase_button" class="btn btn-primary">Purchase</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </main>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript"
            src="//cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>

    <script src="https://js.stripe.com/v3/"></script>

    <script>
        var stripe = Stripe('{{ env('STRIPE_PUB_KEY') }}');

        // var elements = stripe.elements();
        // var cardElement = elements.getElement('card');


        // cardElement.mount('#card-element');
        // cardElement.blur();
        //var stripe = Stripe('{{ env('STRIPE_KEY') }}');
        var elements = stripe.elements({
            fonts: [
                {
                    cssSrc: 'https://fonts.googleapis.com/css?family=Source+Code+Pro',
                },
            ],
            // Stripe's examples are localized to specific languages, but if
            // you wish to have Elements automatically detect your user's locale,
            // use `locale: 'auto'` instead.
            locale: window.__exampleLocale
        });
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');
        $(document).on('click', '.pricing-plan-purchase-btn', function () {
            var id = $(this).attr('data-id');
            var title = $(this).attr('data-title');
            // alert($(this).attr('data-id'));
            // $('#exampleModal').model('show');
            var html = `<option value="${id}">${title}</option>`;
            $('#modal_plan').html(html);
            $("#exampleModal").modal('show');
            // document.getElementById("global-loader").style.display = "block";
        });
        $(function () {
            $('#signInForm').bootstrapValidator();
        });
        $(document).on('click', '#purchase_button', function () {
            $("#purchase_button").prop("disabled", true);
            var tokenVAlue = $('#token').val();
            if (tokenVAlue) {
                document.getElementById("global-loader").style.display = "block";
                $('#signInForm').submit();
            } else {
                stripe.createToken(cardElement).then(function (result) {
                    if (result.token) {
                        console.log(result.token);
                        $('#token').val(result.token.id);
                        document.getElementById("global-loader").style.display = "block";
                        $('#signInForm').submit();
                    } else {
                        alert('Please add valid detail for card!');
                        $("#purchase_button").prop("disabled", false);
                    }
                });
            }
        })
    </script>
@endsection
