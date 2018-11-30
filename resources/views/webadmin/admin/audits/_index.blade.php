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
						<th style="width:20%;" class="text-center">User</th>
						<th style="width:20%;" class="text-center">Event</th>
						<th style="width:30%;" class="text-center">Old Values</th>
						<th style="width:30%;" class="text-center">New Values</th>
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
	    text : '<i class="mdi mdi-delete"></i>',
	    className : 'btn btn-primary',
	    action  : function(e, dt, node, config)
	    {

	      jQuery('#myModalLabel').html('Delete Confirmation');

	      var _url = '{{ route("audits.show","show") }}';

				jQuery.get(_url + '?mode=del_confirmation', function(res) {
					jQuery('.modal-body').html(res);
				});
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
	        var _url = replaceUrlId('{{ route("audits.show","ID") }}',res.id);
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
			{ data : 'id', name : 'id', visible : false, className : 'text-center' },
			{ data : 'user.name', name : 'user', className : 'text-center' },
			{ data : 'event', name : 'event', className : 'text-center' },
			{ data : 'old_values', name : 'old_values', className : 'text-center' },
			{ data : 'new_values', name : 'new_values', className : 'text-center' },
		],
		ajax : { url : "{{ Route('audits.index') }}" }
	});
	/*
	*
	*   < =========== BUTTON DELETE =========== >
	*/
	Document.on('click','#delete-data', function(e,table)
	{
		var param = {
			url : "{{Route('audits.destroy','delete-all')}}",
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