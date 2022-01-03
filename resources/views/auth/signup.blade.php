@extends('layouts.app')

@section('content')
<style type="text/css">
    body {
  font-family: 'Karla', sans-serif; }

.pricing-table-subtitle {
  margin-top: 68px;
  font-weight: normal; }

.pricing-table-title {
  font-weight: bold;
  margin-bottom: 68px; }

.pricing-card {
  border: none;
  border-radius: 10px;
  margin-bottom: 40px;
  text-align: center;
  -webkit-transition: all 0.6s;
  transition: all 0.6s; }
  .pricing-card:hover {
    box-shadow: 0 2px 40px 0 rgba(205, 205, 205, 0.55); }
  .pricing-card.pricing-card-highlighted {
    box-shadow: 0 2px 40px 0 rgba(205, 205, 205, 0.55); }
  .pricing-card:hover {
    box-shadow: 0 2px 40px 0 rgba(205, 205, 205, 0.55);
    -webkit-transform: translateY(-10px);
            transform: translateY(-10px); }
  .pricing-card .card-body {
    padding-top: 55px;
    padding-bottom: 62px; }

.pricing-plan-title {
  font-size: 20px;
  color: #000;
  margin-bottom: 11px;
  font-weight: normal; }

.pricing-plan-cost {
  font-size: 50px;
  color: #000;
  font-weight: bold;
  margin-bottom: 29px; }

.pricing-plan-icon {
  display: inline-block;
  width: 40px;
  height: 40px;
  font-size: 40px;
  line-height: 1;
  margin-bottom: 24px; }
  .pricing-plan-basic .pricing-plan-icon {
    color: #fe397a; }
  .pricing-plan-pro .pricing-plan-icon {
    color: #10bb87; }
  .pricing-plan-enterprise .pricing-plan-icon {
    color: #5d78ff; }

.pricing-plan-features {
  list-style: none;
  padding-left: 0;
  font-size: 14px;
  line-height: 2.14;
  margin-bottom: 35px;
  color: #303132; }

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
          justify-content: center; }
  .pricing-plan-basic .pricing-plan-purchase-btn {
    background-color: #fe397a;
    color: #fff; }
    .pricing-plan-basic .pricing-plan-purchase-btn:hover {
      box-shadow: 0 3px 0 0 #b7013d; }
    .pricing-plan-basic .pricing-plan-purchase-btn:active {
      -webkit-transform: translateY(3px);
              transform: translateY(3px);
      box-shadow: none; }
  .pricing-plan-pro .pricing-plan-purchase-btn {
    background-color: #10bb87;
    color: #fff; }
    .pricing-plan-pro .pricing-plan-purchase-btn:hover {
      box-shadow: 0 3px 0 0 #0a7554; }
    .pricing-plan-pro .pricing-plan-purchase-btn:active {
      -webkit-transform: translateY(3px);
              transform: translateY(3px);
      box-shadow: none; }
  .pricing-plan-enterprise .pricing-plan-purchase-btn {
    background-color: #5d78ff;
    color: #fff; }
    .pricing-plan-enterprise .pricing-plan-purchase-btn:hover {
      box-shadow: 0 3px 0 0 #1138ff; }
    .pricing-plan-enterprise .pricing-plan-purchase-btn:active {
      -webkit-transform: translateY(3px);
              transform: translateY(3px);
      box-shadow: none; }

/*# sourceMappingURL=pricing-plan.css.map */
</style>
<div class="container">
    <main>
    <div class="container">
      <h5 class="text-center pricing-table-subtitle">Scale from startup to enterprise </h5>
      <h1 class="text-center pricing-table-title">Choose Plan</h1>
      
      <div class="row">
        <div class="col-md-4">
          <div class="card pricing-card pricing-plan-basic border">
            <div class="card-body">
              <i class="mdi mdi-cube-outline pricing-plan-icon"></i>
              <p class="pricing-plan-title">Basic</p>
              <h3 class="pricing-plan-cost ml-auto">$5</h3>
              <ul class="pricing-plan-features">
                <li>Unlimited conferences</li>
                <li>2 Numbers</li>
                <li>100 Minute Calling</li>
                <li>80 Minute Recording</li>
              </ul>
              <a href="#!" class="btn pricing-plan-purchase-btn">Free</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
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
        </div>
      </div>
    </div>
  </main>
</div>
@endsection
