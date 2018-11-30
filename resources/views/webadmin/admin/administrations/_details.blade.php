<div class="row">
	<div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
		<table class="table">
			<tbody>
				<tr>
					<td class="td-no-border">Nama</td>
					<td class="td-no-border">: {{ $data->name }}</td>
				</tr>
				<tr>
					<td class="td-no-border">Email</td>
					<td class="td-no-border">: {{ $data->email }}</td>
				</tr>
				<tr>
					<td class="td-no-border">Level User</td>
					<td class="td-no-border">: {{$data->roles[0]->role_name}}</td>
				</tr>
				<tr>
					<td class="td-no-border">Dibuat</td>
					<td class="td-no-border">: {{$data->created_at}}</td>
				</tr>
				<tr>
					<td class="td-no-border">Diperbarui</td>
					<td class="td-no-border">: {{$data->updated_at}}</td>
				</tr>
			</tbody>
		</table>
		<div class="modal-footer no-border">
			{{ Form::button('Close', ['class'=>'btn btn-default waves-effect', 'data-dismiss' => 'modal']) }}
		</div>
	</div>
</div>