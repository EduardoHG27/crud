<?php
//se encarga en de poder cargar los modelos y las vistas
    class Controlador
    {
        
        public function modelo($modelo)
        {
            //carga modelo
          
            require_once'../app/modelos/'.$modelo.'.php';
            //instanciar modelo
            return new $modelo();
        }

        public function vista($vista,$datos=[])
        {
        //    verificar que la vista existe
            if(file_exists('../app/vistas/'.$vista.'.php'))
                {
                    require_once'../app/vistas/'.$vista.'.php';
                }
                else
                {
                    die("La vista no existe");
                }
       
        }

        protected function getLibreary($libreria)
	{
       
    $rutaLibreria = RUTA_APP .'/'. 'librerias' .'/'. $libreria . '.php';
       
		if(is_readable($rutaLibreria)){
			require_once $rutaLibreria;
		}
		else{
			throw new Exception('Error de libreria');
		}
	}
    }
?>