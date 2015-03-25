@section('script')


<!--TODO: se repite código-->
<script>
		$( "#canchas" ).autocomplete({
			source: 'http://localhost:8888/getCancha',
			minLength:1,

		});
</script>

<script>
		$( "#contacto" ).autocomplete({
			source: 'http://localhost:8888/getContactos',
			minLength:1,

		});
</script>

<script>
var counter = 1;
var limit = 3;

function addInput(divName){
	if (counter == limit)  {
		alert("You have reached the limit of adding " + counter + " inputs");
	}
	else {
		var idName= 'contacto' + counter;
		var elemento = "<br><input id='" + idName + "' class='form-control' name='contactos[]' type='text'>";
		var newdiv = document.createElement('div');
		newdiv.innerHTML = elemento;
		document.getElementById(divName).appendChild(newdiv);
		
		var id = '#' + idName;
		$( id ).autocomplete({
			source: 'http://localhost:8888/getContactos',
			minLength:1,
		});
	counter++;
	}
}
</script>

@stop

