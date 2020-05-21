<?php
	

	//Clase controlador principal
	//Se encarga de porder cargar los modelos y las vistas
	Class Controlador{
		//Cargar modelo
		public function modelo($modelo)
		{
			//Cargar
			require_once '../app/modelos/' . $modelo . '.php';
			//instanciar el modelo
			return new $modelo();
		} 

		public function vista($vista, $datos = [])
		{
			//chaquear si el archivo existe
			if (file_exists('../app/vistas/'. $vista . '.php')) {
				require_once '../app/vistas/' . $vista . '.php';
			}else{
				die('La vista no existe');
			}
		}
	}