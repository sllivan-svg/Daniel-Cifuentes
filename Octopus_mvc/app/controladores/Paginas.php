<?php

class paginas extends Controlador{
	public function __construct(){
		//echo "Controlador de paginas cargando";
	}

	public function index(){

		$datos = [

			'titulo' => 'Bienvenidos a MVC Octopus'
		];

		$this->vista('paginas/inicio',$datos);
	}

	public function articulo(){
		//$this->vista('paginas/articulo');
	}

	public function actualizar($num_registro){
		echo $num_registro;
	}
} 