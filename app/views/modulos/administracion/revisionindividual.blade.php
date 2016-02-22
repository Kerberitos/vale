@extends('layout')
@section('contenido')
	
<div class="contenedor-interno">

	<div class="text-center">
		<h2>Detalles del anuncio</h2>
	</div>

	<div class="row">
	{{-- Form::open(['route'=>'clasificadocreado', 'method'=>'POST', 'role'=>'form','files' => true, 'novalidate']) --}}		@if(Session::has('status_ok'))
			<p class="alert alert-success">{{Session::get('status_ok')}}</p>

		@endif

		<div class="col-xs-12  col-sm-offset-2 col-sm-8 col-md-offset-1 col-md-10 cabeza">
			<div class="row">
				<div class="col-xs-12">
		            <div class="alert-message alert-message-info">
				        <div class="row">
						    <div class="col-xs-12 col-sm-3 col-md-2">
						        <label>Sección:</label>
						    </div>
							 
						    <div class="col-xs-12 col-sm-6 col-md-4">
						        <p >  
						        {{strtoupper($anuncio->seccion_title)}}
						        </p>
						    </div> 
						</div>

						<div class="row">
						    <div class="col-xs-12 col-sm-3 col-md-2">
						        <label>Categoría:</label>
							</div>
							 
							<div class="col-xs-12 col-sm-6 col-md-4">
						    	<p >  
							    	{{ $anuncio->categoria->categoria}}
								</p>
						    </div> 
						</div>
							    
						<div class="row">
						    <div class="col-xs-12 col-sm-3 col-md-2">
						        <label>Subcategoría:</label>
						    </div>
							<div class="col-xs-12 col-sm-6 col-md-4">
							    <p >  
							        {{ $anuncio->subcategoria->subcategoria}}
							    </p>
							</div> 
						</div>
			        </div>
        		</div>
			</div><!--fin row2-->
		</div><!--fin cabeza-->		


		<div class="col-xs-12  col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
			
			@if($anuncio->estado_id==6)
				<p class="subtitulo">Motivo de denuncia:</p>
				<p class="alert alert-warning alert-size">{{$denuncia->motivo }}</p>

			@endif

			
		
	
			
		</div>		
		
		@if(Auth::check())
			@if(Auth::id()==$anuncio->usuario_id)
			<div class="col-xs-12  col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
				<p class="alert alert-info">Este anuncio fue creado por ti.</p>
			</div>
			@endif
		@endif

		<div class="col-xs-12  col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 titulo-anuncio">
			{{  mb_strtoupper($anuncio->titulo)}}
		</div>

		@if($anuncio->seccion_id==1)
			<div class="col-xs-12  col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 valor-anuncio">
				<div class="col-xs-12 col-sm-6 col-md-5 col-lg-4">
					<div class="cuadro-precio cuadro-default">
						<div class="producto-{{$anuncio->estado}}">
							<div class="opcionvalor-text">
								{{-- $anuncio->opcionvalor --}}	
								{{ strtoupper($anuncio->estado)}}						
							</div>
						</div>
						<div class="cuadro-precio-contenido">
							<span>
								{{ strtoupper("$ ". $anuncio->valor)}}
							</span>
								
							
							<div>
								{{-- strtoupper($anuncio->estado)--}}
								{{ $anuncio->opcionvalor }}	
							</div>
						</div>
					</div>
				</div>
			</div>
		@endif

		<div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10  accion-anunciante">

			
				<p>El anunciante <span class="label label-success">{{$anuncio->pregunta_title}}</span></p>
			 

		</div>


		<div class="col-xs-12  col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">

				<!--Aqui debe ir segmento informacion del anuncio-->
			<div class="row">


				@if($anuncio->seccion_id!=3)
				<div class="col-xs-12 col-sm-6 col-md-6">

					<!--carrusel de fotos-->
					@include('modulos.anuncios.ver.detalles.detallefotos')
					
				</div>
				@endif
				

				


				<div class="col-xs-12 col-sm-6 col-md-6 detalleanuncio">

					@if($anuncio->seccion_id==3)
						<label>INFORMACIÓN</label>

			 			<p><span>Sueldo estimado: </span>{{ $anuncio->valor }}</p>
						<p><span>Tipo: </span>{{ $anuncio->tipo_title }}</p>
					@endif
					

					<!--detalle..descripcion del anuncio-->
					@include('modulos.anuncios.ver.detalles.detalleanuncio')

					
				</div>

				<div class="col-xs-12 col-sm-6 col-md-6">
					@if($anuncio->seccion_id==2)
						@if( $anuncio->direccion)
							<p><span><strong>Dirección: </strong></span>{{$anuncio->direccion}}</p>
						@endif
					@endif
				</div>
			</div>
		</div>

		<div class="col-xs-12  col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
			<div class="col-xs-12 col-sm-6 col-md-6">	
				@include('modulos.anuncios.ver.detalles.detalleanunciante')
			</div>

			
		</div>


		{{--Solo mostrar botones activar y desactivar si anuncio tiene estado de revision--}}
		@if($anuncio->estado_id==5)
			@include('modulos.administracion.segmentos.botonespublicacionrechazo')
		@endif

		{{--Solo mostrar botones bloquear y anuncio normal cuando el anucnio tiene estado de denunciado--}}
		@if($anuncio->estado_id==6)
			@include('modulos.administracion.segmentos.botonesbloqueonormalidad')
			
		@endif

	</div><!--fin row-->
	{{-- Form::close() --}}
	@if($anuncio->estado_id==6)
		@include('modales.modaldenunciaaprobada')
		@include('modales.modaldenunciarechazada')
	@endif
</div><!--fin contenedor-interno-->
@include('modales.mensajedesdeanuncio')
@include('modales.modalagendaranunciante')
@include('modales.modalaprobaranuncio')
@include('modales.modalrechazaranuncio')
@stop