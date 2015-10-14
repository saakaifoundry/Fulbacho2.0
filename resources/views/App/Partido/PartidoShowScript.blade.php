@section('script')


	<script>
	$( document ).ready(function() {

			

});

$( "#asistirCheck" ).click(function() {
	var id = $('#partido').val();
	ajaxAsistencia("si",id);
});

$( "#noAsistirCheck" ).click(function() {
	var id = $('#partido').val();
	ajaxAsistencia("no",id);
});

function ajaxAsistencia (respuesta,id){

	        $.ajax({
	            method: "POST",
	            url: "confirmar",
	            data: { respuesta: respuesta,partidoId: id, '_token': $('input[name=_token]').val() },
	            success: function(retorno)
	            {
                	actualizarConfirmados(retorno, respuesta);
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
};

function actualizarConfirmados(retorno, respuesta){
	moverFilaDeLista(retorno.user,respuesta);
	jQuery('#cantConfirmados').html(retorno['confirmados'] );
	jQuery('#cantNoConfirmados').html(retorno['noConfirmados'] );				
}

function moverFilaDeLista(user,respuesta) {
	var idNo= 'jugadorNo_' +user;
	var idCompletoNo = '#'+idNo;
	
	var idSi= 'jugadorSi_' +user;
	var idCompletoSi = '#'+idSi;

	if(respuesta=='si'){
		aparecerDesaparecer(idCompletoNo,idCompletoSi,idSi,'#confirmados')
	}else{
		aparecerDesaparecer(idCompletoSi,idCompletoNo,idNo,'#noConfirmados')
	}
}
/*
* oculta el li segun el idCompletoHide
* le cambia el id ya que pasa de una lista a otra
* agrega como primer elemento de la lista a la que pasa a formar parte
* muestra con el nuevo idCompleto
*/
function aparecerDesaparecer (idCompletoHide,idCompletoShow,idNuevo,idInsertAfter) {
		jQuery(idCompletoHide).hide();
		jQuery(idCompletoHide).attr('id',idNuevo);
		$(idCompletoShow).insertAfter(idInsertAfter);
		$(idCompletoShow).show();
}

</script>

@stop

