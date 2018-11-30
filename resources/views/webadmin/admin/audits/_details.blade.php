<div class="row">
	<div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
		<table class="table">
		<tbody>
			<tr>
				<td class="td-no-border">User Type</td>
				<td class="td-no-border">{{ $data->user_type }}</td>
			</tr>
			<tr>
				<td class="td-no-border">User</td>
				<td class="td-no-border">{{ $data->user->name }}</td>
			</tr>
			<tr>
				<td class="td-no-border">Event</td>
				<td class="td-no-border">{{ $data->event }}</td>
			</tr>
			<tr>
				<td class="td-no-border">Auditable Type</td>
				<td class="td-no-border">{{ $data->auditable_type }}</td>
			</tr>
			<tr>
				<td class="td-no-border">Auditable ID</td>
				<td class="td-no-border">{{ $data->auditable_id }}</td>
			</tr>
			<tr>
				<td class="td-no-border">Old Value</td>
				<td class="td-no-border">{{ $data->old_values }}</td>
			</tr>
			<tr>
				<td class="td-no-border">New Value</td>
				<td class="td-no-border">{{ $data->new_values }}</td>
			</tr>
			<tr>
				<td class="td-no-border">Url</td>
				<td class="td-no-border">{{ $data->url }}</td>
			</tr>
			<tr>
				<td class="td-no-border">Ip Address</td>
				<td class="td-no-border">{{$data->ip_address}}</td>
			</tr>
			<tr>
				<td class="td-no-border">Browser</td>
				<td class="td-no-border">{{$data->user_agent}}</td>
			</tr>
			<tr>
				<td class="td-no-border">Tags</td>
				<td class="td-no-border">{{$data->tags}}</td>
			</tr>
			<tr>
				<td class="td-no-border">Created At</td>
				<td class="td-no-border">{{$data->created_at}}</td>
			</tr>
			<tr>
				<td class="td-no-border">Updated At</td>
				<td class="td-no-border">{{$data->updated_at}}</td>
			</tr>
		</tbody>
		</table>
		<div class="modal-footer no-border">
			{{ Form::button('Close', ['class'=>'btn btn-default waves-effect', 'data-dismiss' => 'modal']) }}
		</div>
	</div>
</div>