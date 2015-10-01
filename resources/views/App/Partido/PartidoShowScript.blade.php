@section('script')


	<script>
	$( document ).ready(function() {
		(jQuery("#asistirCheck").prop("checked", true));

		alert(jQuery("#asistirCheck").prop("checked"));
		if(jQuery("#asistirCheck").prop("checked")){	
	        $.ajax({
	            method: "POST",
	            url: "confirmar",
	            data: { name: "John", '_token': $('input[name=_token]').val() },
	            success: function()
	            {
                	alert('bien');
	            },
            error: function(jqXHR, textStatus, errorThrown)
            {
            	console.log(arguments);
                if(jqXHR)
                {
                    alert(errorThrown);
                }
            }
        });
	}
});
 



	</script>


@stop

