<div class="row">
	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
		<center><h3>CONFIGURATION</h3></center>
	</div>
	{{ 	Form::model($data, [
				'id' => 'edit_form',
				'data-id' => $data->id
			])
	}}
	{{ Form::hidden('id',null) }}
	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
		<div class="form-group">
			{{ Form::label('name', 'Web Name', ['for' => 'name'] ) }}
			{{ Form::text('name', null, ['class'=>'form-control','id' => 'name']) }}
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="form-group">
			{{ Form::label('language_id','Default Language',['for'=>'language_id']) }}
			{{
				Form::select('language_id',
				App\Language::pluck('name','id')->all(),null,[
					'class' => 'form-control',
					'id' => 'language_id'
				])
			}}
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="form-group">
			{{ Form::label('meta_description','Descriptions',['for'=>'meta_description']) }}
			<textarea class="form-control" name="meta_description" id="meta_description" style="resize:none;">{{$data->meta_description}}</textarea>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="form-group">
			{{ Form::label('meta_html','Meta HTML (Seo Tag)',['for'=>'meta_html']) }}
			<textarea class="form-control" name="meta_html" id="meta_html" style="resize:none;">{{$data->meta_html}}</textarea>
		</div>
	</div>
	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
		<div class="form-group">
			{{ Form::label('meta_author', 'Author', ['for' => 'meta_author'] ) }}
			{{ Form::text('meta_author', null, ['class'=>'form-control','id' => 'meta_author']) }}
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		<br>
		<div class="bootstrap-filestyle input-group">
			{{ Form::text('favicon',null, ['class'=>'form-control','id' => 'favicon']) }}
			<span class="group-span-filestyle input-group-btn" tabindex="0">
				<label for="favicon" class="btn btn-md btn-default">
					<span class="buttonText" data-fancybox data-type="iframe" href="{{ url('assets/js/filemanager/dialog.php?type=1&field_id=favicon&relative_url=1') }}">
						<i class="mdi mdi-upload"></i> Favicon
					</span>
				</label>
			</span>
		</div>
		<br>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		<br>
		<div class="bootstrap-filestyle input-group">
			{{ Form::text('logo',null, ['class'=>'form-control','id' => 'logo']) }}
			<span class="group-span-filestyle input-group-btn" tabindex="0">
				<label for="logo" class="btn btn-md btn-default">
					<span class="buttonText" data-fancybox data-type="iframe" href="{{ url('assets/js/filemanager/dialog.php?type=1&field_id=logo&relative_url=1') }}">
						<i class="mdi mdi-upload"></i> Logo
					</span>
				</label>
			</span>
		</div>
		<br>
	</div>
	<div class="form-group">
	  {{ Form::button('Save Changes',['class'=>'btn btn-primary waves-effect btn-block waves-light', 'id' => 'update-data']) }}
	</div>
	{{ Form::close() }}
</div>