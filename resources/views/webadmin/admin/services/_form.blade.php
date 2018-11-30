<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="form-group">
		{{ Form::label('name','Name') }}
		{{ Form::text('name', null, ['class'=>'form-control','id' => 'name']) }}
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="form-group">
		{{ Form::label('description','Description') }}
		{{ Form::text('description',null,['class'=>'form-control','id' => 'description']) }}
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="form-group">
		{{ Form::label('domain','Domain') }}
		{{ Form::text('domain',null,['class'=>'form-control','id' => 'domain']) }}
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
	<div class="form-group">
		{{ Form::label('type','Service Type') }}
		<select class="form-control" id="type" name="type">
			@if(isset($data))
				<option value="{{$data->type}}" selected>
					- Change type -
				</option>
			@endif
			<option value="FR">FREE</option>
			<option value="CR">CREDIT</option>
		</select>
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
	<div class="form-group">
		{{ Form::label('credit','Cre') }}
		{{ Form::text('credit',null,['class'=>'form-control','id' => 'credit']) }}
	</div>
</div>