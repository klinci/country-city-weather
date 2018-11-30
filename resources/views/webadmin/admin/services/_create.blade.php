<div class="row">
	{{ Form::open(['id' => 'add_form']) }}
	    @include($include)
	    <div class="modal-footer no-border">
	    	<div class="form-group">
	        {{ Form::button('Cancel', ['class'=>'btn btn-default waves-effect', 'data-dismiss' => 'modal']) }}
	        {{ Form::button('Save', ['class'=>'btn btn-primary waves-effect waves-light', 'id' => 'insert-data']) }}
	    	</div>
	    </div>
	{{ Form::close() }}
</div>