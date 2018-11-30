<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="form-group">
		{{ Form::label('name', 'Role Name', ['for' => 'name']) }}
		{{ Form::text('name', null, ['class'=>'form-control','id' => 'name']) }}
	</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="form-group">
		{{ Form::label('guard_name','Guard Name', ['for' => 'guard']) }}
		{{ Form::text('guard_name', null, ['class'=>'form-control','id' => 'guard']) }}
	</div>
</div>