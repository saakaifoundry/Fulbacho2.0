@extends('app')

@section('head')
<title>Contactos</title>
<link href="{{ asset('/css/contactos.css') }}" rel="stylesheet">
@stop

@section('content')



    <div id="popupmodal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Notification: Please read</h3>
        </div>
        <div class="modal-body">
            <p>
                sdsdfsdgdfghdfg
            </p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        </div>
    </div>



<div class="row">
        <div class="col-xs-12 col-sm-offset-3 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading c-list">
                    <span class="title">Contactos</span>
                    <ul class="pull-right c-controls">
                        <li><a href="#add" data-toggle="tooltip" data-placement="top" title="Nuevo Contacto"><i class="glyphicon glyphicon-plus"></i></a></li>
                        <li><a href="#" class="hide-search" data-command="toggle-search" data-toggle="tooltip" data-placement="top" title="Toggle Search"><i class="fa fa-ellipsis-v"></i></a></li>
                    </ul>
                </div>
                
                <div class="row" style="display: none;">
                    <div class="col-xs-12">
                        <div class="input-group c-search">
                            <input type="text" class="form-control" id="contact-list-search">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search text-muted"></span></button>
                            </span>
                        </div>
                    </div>
                </div>
                
                <ul class="list-group" id="contact-list">
                <!--	@foreach ($contactos as $contacto)
						<li class="list-group-item">
    	                    <div class="col-xs-12 col-sm-3">
                        	    <img src="/images/{{$contacto->image}}" alt="{{ $contacto->name }}" class="img-responsive img-circle" />
                        	</div>
                        	<div class="col-xs-12 col-sm-9">
                            <span class="name"> {{ $contacto->name }} </span><br/>
                            <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="{{$contacto->email}}"></span>
                            <span class="visible-xs"> <span class="text-muted">{{$contacto->email}}</span><br/></span>
                        </div>
                        <div class="clearfix"></div>
                    </li>
					@endforeach-->
                </ul>
            </div>
        </div>
	</div>

@include('App/Contacto/contactoCreate')

@stop

@include('App/Contacto/contactoScript')