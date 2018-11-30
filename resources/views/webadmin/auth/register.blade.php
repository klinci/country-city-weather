@extends('webadmin.layouts.auth')
@section('content')
@php
  $langsess = Session::get('lang');
@endphp
<h3 class="text-center m-t-0 m-b-15">
  <a href="" class="logo logo-admin"><span>Web</span>Admin</a>
</h3>
<h4 class="text-muted text-center m-t-0">
  <b>@lang('register.title')</b>
</h4>
{{ Form::open([
    'id' => 'registration_form',
    'class' => 'form-horizontal m-t-20'
  ])
}}
<div class="form-group">
  <div class="col-xs-12">
    <input class="form-control" name="name" type="text" required="" value="{{ old('name') }}" placeholder="@lang('register.name')" autocomplete="off">
  </div>
</div>
<div class="form-group">
  <div class="col-xs-12">
    <input class="form-control" name="email" type="text" required="" value="{{ old('email') }}" placeholder="@lang('register.email')" autocomplete="off">
  </div>
</div>
<div class="form-group">
  <div class="col-xs-12">
    <input class="form-control" type="password" name="password" required="" placeholder="@lang('register.password')" autocomplete="off">
  </div>
</div>
<div class="form-group">
  <div class="col-xs-12">
    <input class="form-control" type="password" name="password_confirmation" required="" placeholder="@lang('register.passconf')">
  </div>
</div>
{{--     <div class="form-group">
     <center>
        <div class="g-recaptcha col-xs-12" data-sitekey="6LeXfwgTAAAAABuCI-iz_pdjQgnHSn5KBemUU305"></div>
      </center>
    </div> --}}
<div class="form-group text-center m-t-40">
  <div class="col-xs-12">
    <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="button" id="registerButton">
      @lang('register.button')
    </button>
  </div>
</div>
<div class="form-group m-t-30 m-b-0">
  <div class="col-sm-12 text-center">
    <a href="{{url($langsess.'/'.'login')}}" class="text-muted">
      @lang('register.already')
    </a>
  </div>
</div>
{{ Form::close() }}
@endsection
@section('scripts')
<script type="text/javascript">

  jQuery('#registerButton').click(function(e) {

    var param = {
      url : "{{ Route('registration.store',$langsess) }}",
      activation : "{{ Route('activation', $langsess) }}",
      send_activation : "{{ Route('send.code', $langsess) }}",
      dataType : "json",
      ReqMethod : 'post',
      SendData : serializer(e,'#registration_form'),
      msg : {
        Timeout : 2000,
        beforeSend : 'Memproses...',
        errors : "@lang('register.error')",
        success : "@lang('register.success')",
      }
    };

    jQuery.ajax({
      url : param.url,
      dataType : param.dataType,
      type : param.ReqMethod,
      data : param.SendData,
      headers : _token(),
      beforeSend  : function() {
          errorAlert(param.msg);
      },
      error : function(res) {
        errorAlert(param.msg);
      },
      success : function(res) {
        if(res.error == 1) {
          modalBody('');
          for (var i = 0; i < res.msg.length; i++) {
            jQuery('.modal-body').append(errorAlert(res.msg[i]))
          }
        } else {
          modalBody(successAlert(res.msg));

          jQuery.get(param.send_activation,function()
          {
            _modal();
            setTimeout(function() {
              window.location.replace(param.activation);
            }, 800);
          });
        }
      }
    });
  })
</script>
@endsection

@section('stylesheet')
  {{-- <script src='//www.google.com/recaptcha/api.js'></script> --}}
@endsection
