<div class="row">
	<div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
		<table class="table">
			<tbody>
				<tr>
					<td class="td-no-border">Service Name</td>
					<td class="td-no-border">: {{ $data->name }}</td>
				</tr>
				<tr>
					<td class="td-no-border">Description</td>
					<td class="td-no-border">: {{ $data->description }}</td>
				</tr>
				<tr>
					<td class="td-no-border">Domain</td>
					<td class="td-no-border">: {{ $data->domain }}</td>
				</tr>
				<tr>
					<td class="td-no-border">Code</td>
					<td class="td-no-border">: {{ $data->code }}</td>
				</tr>
				<tr>
					<td class="td-no-border">Type</td>
					<td class="td-no-border">: {{ $data->type }}</td>
				</tr>
				<tr>
					<td class="td-no-border">Credit</td>
					<td class="td-no-border">: {{ $data->credit }}</td>
				</tr>
				<tr>
					<td class="td-no-border">Url</td>
					<td class="td-no-border">: {{ $data->url }}</td>
				</tr>
				<tr>
					<td class="td-no-border">API</td>
					<td class="td-no-border">: {{ $data->api }}</td>
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