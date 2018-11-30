<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="form-group">
		{{ Form::label('name', 'Name', ['for' => 'name'] ) }}
		{{ Form::text('name', null, ['class'=>'form-control','id' => 'name']) }}
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="form-group">
		{{ Form::label('email', 'Email', ['for' => 'email'] ) }}
		{{ Form::text('email', null, ['class'=>'form-control','id' => 'email']) }}
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="form-group">
		{{ Form::label('password', 'Password', ['for' => 'password'] ) }}
		{{ Form::password('password', null, [ 'class'=>'form-control', 'id' => 'password'] )}}
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="form-group">
		{{ Form::label('roles', 'Roles', ['for' => 'roles'] ) }}
		{{
			Form::select('role_id',
				App\Role::pluck('name','id')->all(),
				null, [
					'placeholder' => '- Level Administration -',
					'class' => 'form-control',
					'id' => 'roles'
				])
		}}
	</div>
</div>

<script type="text/javascript">
	$('#password').attr('class','form-control')
</script>