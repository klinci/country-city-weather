<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="form-group">
		{{ Form::label('name', 'Name', ['for' => 'name']) }}
		{{ Form::text('name', null, ['class'=>'form-control','id' => 'name']) }}
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="form-group">
		{{ Form::textarea('content', null, ['class'=>'form-control','id' => 'textarea']) }}
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
	<div class="form-group">
		{{ Form::label('category', 'Category', ['for' => 'category_id']) }}
		{{ Form::select('category_id', App\Category::pluck('name','id')->all(), null,['placeholder' => ' - Pilih Category -','class' => 'form-control','id' => 'category_id']) }}
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
	<div class="form-group">
		{{ Form::label('status', 'Status', ['for' => 'status']) }}
		{{ Form::select('status', ['publish'=>'publish','draft'=>'draft'], null,['placeholder' => ' - Status -','class' => 'form-control','id' => 'status']) }}
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="form-group">
		{{ Form::label('tag_id', 'Tags', ['for' => 'tag_id']) }}
	    <select name="tag_id[]" id="tag_id" class="form-control" style="height:50%;" multiple>
	    	@foreach(App\Tag::all() as $tag)
	    		<option value="{{$tag->id}}">{{ $tag->name }}</option>
	    	@endforeach
	    </select>
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="bootstrap-filestyle input-group">
		{{ Form::text('image', null, ['class'=>'form-control','id' => 'image-manager']) }}
		<span class="group-span-filestyle input-group-btn" tabindex="0">
			<label for="filestyle-0" class="btn btn-primary ">
				<span class="icon-span-filestyle">
					<i class="mdi mdi-upload"></i>
				</span>
				<span class="buttonText" data-fancybox data-type="iframe" href="{{ url('assets/js/filemanager/dialog.php?type=1&field_id=image-manager&relative_url=1') }}">
					Select Image
				</span>
			</label>
		</span>
	</div>
	<br>
</div>
<script type="text/javascript">
	jQuery('#textarea').ckeditor();
</script>