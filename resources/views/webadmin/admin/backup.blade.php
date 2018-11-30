@extends('webadmin.layouts.dashboard_admin')

@section('content')
<div class="row">
    <div style="padding-bottom: 50px;"></div>
    <div class="col-sm-12 col-md-12">
        <center>
            <h3>Export City To Database</h3>
        </center>
    </div>    
    <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3">
        <div class="form-group">
            <select class="form-control" id="country" name="country">
                <option value="">- Select Country -</option>
            </select>
        </div>
    </div>
    <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3">
        <div class="form-group">
            <select class="form-control" id="city" name="city">
                <option value="">- Select City -</option>
            </select>
        </div>
    </div>
    <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3">
        <div class="form-group">
            <input type="text" id="distance" placeholder="Distance" class="form-control">
        </div>
    </div>
    <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3">
        <div class="form-group">
            <button type="button" class="btn btn-block btn-primary">
                <i class="fa fa-search"></i> Search Now
            </button>
        </div>
    </div>

    <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12" id="debug">
    </div>
</div>
@endsection

@section('scripts')
	<script type="text/javascript">
        const   country = jQuery('#country'),
                city    = jQuery('#city');

        jQuery.ajax({
            url : "{{ url('countries') }}",
            method : 'GET',
            dataType: 'html',
            beforeSend : function() {
                // Todo
            },
            success : function(responses) {
                jQuery('#country').html(responses);
            }
        });

        Document.on('change','#country', function() {
            jQuery.ajax({
                url : "/countries/" + country.val() + '/cities',
                method : 'GET',
                dataType: 'html',
                beforeSend : function() {
                    // Todo
                },
                success : function(responses) {
                    jQuery('#city').html(responses);
                }
            });
        })
	</script>
@endsection

@section('style')

@endsection