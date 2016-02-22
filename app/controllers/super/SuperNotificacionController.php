<?php  namespace super;

use Anuncia\Repositorios\NotificacionRepo;

class SuperNotificacionController extends \BaseController
{
	protected $notificacionRepo;
	
	public function __construct(NotificacionRepo $notificacionRepo)
	{
		$this->notificacionRepo = $notificacionRepo;
	}

	/* Muestra las notificaciones expiradas de toda la aplicación */
	public function notificacionesExpiradas()
	{
		$notificaciones = $this->notificacionRepo->notificacionesExpiradas();
		$numeroExpiradas = $this->notificacionRepo->enumerarNotificacionesExpiradas();
		return \View::make('modulos.super.notificacionesexpiran', 
							compact('notificaciones','numeroExpiradas')
				);
	}
	
	/* Elimina notificaciones expiradas */
	public function eliminarNotificacionesExpiradas()
	{
		$notificaciones = $this->notificacionRepo->notificacionesExpiradas();

		if (! empty($notificaciones))
		{
			if ($this->notificacionRepo->eliminarNotificacionesExpiradas($notificaciones))
			{
				return \Redirect::route('super.notificaciones')->with('status_ok', 'Notificaciones expiradas
																					fueron eliminadas 
																					correctamente');
			}
			
			return \Redirect::route('super.notificaciones')->with('status_error', 'No se pudieron eliminar 
																				   notificaciones expiradas');
		}
	}

}
