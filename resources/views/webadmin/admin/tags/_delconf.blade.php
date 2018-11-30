<div class="row">
	<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
		<center>
			Apakah anda yakin ingin menghapus data <b>{{$data->name}} ?</b>
		</center>
		<br>
		<div class="modal-footer no-border">
			{{ Form::button('Cancel', ['class'=>'btn btn-default waves-effect', 'data-dismiss' => 'modal']) }}
			{{ Form::button('Delete', ['class'=>'waves-effect waves-light btn btn-danger', 'id' => 'delete-data','data-id' => $data->id ]) }}
		</div>
	</div>
</div>