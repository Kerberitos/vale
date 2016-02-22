@extends('layout')
@section('contenido')
<div class="contenedor-interno">
    <div class="text-center">
        <h4>Detalles del usuario</h4>
    </div>
     @if (Session::has('status_error'))
          <p class="alert alert-danger alert-size">{{Session::get('status_error')}} </p>
          @endif
          @if (Session::has('status_ok'))
          <p class="alert alert-success alert-size">{{Session::get('status_ok')}} </p>
    @endif
<div class="row">
    <div class="col-xs-12  col-sm-offset-1 col-sm-5 panel-informacion-admin espacio-superior-peq">
      <div class="text-center">
        <label class="texto-azul espacio-superior-peq">Información general</label>
        <div class="foto-veradministrador">
          
        
              @if($usuario->foto)
                <img src="{{ asset($usuario->foto) }}" class="img-responsive" alt="">

              @else
                @if($usuario->genero=='male')
                  <img src="{{ asset('assets/images/usuario_hombre.png')}}" class="img-responsive" alt="">
                @else
                  <img src="{{ asset('assets/images/usuario_mujer.png')}}" class="img-responsive" alt="">
                @endif
              @endif
        </div>
      </div>
        <div class="row linea-separadora espacio-superior-peq">
          
        </div>
        <div class="row linea-separadora espacio-superior-peq">
              <div class="col-xs-12 col-sm-3">
                  {{ Form::label('id_usuario','Id:') }}
              </div>
         
              <div class="col-xs-12 col-sm-9">
                    <p>  
                        {{ $usuario->id }}
                    </p>
              </div> 
        </div>
        <div class="row linea-separadora">
              <div class="col-xs-12 col-sm-3">
                  {{ Form::label('correo','Correo:') }}
              </div>
         
              <div class="col-xs-12 col-sm-9">
                    <p class="lbl-detalle-correo">  
                        {{ $usuario->correo }}
                    </p>
              </div> 
        </div>
         <div class="row linea-separadora">
              <div class="col-xs-12 col-sm-3">
                  {{ Form::label('telefono','Teléfono:') }}
              </div>
         
              <div class="col-xs-12 col-sm-9">
                    <p >  
                        {{ $usuario->telefono }}
                    </p>
              </div> 
        </div>
         <div class="row linea-separadora">
              <div class="col-xs-12 col-sm-3">
                  {{ Form::label('celular','Celular:') }}
              </div>
         
              <div class="col-xs-12 col-sm-9">
                    <p >  
                        {{ $usuario->celular }}
                    </p>
              </div> 
        </div>
        <div class="row linea-separadora">
              <div class="col-xs-12 col-sm-3">
                  {{ Form::label('compania','Compañia:') }}
              </div>
         
              <div class="col-xs-12 col-sm-9">
                    <p >  
                        {{ $usuario->compania->nombre }}
                    </p>
              </div> 
        </div>





       <div class="row linea-separadora">
              <div class="col-xs-12 col-sm-3">
                  {{ Form::label('nombres','Nombres:') }}
              </div>
         
              <div class="col-xs-12 col-sm-9">
                    <p >  
                        {{ $usuario->nombres }}
                    </p>
              </div> 
        </div>
        <div class="row linea-separadora">
              <div class="col-xs-12 col-sm-3">
                  {{ Form::label('genero','Género:') }}
              </div>
         
              <div class="col-xs-12 col-sm-9">
                    <p >  
                        {{ $usuario->genero_title }}
                    </p>
              </div> 
        </div>

        <div class="row linea-separadora">
              <div class="col-xs-12 col-sm-3">
                  {{ Form::label('rol','Rol:') }}
              </div>
         
              <div class="col-xs-12 col-sm-9">
                    <p>  
                        
                      @if($usuario->rol_id==1)
                        <span class="label label-primary texto-blanco text-center">
                          {{ $usuario->rolvistoso_title}}
                        </span> 
                      @elseif($usuario->rol_id==2)
                        <span class="label label-warning texto-blanco text-center">
                          {{ $usuario->rolvistoso_title}}
                        </span> 


                      @elseif($usuario->rol_id==3)
                        <span class="label label-danger texto-blanco text-center">
                          {{ $usuario->rolvistoso_title}}
                        </span> 

                      @endif
                        
                        
                        
                    </p>
              </div> 
        </div>

        
        <div class="row linea-separadora">
              <div class="col-xs-12 col-sm-3">
                  {{ Form::label('registrado','Registrado:') }}
              </div>
         
              <div class="col-xs-12 col-sm-9">
                    <p >  
                        Desde el {{$usuario->created_at->format('j').' de '.$usuario->created_at->format('M').' del '.$usuario->created_at->format('Y') }}
                    </p>
              </div> 
        </div>
        <div class="row linea-separadora">
              <div class="col-xs-12 col-sm-3">
                  {{ Form::label('estado','Estado:') }}
              </div>
         
              <div class="col-xs-12 col-sm-9">
                    <p >  
                      @if($usuario->estado_id==1)
                        <span class="label label-success input-sm texto-blanco text-center">
                          {{ $usuario->estado->estado}}
                        </span> 
                      @elseif($usuario->estado_id==2)
                        <span class="label label-warning input-sm texto-blanco text-center">
                          {{ $usuario->estado->estado}}
                        </span> 


                      @elseif($usuario->estado_id==3)
                        <span class="label label-bloqueado input-sm texto-negro text-center">
                          {{ $usuario->estado->estado}}
                        </span> 

                      @endif
                    </p>
              </div> 
        </div>
        <div class="row">
              <div class="col-xs-12 col-sm-3">
                  {{ Form::label('sociallogin','Social login:') }}
              </div>
         
              <div class="col-xs-12 col-sm-9">
                    <p>
                        @if($usuario->bandera_social==true)
                            Si, ingresó con red social
                        @else
                            No, ingresó por correo
                        @endif  
                        
                    </p>
              </div> 
        </div>
    </div><!--fin panel informacion admin izquierda-->
    
    <div class="col-xs-12 col-sm-offset-1 col-sm-5 panel-informacion-admin espacio-superior-peq">
        <label class="texto-azul espacio-superior-peq">Historial de sus anuncios y denuncias</label>

        @if($usuario->estado->estado=="bloqueado")
        <p class="alert alert-success col-xs-12 text-center">
          La cuenta de {{$usuario->nombres}} fue bloqueada porque 

           @if($usuario->historial)
               
                @if($usuario->historial->anunciosbloqueados >= $configuracionActual->anunciosbloqueados )
                    modificó {{$usuario->historial->anunciosbloqueados}} de sus anuncios ya publicados con contenido que infringe las normas de uso.
                
                @elseif(($usuario->historial->denunciasfalsas - $usuario->historial->denunciasverdaderas)>= $configuracionActual->contadordedenuncias )
                    abusó del sistema de denuncias.  
                @elseif($usuario->historial->comentarioseliminados >= $configuracionActual->comentariosbloqueados)
                    realizó {{$usuario->historial->comentarioseliminados}} comentarios con contenido que incumple alguna norma de uso.

                @endif

            @endif
        </p>
        @endif


        <div class="row linea-separadora espacio-superior-peq">
            <p class="informacion-adicional">Anuncios que ha creado</p>
            <div class="col-xs-12 col-sm-9">
                {{ Form::label('anuncioscreados','Anuncios creados:') }}
            </div>
             
            <div class="col-xs-12 col-sm-3">
              <p>
                {{$usuario->anuncios->count()}}
              </p>
            </div> 
        </div>
        
        <div class="row linea-separadora">
            <p class="informacion-adicional">Anuncios propios bloqueados</p>
            <div class="col-xs-12 col-sm-9">
                {{ Form::label('anunciosbloqueados','Anuncios bloqueados:') }}
            </div>
            
            <div class="col-xs-12 col-sm-3">
                @if($usuario->historial) 
                    <p>{{ $usuario->historial->anunciosbloqueados }}</p>
                @else
                    <p> 0</p>
                @endif
            </div> 
        </div>

        <div class="row linea-separadora">
              <p class="informacion-adicional">Comentarios propios bloqueados</p>
              <div class="col-xs-12 col-sm-9">
                  {{ Form::label('comentarioseliminados','Comentarios bloqueados:') }}
              </div>
             
              <div class="col-xs-12 col-sm-3">
                        @if($usuario->historial) 
                            <p>{{ $usuario->historial->comentarioseliminados }}</p>
                        @else
                            <p> 0</p>
                        @endif
              </div> 
                  
        </div>
            
            <div class="row linea-separadora">
                     
                 
                    <p class="informacion-adicional">Denuncias correctas realizadas como usuario</p>
                 
                 <div class="col-xs-12 col-sm-9">
                      
                      {{ Form::label('denunciasverdaderas','Denuncias verdaderas:') }}
                            
                  </div>
             
                  <div class="col-xs-12 col-sm-3">
                        @if($usuario->historial) 
                            <p>{{ $usuario->historial->denunciasverdaderas }}</p>
                        @else
                            <p> 0</p>
                        @endif
                  </div> 
                  
            </div>
            <div class="row">
                     
                 
                    <p class="informacion-adicional">Denuncias falsas realizadas como usuario</p>
                 
                 <div class="col-xs-12 col-sm-9">
                      
                      {{ Form::label('denunciasfalsas','Denuncias falsas:') }}
                            
                  </div>
             
                  <div class="col-xs-12 col-sm-3">
                        @if($usuario->historial) 
                            <p>{{ $usuario->historial->denunciasfalsas }}</p>
                        @else
                            <p> 0</p>
                        @endif
                  </div> 
                  
            </div>

            <div class="row">
                <p class="informacion-adicional">El contador de denuncias debe ser menor a 20</p>
                <div class="col-xs-12 col-sm-9">
                    {{ Form::label('contadordedenuncias','Contador de denuncias:') }}
                </div>
             
                <div class="col-xs-12 col-sm-3">
                    @if($usuario->historial) 
                      <p>{{ $usuario->historial->denunciasfalsas-$usuario->historial->denunciasverdaderas }}</p>
                    @else
                      <p> 0 </p>
                    @endif
                </div> 
            </div>






    </div><!--fin panel informacion admin derecha-->

              @if(\Auth::id()!= $usuario->id)
                <div class="col-xs-12  col-sm-offset-4 col-sm-4 ">
                    <a href="" data-toggle="modal" data-target="#escribirmensajeadmin"  class="btn col-xs-12 btn-warning btn-sm btn-separado espacio-superior-min" title="Enviar mensaje">
                      <i class="icon-envelope-2 hidden-xs">
                      </i>
                      Enviar mensaje
                    </a>

                </div>
                
                    @if (Auth::check())
                      @if(is_super()) 

                        @if($usuario->rol_id!=3)
                        <div class="col-xs-12 col-sm-offset-4 col-sm-4 ">
                            <a href="" data-toggle="modal" data-target="#modalascenderasuper" class="btn col-xs-12 btn-success btn-sm btn-separado espacio-superior-min" title="Ascender a super administrador">
                              <i class="glyphicon glyphicon-circle-arrow-up hidden-xs">
                              </i>
                                Ascender a super admin  
                            </a>

                        </div>

                         @endif
                        @if($usuario->rol_id==1)
                        <div class="col-xs-12 col-sm-offset-4 col-sm-4 ">
                            <a href="" data-toggle="modal" data-target="#modalascenderaadministrador" class="btn col-xs-12 btn-danger btn-sm btn-separado espacio-superior-min" title="Ascender a super administrador">
                              <i class="glyphicon glyphicon-circle-arrow-up hidden-xs">
                              </i>
                                Ascender a administrador  
                            </a>

                        </div>

                        @endif


                        @if($usuario->rol_id==3)
                        <div class="col-xs-12  col-sm-offset-4 col-sm-4 ">
                            <a href="" data-toggle="modal" data-target="#modaldescenderaadministrador"  class="btn col-xs-12 btn-primary btn-sm btn-separado espacio-superior-min" title="Asignar rol de usuario">
                              <i class="glyphicon glyphicon-circle-arrow-down hidden-xs">
                              </i>
                                Descender a administrador  
                            </a>
                        </div>
                        @endif



                        @if($usuario->rol_id!=1)
                        <div class="col-xs-12  col-sm-offset-4 col-sm-4 ">
                            <a href="" data-toggle="modal" data-target="#modaldescenderausuario"  class="btn col-xs-12 btn-danger btn-sm btn-separado espacio-superior-min" title="Asignar rol de usuario">
                              <i class="glyphicon glyphicon-circle-arrow-down hidden-xs">
                              </i>
                                Descender a usuario  
                            </a>
                        </div>
                        @endif

                        


                      @endif
                    @endif
                @endif


    <div class="col-xs-12">
          <div class="row">
              <a href="{{route('super.usuarios')}}"  class="btn btn-primary col-xs-12 col-sm-offset-4 col-sm-4 espacio-superior-peq" title=""><span class="glyphicon glyphicon-menu-left"></span> Panel de usuarios</a>
          </div>

        
    </div>
</div><!--fin row inicial-->

@include('modales.escribirmensajeadmin')
@include('modales.modalascenderasuper')
@include('modales.modaldescenderausuario')
@include('modales.modalascenderaadministrador')
@include('modales.modaldescenderaadministrador')
</div><!--fin contenedor interno-->
@stop