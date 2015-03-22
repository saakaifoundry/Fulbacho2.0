@section('script')

	<script>
		$( "#canchas" ).autocomplete({
			source: 'http://localhost:8888/getCancha',
			minLength:1,

		});

</script>

@stop