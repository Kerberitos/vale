<?php  namespace super;

use Anuncia\Repositorios\AnuncioRepo;
use Anuncia\Repositorios\NotificacionRepo;

class SistemaController extends \BaseController
{
	protected $anuncioRepo;
	protected $notificacionRepo;
	
	public function __construct(AnuncioRepo $anuncioRepo,
								NotificacionRepo $notificacionRepo)
	{

		$this->anuncioRepo = $anuncioRepo;
		$this->notificacionRepo = $notificacionRepo;
	}

	/* Muestra el Panel de Sistema */
	public function panelSistema()
	{
		
		$numAnunciosExpirados = $this->getNumeroAnunciosExpirados();
		$numNotificacionesExpiradas = $this->getNumeroNotificacionesExpiradas();

		return \View::make('modulos.super.panelsystem', 
							compact('numAnunciosExpirados',
									'numNotificacionesExpiradas')

				);


	}

	/* Obtiene el número de anuncios expirados */
	public function getNumeroAnunciosExpirados()
	{
		return $this->anuncioRepo->enumerarAnunciosExpirados();		
	}
	
	/* Obtiene el número de notificaciones expiradas */
	public function getNumeroNotificacionesExpiradas()
	{
		return $this->notificacionRepo->enumerarNotificacionesExpiradas();		
	}

}
