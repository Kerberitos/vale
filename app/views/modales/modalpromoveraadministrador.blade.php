 <div class="modal fade bs-example-modal-sm" id="modalpromoveraadministrador" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-circle-arrow-up hidden-xs"></span> Promover a administrador</h4>
            </div>
            
            <div class="modal-body" style="padding: 5px;">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <p> ¿Desea promover/ascender a administrador al postulante {{$usuario->nombres}}? Recuerde que un administrador tiene privilegios avanzados dentro del sistema de Miradita Loja, presione Promover si está seguro de esto</p>
                    </div>
                </div>
            </div>  
                
                

            <div class="modal-footer">
                <a href="{{route('ascender.administrador', [$usuario->id])}}" title="ascender" class="btn btn-warning">Promover </a>  
                <button style="float: right;" type="button" class="btn btn-default btn-close" data-dismiss="modal">Cerrar
                </button>
            </div>
            
        </div>
    </div>
</div>
