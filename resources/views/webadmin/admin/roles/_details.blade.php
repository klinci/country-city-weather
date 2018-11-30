<div class="row">
	<div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
		<table class="table">
			<tbody>
				<tr>
					<td class="td-no-border">Role Name</td>
					<td class="td-no-border">: {{ $data->name }}</td>
				</tr>
				<tr>
					<td class="td-no-border">Created</td>
					<td class="td-no-border">: {{$data->created_at}}</td>
				</tr>
				<tr>
					<td class="td-no-border">Updated</td>
					<td class="td-no-border">: {{$data->updated_at}}</td>
				</tr>
			</tbody>
		</table>
		<div class="modal-footer no-border">
			{{ Form::button('Close', ['class'=>'btn btn-default waves-effect', 'data-dismiss' => 'modal']) }}
		</div>
	</div>
</div>