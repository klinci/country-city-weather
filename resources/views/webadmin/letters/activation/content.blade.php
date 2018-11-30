@php
	$langsess = Session::get('lang');
	$code = $data['unique_code'];
  $url = url('/'.$langsess.'/verification/'.$code);
@endphp
<table
border="0"
cellpadding="0"
cellspacing="0"
class="full-width no-border width-content">
  <!-- start copy -->
  <tr>
    <td class="top-text-content bg-white">
      <p class="no-margin">
      	Click the button below to activation before login.
      </p>
    </td>
  </tr>
  <!-- end copy -->

  <!-- start button -->
  <tr>
    <td align="left" class="bg-white">
    	<table
    	cellpadding="0"
    	cellspacing="0"
    	class="full-width no-border">
    		<tr>
    			<td
    			align="center"
    			class="bg-white"
    			style="padding:12px;">
						<table class="no-border" cellpadding="0" cellspacing="0">
							<tr>
								<td>
									<a
									href="{{$url}}"
									target="_blank"
									class="button btn-primary">
										<font style="color:#fff;">Activation</font>
									</a>
								</td>
							</tr>
						</table>
    			</td>
    		</tr>
    	</table>
    </td>
  </tr>
  <!-- end button -->

  <!-- start copy -->
  <tr>
  	<td align="justify" class="copy-td">
  		<p class="no-margin">
  			If that doesn't work, copy and paste the following link in your browser :
  		</p>
  		<p class="no-margin">
  			<a
  			  href="{{$url}}"
  			  target="_blank">
  			  <small>
  			    {{$url}}
  			  </small>
  			</a>
  		</p>
  	</td>
  </tr>
  <!-- end copy -->

</table>