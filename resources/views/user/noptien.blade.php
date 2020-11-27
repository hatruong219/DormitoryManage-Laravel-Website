@extends('user_layout')
@section('content')
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="noptien" style="background-color: white; height: 550px;">
  <div class="row-fluid">
      <form class="form-horizontal" style="margin-left: 25%;margin-top: 6%;" action="{{URL::to('/user/noptien')}}" method="post">
        {{ csrf_field() }}
        <fieldset>
          <div id="legend">
            <legend class="">Gửi số điện nước</legend>
          </div>
     
          <!-- Name -->
          <div class="control-group">
            <label class="control-label"  for="username">Tháng</label>
            <div class="controls">
              <input type="date" id="username" name="month" placeholder="" class="input-xlarge" style="height: 5%;">
            </div>
          </div>
     
          <!-- Card Number -->
          <div class="control-group">
            <label class="control-label" for="email">Số điện cuối kì</label>
            <div class="controls">
              <input type="text" id="email" name="end_electric" placeholder="" class="input-xlarge" style="height: 5%;">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="email">Số nước cuối kì</label>
            <div class="controls">
              <input type="text" id="email" name="end_water" placeholder="" class="input-xlarge" style="height: 5%;">
            </div>
          </div>
     
          <!-- Expiry-->
          
     
          <!-- CVV -->
         
          <!-- Submit -->
          <div class="control-group">
            <div class="controls">
              <button class="btn btn-success">Gửi</button>
            </div>
          </div>
     
        </fieldset>
      </form>
    </div>
</div>
@endsection