<div class="row">
	{{ Form::model($data, ['id' => 'edit_form', 'data-id' => $data->id ]) }}
    @include($include)
    <div class="modal-footer" style="border:none;">
    	<div class="form-group">
    		 {{ Form::button('Cancel', ['class'=>'btn btn-default waves-effect', 'data-dismiss' => 'modal']) }}
        {{ Form::button('Save Changes', ['class'=>'btn btn-primary waves-effect waves-light', 'id' => 'update-data']) }}
    	</div>
    </div>
	{{ Form::close() }}
</div>