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

            if (file_exists('../app/controladores/' .ucwords($url[0]).'.php')) {
                # code...
                $this->controladorActual = ucwords($url[0]);


                //unset indice
                unset($url[0]);
            }

            //requerir el controlador
            require_once '../app/controladores/' . $this->controladorActual . '.php';
            $this->controladorActual = new $this->controladorActual;

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