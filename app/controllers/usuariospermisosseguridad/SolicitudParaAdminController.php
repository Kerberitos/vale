<?php namespace usuariospermisosseguridad;

use Anuncia\Repositorios\PostulanteRepo;

class SolicitudParaAdminController extends \BaseController{
	protected $postulanteRepo;
	/*Constructor para asignar el repositorio que manipulará la entidad Postulante */
	public function __construct(PostulanteRepo $postulanteRepo)
	{
		$this->postulanteRepo = $postulanteRepo;		
	}

	public function postularAdministrador()
	{
		$usuarioId = \Auth::id();

		$postulante = $this->postulanteRepo->buscarPostulante($usuarioId);

		if (empty($postulante))
		{
			$postulante = $this->postulanteRepo->nuevoPostulante($usuarioId);
			
			$this->postulanteRepo->save($postulante);
		}

		return \View::make('mensajes.postulacion');
	}
}