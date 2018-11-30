{{-- <script src="/assets/plugins/jquery/jquery-1.11.min.js"></script> --}}
<script src="{{ asset('assets/plugins/jquery/jquery-2.2.0.min.js') }}"></script>
<script src="/assets/themes/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/plugins/modernizer/modernizer.min.js"></script>
<script src="/assets/plugins/jquery/detect.js"></script>
<script src="/assets/plugins/fastclick/fastclick.js"></script>
<script src="/assets/plugins/jquery/jquery.slimscroll.js"></script>
<script src="/assets/plugins/jquery/jquery-blockui/jquery.blockui.js"></script>
<script src="/assets/plugins/waves/waves.js"></script>
<script src="/assets/plugins/wow/wow.min.js"></script>
<script src="/assets/plugins/jquery/jquery.nicescroll.js"></script>
<script src="/assets/plugins/jquery/jquery.scrollTo.min.js"></script>
<script src="/assets/themes/webadmin/js/webadmin.js"></script>
<script type="text/javascript">
	var Document = jQuery(document.body);
	function loader(msg) {
		return `
		 	<center>
				<img src="https://club.entedecontrolderutas.com/assets/ring-spinner-2f2ad9512c7ad4ea794d3a5d6adbd69e.gif" class="img-responsive">
					<h5>` + msg + `</h5>
			</center>
		`;
	}
	/*
	*
	*	< =========== SERIALIZE FUNCTION =========== >
	*/
	function serializer(e,id)
	{
		e.preventDefault();
		return jQuery(id).serialize();
	}
	/*
	*
	*	< =========== GET TOKEN FUNCTION FROM META TAG =========== >
	*/
	function _token()
	{
		return {
			'X-CSRF-TOKEN' : jQuery('meta[name="csrf-token"]').attr('content')
		};
	}
	/*
	*
	*	< =========== GET MODAL FUNCTION SHOW =========== >
	*/
	function _modal()
	{
		$('#ContentModal').modal({
			show : true,
			keyboard: false,
			backdrop :'static',
			focus : true
		})
	}
	/*
	*
	*	< =========== REPLACE ID WITH REAL ID =========== >
	*/
	function replaceUrlId(param,id)
	{
		if(param.search("ID") >= 0) {
			return param.replace('ID', id);
		}
	}
	/*
	*
	*	< =========== ERROR ALERT FUNCTION =========== >
	*/
	function errorAlert(param) {
		return '<div class="alert alert-danger alert-dismissible fade in">'
			+ param +
		'</div>';
	}
	/*
	*
	*	< =========== ERROR ALERT FUNCTION =========== >
	*/
	function successAlert(param) {
		return '<div class="alert alert-success alert-dismissible fade in">'
			+ param +
		'</div>';
	}
	/*
	*
	*	< =========== INFO ALERT FUNCTION =========== >
	*/
	function infoAlert(param) {
		return '<div class="alert alert-info alert-dismissible fade in">'
			+ param +
		'</div>';
	}
	/*
	*
	*	< =========== MODAL BODY CHANGER FUNCTION =========== >
	*/
	function modalBody(param) {
		return jQuery('.modal-body').html(param);
	}
	/*
	*
	*	< =========== MUTIPLE AJAX REQUEST FUNCTION =========== >
	*/
	function AjaxRequests(param)
	{
		jQuery.ajax({
			url : param.url,
			dataType : param.dataType,
			type : param.ReqMethod,
			data : param.SendData,
			headers : _token(),
			beforeSend  : function() {
			    errorAlert(param.msg);
			},
			error : function(res) {
				errorAlert(param.msg);
			},
			success : function(res) {
				if(res.error == 1) {
					modalBody('');
					for (var i = 0; i < res.msg.length; i++) {
						jQuery('.modal-body').append(errorAlert(res.msg[i]))
					}
				} else {
					modalBody(successAlert(res.msg));
				}
			}
		});
	}
</script>