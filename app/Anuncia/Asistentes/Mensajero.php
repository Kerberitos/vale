<?php namespace Anuncia\Asistentes;

class Mensajero
{
	protected $accion;
	protected $archivo = 'mensajes.';
	protected $estado;
	protected $mensajes;
	
	
	public function __construct($consejo)
	{
		$this->estado = $consejo['estado'];
		$this->accion = $consejo['accion'];
	} 
	
	/* Devuelve un array con el correspondiente mensaje extraido del archivo mensajes.php*/
	// miradita/app/config/mensajes.php
	public function getMensaje()
	{
		$this->mensajes = \Config::get($this->archivo.$this->accion.'.'.$this->estado);
		
		
		return $this->mensajes;
	}
	
	
}
