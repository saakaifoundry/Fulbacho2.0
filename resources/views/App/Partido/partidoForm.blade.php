<div class="form-group">
	{!!Form::label('Cancha','',array('class'=>'col-md-4 control-label')) !!}
	<div class="col-md-6">
		{!!Form::text('cancha',null,array('id'=>'canchas','class'=>'form-control'))!!}
	</div>
</div>

<div class="form-group">
	{!!Form::label('Fecha','',array('class'=>'col-md-4 control-label')) !!}
	<div class="col-md-6">
		{!!Form::input('date','fecha',date('Y-m-d'),array('class'=>'form-control'))!!}
	</div>
</div>

<div class="form-group">
	{!!Form::label('Horario','',array('class'=>'col-md-4 control-label')) !!}
	<div class="col-md-6">
		{!!Form::text('horario',null,array('class'=>'form-control'))!!}
	</div>
</div>

<div class="form-group">
	{!!Form::label('Precio','',array('class'=>'col-md-4 control-label')) !!}
	<div class="col-md-6">
		{!!Form::text('precio',null,array('class'=>'form-control'))!!}
	</div>
</div>

<div class="form-group">
	{!!Form::label('Cantidad de Jugadores','',array('class'=>'col-md-4 control-label')) !!}
	<div class="col-md-6">
		{!!Form::text('cantJugadores',null,array('class'=>'form-control'))!!}
	</div>
</div>

<div class="form-group">
	{!!Form::label('Grupo','',array('class'=>'col-md-4 control-label')) !!}	
	<div class="col-md-6">
		{!!Form::text('grupo',null,array('class'=>'form-control'))!!}
	</div>
</div>

<div class="form-group">
	{!!Form::label('Contacto','',array('class'=>'col-md-4 control-label')) !!}		
	<div class="col-md-6">
		{!!Form::text('contacto',null,array('class'=>'form-control'))!!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-6 col-md-offset-4">
		<button type="submit" class="btn btn-primary form-control">
			Crear
		</button>
	</div>
</div>