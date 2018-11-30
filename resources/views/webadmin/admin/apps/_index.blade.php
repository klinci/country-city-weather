@extends('webadmin.layouts.dashboard_admin')

@section('style')
	{{-- Todo --}}
@endsection

@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-offset-3">
		@include($include)
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
/*
*
*   < =========== BUTTON UPDATE =========== >
*/
Document.on('click','#update-data', function(e)
{
  var param = {
    url : "{{Route('app.update')}}",
    dataType : "json",
    ReqMethod : 'put',
    SendData : serializer(e,'#edit_form'),
    msg : {
      Timeout : 2000,
      beforeSend : 'Memproses...',
      errors : "Error silakan coba lagi!",
      success : 'Done!'
    }
	};
  AjaxRequests(param);
  _modal()
});
</script>
@endsection