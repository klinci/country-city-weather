@extends('webadmin.layouts.auth')
@section('content')
<h3 class="text-center m-t-0 m-b-15">
  <a href="" class="logo logo-admin"><span>Web</span>Admin</a>
</h3>
<h4 class="text-muted text-center m-t-0">
  <b>@lang('register.activation')</b>
</h4>
<div class="form-group">
  <div class="col-xs-12">
  	<div class="alert alert-info alert-dismissible fade in">
  	  <b>@lang('register.activation_message')</b>
  	</div>
  </div>
</div>
<div class="form-group">
  <div class="col-xs-12">
    <input class="form-control" type="email" name="email" required="" value="{{ Session::get('activation_email') }}" disabled="">
  </div>
</div>
<div class="form-group text-center m-t-40">
  <div class="col-xs-12">
  	<br>
    <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="button" id="registerButton">
      @lang('register.activation_button')
    </button>
  </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
</script>
@endsection

@section('stylesheet')
  {{-- <script src='//www.google.com/recaptcha/api.js'></script> --}}
@endsection
