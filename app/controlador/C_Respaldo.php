<?php

class C_Respaldo extends Controlador
{
    public function __construct()
    {
            $this->sesionRespaldo=$this->modelo('M_Respaldo');
            $this->sesionModelo=$this->modelo('Sesion');
    }
    public function abrirCatalogo($tabla){
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $datos=[$tabla];
            
            if($this->usuarioModelo->mostrarCat($datos)){
                redireccionar('/paginas');
            }
            else
            {
                die('Algo salio mal..');
            }
        }
        else
        { 
                //$metodo="obtener_".$tabla;
                //$metodo=crearMetodo('obtener',$tabla);
                //$usuarios=$this->usuarioModelo->$metodo();
               
                $usuarios=$this->usuarioModelo->obtener_datos($tabla);
                $datos=['usuarios'=>$usuarios];

               
                $this->vista('tablas/form'.$tabla,$datos);
        }       
    }

  
    public function crear_respaldo()
    {
        $datos= array(
            'txt_usu' =>  $txt_usu=$_POST['txt_usu']
        );

    
        $res=$this->sesionRespaldo->generar_respaldo($datos);

        if ($res['estado'] == 'success') {
            echo json_encode($res);
        } else if ($res['estado'] == 'error') {
            echo json_encode($res);
            }
    }

    public function cargar_respaldo()
    {
        $datos= array(
            'txt_car' =>  $txt_car=$_POST['txt_car']
        );
        
        $res=$this->sesionRespaldo->load_backup($datos);

        if ($res['estado'] == 'success') {
            echo json_encode($res);
        } else if ($res['estado'] == 'error') {
            echo json_encode($res);
            }


    }
    public function arch_resp()
    {

        $res=$this->sesionRespaldo->bd_load_arch();

        if ($res['estado'] == 'success') {
            echo json_encode($res);
        } else if ($res['estado'] == 'error') {
            echo json_encode($res);
            }


    }
 
    public function chk_lecturas()
    {
        $datos= array(
            'txt_ejercicio' =>  $txt_ejercicio=$_POST['txt_ejercicio'],
            'txt_fecha' =>  $txtpass= $_POST['txt_fecha']
        );
    
      
        $res=$this->sesionRespaldo->check_lec($datos);

        if ($res['estado'] == 'success') {
            echo json_encode($res);
        } else if ($res['estado'] == 'error') {
            echo json_encode($res);
            }
    }


    public function chk_pagos()
    {
        $datos= array(
            'txt_ejercicio' =>  $txt_ejercicio=$_POST['txt_ejercicio'],
            'txt_fecha' =>  $txtpass= $_POST['txt_fecha']
        );
    
      
        $res=$this->sesionRespaldo->check_pag($datos);

        if ($res['estado'] == 'success') {
            echo json_encode($res);
        } else if ($res['estado'] == 'error') {
            echo json_encode($res);
            }
    }
    
    public function calculo()
    {
      
        $res=$this->sesionRespaldo->calculo_usuarios();

        if ($res['estado'] == 'success') {
            echo json_encode($res);
        } else if ($res['estado'] == 'error') {
            echo json_encode($res);
            }
    }

    public function debug()
    {
      
        $res=$this->sesionRespaldo->tab_debug();

        if ($res['estado'] == 'success') {
            echo json_encode($res);
        } else if ($res['estado'] == 'error') {
            echo json_encode($res);
            }
    }

    public function imprimir()
    {
        $datos= array(
            'txt_ruta' =>  $txt_ruta=$_POST['txt_ruta'],
            'txt_ruta2' =>  $txt_ruta2= $_POST['txt_ruta2'],
            'txt_folio' =>  $txt_folio=$_POST['txt_folio'],
            'txt_folio2' =>  $txt_folio2=$_POST['txt_folio2']
        );
    
    

        $res=$this->sesionRespaldo->gen_folio_caja($datos);


        if ($res['estado'] == 'success') {
            echo json_encode($res);
        } else if ($res['estado'] == 'error') {
            echo json_encode($res);
            }
    }

    
   
    
    
    
}