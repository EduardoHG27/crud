<?php
//Traer la url ingresada en el navegador
// 1 controlador
// 2 metodo
// 3 parametro
//ejemplo /artuculos/actualizar/4
class Core
{
     protected $controladorActual='Paginas';
     protected $metodoActual='index'; 
     protected $parametros=[];

     
//constructor
     public function __construct()
     {
        $url = $this->getUrl();
    
        if (empty($url)) {
            
            if(file_exists('../app/controlador/'.ucwords($url).'.php')){
                //si existe
               
                       
                           $this->controladorActual= ucwords($url);
                           unset($url);
                       }
        }
        else
        {
             //buscar si el controlador exite
       if(file_exists('../app/controlador/'.ucwords($url[0]).'.php')){
        //si existe
       
               
                   $this->controladorActual= ucwords($url[0]);
                   unset($url[0]);
               }
        }

      
//requerir el controlador
        require_once '../app/controlador/'.$this->controladorActual.'.php';
        $this->controladorActual = new $this->controladorActual;
        //requerir metodo
        if(isset($url[1]))
        {
            if(method_exists($this->controladorActual,$url[1])){
                //checar metodo
                $this->metodoActual = $url[1];
                unset($url[1]);
            }
        }
       //optener parametros
       $this->parametros=$url ? array_values($url) : [];
       //llamar callback con parametros array
       call_user_func_array([$this->controladorActual,$this->metodoActual],$this->parametros);

    }
     public function getUrl()
     {
        if(isset($_GET['url']))
        {
            $url =rtrim($_GET['url'],'/');
            $url =filter_var($url,FILTER_SANITIZE_URL);
            $url =explode('/',$url);
           
            return $url;

        }


     }

}
?>