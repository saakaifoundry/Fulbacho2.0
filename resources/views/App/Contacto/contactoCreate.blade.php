<div id="add" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="mySmallModalLabel">Contacto Nuevo</h4>
                </div>
                <div class="modal-body">
                <div class="alert alert-success">
                    <p>Completá alguno de los campos para buscar un contacto </p>
                 </div>
                 @if( Session::has('modal_message_error'))
                     <div class="alert alert-danger">
                        <p>Contacto ya agregado</p>
                     </div>
                @endif
                    {!!Form::open(array("method" => "POST","action" => "ContactoController@store","role" => "form", 'class'=>'form-horizontal'))!!}

                        <div class="form-group">
                            <label class="col-md-4 control-label">E-Mail</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nombre</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nombre" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Teléfono</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="telefono" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!!Form::submit('Crear', ['class'=>'btn btn-primary form-control'])!!}
                            </div>
                        </div>

                    {!!Form::close()!!}
                </div>
            </div>
        </div>
</div>