@section('script')

<script>
	$( "#canchas" ).autocomplete({
		source: '/getCancha',
		minLength:1,
		select: function (event, ui) {
            $("#canchas").val(ui.item.label); // display the selected text
            $("#canchaId").val(ui.item.id); // save selected id to hidden input
		}
	});

	autocomplete("#contacto","#contactoId");

	var counter = 1;
	var limit = 3;
	function addInput(divName){
		if (counter == limit)  {
			alert("You have reached the limit of adding " + counter + " inputs");
		}
		else {
			var contactoNew= 'contacto' + counter;
			var contactoIdNew = 'contactoId' + counter;
			var elemento = "<br> <input id='" + contactoNew + "' class='form-control' name='contactos[]' type='text'><input id='" +contactoIdNew + "' name='contactoId[]' type='hidden' >";

			var newdiv = document.createElement('div');
			newdiv.innerHTML = elemento;
			document.getElementById(divName).appendChild(newdiv);
			
			var idContactoNew = '#' + contactoNew;
			var idContactoIdNew = '#' +contactoIdNew;

			autocomplete(idContactoNew,idContactoIdNew)

		counter++;
		}
	};


	function autocomplete (contactoValue,contactoId) {
		$(contactoValue).autocomplete({
				source: '/getContactos',
				minLength:1,
				select: function (event, ui) {
	                $(contactoValue).val(ui.item.label); // display the selected text
	                $(contactoId).val(ui.item.id); // save selected id to hidden input
	    		}
		});
	};
</script>

@stop

