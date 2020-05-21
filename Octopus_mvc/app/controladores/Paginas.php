<?php

class paginas extends Controlador{

	public function __construct(){
		$this->articuloModelo = $this->modelo('Articulo');
		//echo "Controlador de paginas cargando";
	}

	public function index(){

		$articulos = $this->articuloModelo->obtenerArticulos();
		$datos = [

			'titulo' => 'Bienvenidos a MVC Octopus','articulos' =>$articulos
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