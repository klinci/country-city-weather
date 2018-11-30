@extends('webadmin.layouts.dashboard_admin')

@section('style')
	@include('webadmin.includes.datatables-css')
@endsection

@section('content')
<div class="row">
  <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
		<div class="responsive-table">
	    <table class="table table-striped table-hover _table">
        <thead>
          <tr>
  					<th>ID</th>
  					<th style="width:20%;">Name</th>
  					<th style="width:20%;">Email</th>
  					<th style="width:20%;">Level</th>
          </tr>
        </thead>
        <tbody></tbody>
	    </table>
		</div>
  </div>
</div>
@endsection

@section('scripts')
@include('webadmin.includes.datatables-js')
<script type="text/javascript">
	var table = jQuery('._table').DataTable({
		dom : 'Bfrtip',
		select : true,
		ordering : false,
		processing : false,
		serverSide : true,
		buttons : [
	  {
	    text : '<i class="mdi mdi-plus"></i>',
	    className : 'btn btn-primary',
	    action  : function()
	    {
	      jQuery('#myModalLabel').html('Add Data');
	      jQuery.get('{{ route("users.create") }}', function(res) {
	          jQuery('.modal-body').html(res);
	      });
	      _modal();
	    }
	  },
	  {
	    text : '<i class="mdi mdi-pencil"></i>',
	    className : 'btn btn-default',
	    action  : function(e, dt, node, config)
	    {
	      var res = dt.row( { selected: true } ).data();
	      jQuery('#myModalLabel').html('Update Data');
	      jQuery('.modal-body').html(errorAlert("Silakan pilih data terlebih dahulu."));
	      if(res != undefined ) {
	        var _url = replaceUrlId('{{ route("users.edit","ID") }}',res.id);
	        jQuery.get(_url, function(res) {
	            jQuery('.modal-body').html(res);
	        });
	      }
	      _modal();
	    }
	  },
	  {
	    text : '<i class="mdi mdi-delete"></i>',
	    className : 'btn btn-primary',
	    action  : function(e, dt, node, config)
	    {
	      var res = dt.row( { selected: true } ).data();
	      jQuery('#myModalLabel').html('Delete Confirmation');
	      jQuery('.modal-body').html(errorAlert("Silakan pilih data terlebih dahulu."));
	      if(res != undefined ) {
	        var _url = replaceUrlId('{{ route("users.show","ID") }}',res.id);
	        jQuery.get(_url + '?mode=del_confirmation', function(res) {
	            jQuery('.modal-body').html(res);
	        });
	      }
				_modal();
	    }
	  },
	  {
	    text : '<i class="mdi mdi-information"></i>',
	    className : 'btn btn-default',
	    action  : function(e, dt, node, config)
	    {
	      var res = dt.row( { selected: true } ).data();
	      jQuery('#myModalLabel').html('Data Information');
	      jQuery('.modal-body').html(errorAlert("Silakan pilih data terlebih dahulu."));
	      if(res != undefined ) {
	        var _url = replaceUrlId('{{ route("users.show","ID") }}',res.id);
	        jQuery.get(_url + '?mode=detail', function(res) {
	            jQuery('.modal-body').html(res);
	        });
	      }
				_modal();
	    }
	  },
	  {
	    text : '<i class="mdi mdi-refresh"></i>',
	    className : 'btn btn-primary',
	    action  : function() {
				table.ajax.reload();
	    }
	  },
		],
		columns : [
			{ data : 'id', name : 'id', visible : false },
			{ data : 'name', name : 'name' },
			{ data : 'email', name: 'email' },
			{ data : 'roles[0].name', name : 'name' }
		],
		ajax : { url : "{{ Route('users.index') }}" }
	});
	/*
	*
	*   < =========== BUTTON ADD =========== >
	*/
	Document.on('click','#insert-data', function(e)
	{
		var param = {
	    url : "{{ Route('users.store') }}",
	    dataType : "json",
	    ReqMethod : 'post',
	    SendData : serializer(e, '#add_form'),
	    msg : {
	      Timeout : 2000,
	      beforeSend : 'Memproses...',
	      errors : "Error silakan coba lagi!",
	      success : 'Done!'
	    }
		};
		AjaxRequests(param);
		table.ajax.reload();
	});
	/*
	*
	*   < =========== BUTTON UPDATE =========== >
	*/
	Document.on('click','#update-data', function(e)
	{
		var i = jQuery('#edit_form').attr('data-id');
		var param = {
		  url : "{{Route('users.update','')}}/" + i,
		  dataType : "json",
		  ReqMethod : 'put',
		  SendData : serializer(e, '#edit_form'),
		  msg : {
		    Timeout : 2000,
		    beforeSend : 'Memproses...',
		    errors : "Error silakan coba lagi!",
		    success : 'Done!'
		  }
		};
		AjaxRequests(param);
		table.ajax.reload();
	});
	/*
	*
	*   < =========== BUTTON DELETE =========== >
	*/
	Document.on('click','#delete-data', function(e)
	{
		var i = jQuery('#delete-data').attr('data-id');
		var param = {
			url : "{{Route('users.destroy','')}}/" + i,
			dataType : "json",
			ReqMethod : 'delete',
			SendData : null,
			msg : {
				Timeout : 2000,
				beforeSend : 'Memproses...',
				errors : "Error silakan coba lagi!",
				success : 'Done!'
			}
		};
		AjaxRequests(param);
		table.ajax.reload();
	});
</script>
@endsection