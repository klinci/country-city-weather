<div class="row">
	<div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
		<center>
			<img src="{{ url('sources') }}/{{ $data->image }}" class="responsive-img" style="width: 50%;height: 50%;">
			<h4>{{ $data->name }}</h4>
		</center>
		<table class="table">
			<tbody>
				<tr>
					<td style="text-align:justify;" class="td-no-border" colspan="2">
						{!! trans($data->content) !!}</td>
				</tr>
				<tr>
					<td class="td-no-border">Category</td>
					<td style="text-align:justify;" class="td-no-border">{{ $data->category[0]->name }}</td>
				</tr>
				<tr>
					<td class="td-no-border">Tags</td>
					<td class="td-no-border">
						@foreach($data->tags as $tag)
							 #{{ str_replace(' ', '', strtolower($tag->name)) }} 
						@endforeach
					</td>
				</tr>
				<tr>
					<td class="td-no-border">Status</td>
					<td class="td-no-border">
						{{$data->status}}
					</td>
				</tr>
				<tr>
					<td class="td-no-border">Created</td>
					<td class="td-no-border">{{$data->created_at}}</td>
				</tr>
				<tr>
					<td class="td-no-border">Updated</td>
					<td class="td-no-border">{{$data->updated_at}}</td>
				</tr>
			</tbody>
		</table>
		<div class="modal-footer no-border">
			{{ Form::button('Close', ['class'=>'btn btn-default waves-effect', 'data-dismiss' => 'modal']) }}
		</div>
	</div>
</div>