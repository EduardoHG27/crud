<?php

class C_Sesion extends Controlador
{
    public function __construct()
    {
            $this->sesionModelo=$this->modelo('Sesion');
    }

    public function iniciar_sesion()
    {

      
      $datos= array(
            'txtusuario' =>  $txtusuario=$_POST['txtusuario'],
            'txtpass' =>  $txtpass= md5($_POST['txtpass'])
        );
    
    

        $res=$this->sesionModelo->iniciarSesion($datos);

        if ($res['estado'] == 'success') {
            echo json_encode($res);
        } else if ($res['estado'] == 'error') {
            echo json_encode($res);
            }


    }

    public function S_CAJA()
    {

      
      $datos= array(
            'txtusuario' =>  $txtusuario=$_POST['txtusuario'],
            'txtpass' =>  $txtpass= $_POST['txtpass']
        );
    
    

        $res=$this->sesionModelo->iniciarSesioncajas($datos);

        
        if ($res['estado'] == 'success') {
            echo json_encode($res);
        } else if ($res['estado'] == 'error') {
            echo json_encode($res);
            }


    }
   

    public function save_nocuenta()
    {
        $datos= array(
            'txt_nocuenta' =>  $txt_nocuenta=$_POST['txt_nocuenta']
            
        );

        
        var_dump($datos);

        $res=$this->sesionModelo->guardar_cuenta($datos);
        
        if ($res['estado'] == 'success') {
            echo json_encode($res);
        } else if ($res['estado'] == 'error') {
            echo json_encode($res);
            }
    }

}