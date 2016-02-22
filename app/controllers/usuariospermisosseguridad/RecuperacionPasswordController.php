<?php namespace usuariospermisosseguridad;

use Anuncia\Managers\EditarPasswordManager;
use Anuncia\Managers\CorreoSimpleManager;

use Anuncia\Repositorios\UsuarioRepo;

use Anuncia\Asistentes\Cartero;

class RecuperacionPasswordController extends \BaseController
{
	# objeto que hara consultas a la entidad Usuario
	protected $usuarioRepo;
	
	// Constructor para asignar el repositorio que manipulará la entidad Usuario 
	public function __construct(UsuarioRepo $usuarioRepo)
	{
		$this->usuarioRepo=$usuarioRepo;
	}

	/* Muestra formulario para solicitar recuperación de password */
	public function getRecuperacionPassword()
	{
		return \View::make('modulos.usuariospermisosseguridad.recuperacionpassword', 
							compact('usuario')
				);
	}

	/* Genera enlace de recuperación de password */
	public function postRecuperacionPassword()
	{
		$correo = \Input::get('correo');
	
		$usuario = $this->usuarioRepo->buscarUsuarioCorreo($correo);

		if (! empty($usuario))
		{
			try
			{	
				$estado = $usuario->estado->estado;

				// Comprobar si usuario está activado
				if ($estado == 'activado')
				{
					/* necesita try-catch para indicar inicio de transacciones*/
					\DB::beginTransaction();

					$manager = new CorreoSimpleManager($usuario, \Input::all());

					if ($manager->isValid())
					{

						# uniqid Obtiene un identificador único prefijado basado en la hora actual en microsegundos.
						// random almacena el TOKEN de comprobación
						$usuario->random = uniqid('rec_',true);
						$manager->save();
						
						# cartero envía email con enlace a formulario para establecer nuevo password
						$cartero = new Cartero();
						$cartero->cartaRecuperacionPassword($usuario);
						
						/* necesita try-catch para indicar fin de transacciones*/
						\DB::commit();
						
						return \View::make('mensajes.usuarioencontradorecuperacion',
											compact('usuario')
								);
					}

					return \Redirect::back()->withInput()->withErrors($manager->getErrores());
				}

				return \Redirect::back()->with('cuentanoactivada_error', $estado);	
			
			}
			catch(\Exception $ex)
			{
				/* necesita try-catch para deshacer todas transacciones en caso de errores*/
				\DB::rollback();
				\Session::flash('error_de_registro_servidor',1);
					
				return \Redirect::back();
			}

		}
		// Si NO existe usuario
		return \Redirect::back()->with('noexisteusuario_error', 1);
	}

	/* Muestra formulario para establecer nuevo password después de solicitar recuperación de password */
	public function getNuevoPassword($id, $random)
	{
		$usuario = $this->usuarioRepo->buscarUsuarioRandomId($id, $random);

		if (! empty($usuario))
		{
			return \View::make('modulos.usuariospermisosseguridad.recuperacionnewpassword',
								compact('usuario')
					);
		}
		
		return \View::make('mensajes.errorrecuperacion');
	}

	/* Guarda nuevo password */
	public function postNuevoPassword()
	{

		$correo = \Input::get('correo');

		$usuario = $this->usuarioRepo->buscarUsuarioCorreo($correo);
		
		$usuario->random = uniqid('mir_',true);
		$usuario->bandera_social = false;

		$manager = new EditarPasswordManager($usuario, \Input::all());

		if ($manager->save())
		{
			return \View::make('mensajes.correctarecuperación', 
								compact('usuario')
					);
		}

		return \Redirect::back()->withInput()->withErrors($manager->getErrores());
	}

}