<?php  namespace super;

use Anuncia\Repositorios\AnuncioRepo;

class SuperAnuncioController extends \BaseController
{
	protected $anuncioRepo;
	
	
	public function __construct(AnuncioRepo $anuncioRepo)
	{
		$this->anuncioRepo = $anuncioRepo;
	}

	/* Muestra anuncios expirados*/	
	public function anunciosExpirados()
	{
		$anuncios = $this->anuncioRepo->anunciosExpirados();
		$numeroExpirados = $this->anuncioRepo->enumerarAnunciosExpirados();
		
		return \View::make('modulos.super.anunciosexpiran', 
							compact('anuncios','numeroExpirados')
				);
	}
	
	/* Desactiva anuncios expirados */
	public function desactivarAnunciosExpirados()
	{
		$anuncios = $this->anuncioRepo->anunciosExpirados();

		if (! empty($anuncios))
		{
			if ($this->anuncioRepo->desactivarExpirados($anuncios))
			{
				return \Redirect::route('super.anuncios')->with('status_ok', 
																'Anuncios expirados fueron 
																 desactivados correctamente');
			}
			
			return \Redirect::route('super.anuncios')->with('status_error', 
															'No se pudieron desactivar 
															 los anuncios expirados');
		}
	}

}
