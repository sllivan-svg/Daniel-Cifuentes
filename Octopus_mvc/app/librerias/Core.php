<?php

        /*
        Mapear la URL ingresada en el 
        Navegador
        1-Controlador
        2-Metodo
        3-Parámetro
        Ejemplo /articulo/actualizar/4
        */
        class Core{
            protected $controladorActual = 'paginas';
            protected $metodoActual = 'index';
            protected $parametros = [];

        //constructor
        public function __construct(){
            //print_r($this->getUrl());
            $url = $this->getUrl();

            //Buscar en constructores si el controlador existe
            if (file_exists('../app/controladores/' .ucwords($url[0]) .'.php')) 
            {
             //Si existe se setea como controlador principal
             $this->controladorActual = ucwords($url[0]);

             //unset indice
             unset($url[0]);  
            }

            //requerir el controlador
            require_once '../app/controladores/' . $this->controladorActual . '.php';
            $this->controladorActual = new $this->controladorActual;

            //chequear la segunda parte de la url que seria el metodo
            if (isset($url[1])) {
                if (method_exists($this->controladorActual, $url[1])) {
                    //chequeamos el metodo
                    $this->metodoActual = $url[1];

                    unset($url[1]);
            }
            
        }
        //paar probar traer metodo
        //echo $this->metodoActual;

        //obtener los parametros
        $this->parametros = $url ? array_values($url): [];
        //llamar cllback con parametros array
        call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
        }

        public function getUrl(){
            //echo $_GET['url'];
            if (isset($_GET['url'])) {
                # code...
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }

       }
