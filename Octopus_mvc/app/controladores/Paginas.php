<?php

	class Paginas extends Controlador{
		public function __construct(){
			//echo "Controlador de paginas cargando";
		}

		public function index(){
			$this->vista('paginas/inicio');
		}

		public function articulo(){

		}

		public function actualizar($num_registro){
			echo $num_registro;
		}
	}