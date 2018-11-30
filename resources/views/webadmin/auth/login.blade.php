@extends('webadmin.layouts.auth')
@section('content')
  <h3 class="text-center m-t-0 m-b-15">
    <a href="" class="logo logo-admin"><span>Web</span>Admin</a>
  </h3>
  <h4 class="text-muted text-center m-t-0">
    <b>@lang('login.title')</b>
  </h4>
  <form class="form-horizontal m-t-20" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}
    <div class="form-group">
      <div class="col-xs-12">
        <input class="form-control" name="email" type="text" required="" value="{{ old('email') }}" placeholder="@lang('login.email')" autocomplete="off">
      </div>
    </div>
    <div class="form-group">
      <div class="col-xs-12">
        <input class="form-control" type="password" name="password" required="" placeholder="@lang('login.password')">
      </div>
    </div>
    <div class="form-group text-center m-t-40">
      <div class="col-xs-12">
        <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">
          @lang('login.button')
        </button>
      </div>
    </div>
    <div class="form-group m-t-30 m-b-0">
      <div class="col-sm-7">
        <a href="{{url(Session::get('lang').'/'.'forgot-password')}}" class="text-muted">
          <i class="fa fa-lock m-r-5"></i> @lang('login.forgot')
        </a>
      </div>
      <div class="col-sm-5 text-right">
        <a href="{{url(Session::get('lang').'/'.'registration')}}" class="text-muted">
          @lang('login.create')
        </a>
      </div>
    </div>
  </form>
@endsection
