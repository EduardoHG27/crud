<?php

class C_Consultas extends Controlador
{
    public function __construct()
    {
        $this->usuarioModelo=$this->modelo('M_Consultas');
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


    
    public function pasar_dato_tabla()
    {
        $id=$_POST['id'];

  
        
        $resultado_sol=$this->usuarioModelo->obtener_datos_padron($id);
        
                
        // $estado=$resultado_sol['estado'];
        // $datos=$resultado_sol['datos'];
        
  
            if ($resultado_sol['estado'] == 'success') {
                echo json_encode($resultado_sol);
            } else if ($resultado_sol['estado'] == 'error') {
                echo json_encode($resultado_sol);
                }
    }

    

    public function insetar_queja()
    {
        $txt=$_POST['txt'];
        $folio=$_POST['folio'];

      
        
        $resultado_sol=$this->usuarioModelo->inse_q($folio,$txt);
        
       
        
  
            if ($resultado_sol['estado'] == 'success') {
                echo json_encode($resultado_sol);
            } else if ($resultado_sol['estado'] == 'error') {
                echo json_encode($resultado_sol);
                }
    }

    
    public function get_cort_con()
    {
        $datos= array(
            'sel_opt' =>  $sel_opt=$_POST['sel_opt'],
            'txt_importe' =>  $txt_importe=$_POST['txt_importe'],
            'txt_de' =>  $txt_de=$_POST['txt_de'],
            'txt_a' =>  $txt_hasta=$_POST['txt_a'],

        );
        $resultado_sol=$this->usuarioModelo->get_cort($datos);
        
       
        
  
            if ($resultado_sol['estado'] == 'success') {
                echo json_encode($resultado_sol);
            } else if ($resultado_sol['estado'] == 'error') {
                echo json_encode($resultado_sol);
                }
    }

    public function select_tipo()
    {
      
        $resultado_sol=$this->usuarioModelo->select_tip();
        
       
        
  
            if ($resultado_sol['estado'] == 'success') {
                echo json_encode($resultado_sol);
            } else if ($resultado_sol['estado'] == 'error') {
                echo json_encode($resultado_sol);
                }
    }

    public function cambiar_status()
    {
       
        $folio=$_POST['folio'];
        $resultado_sol=$this->usuarioModelo->change_status($folio);
        
       
        
  
            if ($resultado_sol['estado'] == 'success') {
                echo json_encode($resultado_sol);
            } else if ($resultado_sol['estado'] == 'error') {
                echo json_encode($resultado_sol);
                }
    }


    public function cargar_seg()
    {
        $id=$_POST['id'];
        
        $resultado_sol=$this->usuarioModelo->load_seg($id);
        
       
        
  
            if ($resultado_sol['estado'] == 'success') {
                echo json_encode($resultado_sol);
            } else if ($resultado_sol['estado'] == 'error') {
                echo json_encode($resultado_sol);
                }
    }



    public function show_queja()
    {
        $id=$_POST['id'];
        $resultado_sol=$this->usuarioModelo->mostrar_queja($id);
        
       
        
  
            if ($resultado_sol['estado'] == 'success') {
                echo json_encode($resultado_sol);
            } else if ($resultado_sol['estado'] == 'error') {
                echo json_encode($resultado_sol);
                }
    }

/// Formulario Datos Generales
public function tabla_ajax()
    {
        $datos= array(
            'txt_reg' =>  $txt_reg=$_POST['txt_reg'],
            'txt_com' =>  $txt_com=$_POST['txt_com']
        );

       
        
        $resultado_sol=$this->usuarioModelo->select_pad_consulta_ajax($datos);
        
                
        // $estado=$resultado_sol['estado'];
        // $datos=$resultado_sol['datos'];
        
  
            if ($resultado_sol) {
                echo json_encode($resultado_sol);
            } else if ($resultado_sol['estado'] == 'error') {
                echo json_encode($resultado_sol);
                }
    }

 public function buscar_reg_pad()
    {
        $datos= array(
            'txt_reg' =>  $txt_reg=$_POST['txt_reg'],
            'txt_com' =>  $txt_com=$_POST['txt_com']
        );
        
        $resultado_sol=$this->usuarioModelo->select_pad_consulta($datos);
        
                
        // $estado=$resultado_sol['estado'];
        // $datos=$resultado_sol['datos'];
        
  
            if ($resultado_sol['estado'] == 'success') {
                echo json_encode($resultado_sol);
            } else if ($resultado_sol['estado'] == 'error') {
                echo json_encode($resultado_sol);
                }
    }

    public function select_queja()
    {
        $datos= array(
            'sel_tipo' =>  $sel_tipo=$_POST['sel_tipo'],
            'sel_act' =>  $sel_act= $_POST['sel_act'],
            'sel_bri' =>  $sel_bri=$_POST['sel_bri'],
            'datepicker' =>  $datepicker=$_POST['datepicker'],
            'datepicker_1' =>  $datepicker_1=$_POST['datepicker_1']

        );
        
        $res=$this->usuarioModelo->sel_queja($datos);
        

        if ($res['estado'] == 'success') {
            echo json_encode($res);
        } else if ($res['estado'] == 'error') {
            echo json_encode($res);
            }
    }

    
    public function pasar_bri()
    {       
         $dat=$_POST['dat'];

     
        
        $res=$this->usuarioModelo->obtener_bri($dat);
        

        if ($res['estado'] == 'success') {
            echo json_encode($res);
        } else if ($res['estado'] == 'error') {
            echo json_encode($res);
            }
    }


    public function buscar_quej()
    {
        $datos= array(
            'sel_opt' =>  $sel_opt=$_POST['sel_opt'],
            'txt_cuenta'=> $txt_cuenta=$_POST['txt_cuenta'],
            'sel_act'=> $sel_act=$_POST['sel_act']
        );
        
       
      
        $resultado_sol=$this->usuarioModelo->search_quej($datos);
        
                
        // $estado=$resultado_sol['estado'];
        // $datos=$resultado_sol['datos'];
        
  
            if ($resultado_sol['estado'] == 'success') {
                echo json_encode($resultado_sol);
            } else if ($resultado_sol['estado'] == 'error') {
                echo json_encode($resultado_sol);
                }
    }

    public function combo_bri()
    {
        $id=$_POST['id'];
      
        $resultado_sol=$this->usuarioModelo->combo_brigada($id);
        
                
        // $estado=$resultado_sol['estado'];
        // $datos=$resultado_sol['datos'];
        
  
            if ($resultado_sol['estado'] == 'success') {
                echo json_encode($resultado_sol);
            } else if ($resultado_sol['estado'] == 'error') {
                echo json_encode($resultado_sol);
                }
    }

    public function guardar_bri()
    {
        $datos= array(
            'sel_bri' =>  $sel_bri=$_POST['sel_bri'],
            'txt_fol' =>  $txt_fol=$_POST['txt_fol']
        );
        
        $resultado_sol=$this->usuarioModelo->save_bri($datos);
        
                
        // $estado=$resultado_sol['estado'];
        // $datos=$resultado_sol['datos'];
        
  
            if ($resultado_sol['estado'] == 'success') {
                echo json_encode($resultado_sol);
            } else if ($resultado_sol['estado'] == 'error') {
                echo json_encode($resultado_sol);
                }
    }


/// Formulario Lecturas
    public function mostrar_lecturas()
    {
        $resultado_sol=$this->usuarioModelo->cargar_lecturas();

        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
     
    }

    public function datos_header()
    {
        $resultado_sol=$this->usuarioModelo->cargar_header();

        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
     
    }

    public function usuario_quejas()
    {
        $resultado_sol=$this->usuarioModelo->usuario_quej();

        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
     
    }

    public function dat_nodocto()
    {
        $datos= array(
            'numero' =>  $_POST['num'],
           
        );
        
        $resultado_sol=$this->usuarioModelo->cargar_nodocto($datos);

        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
     
    }

    public function select_trn()
    {
   
         
        $resultado_sol=$this->usuarioModelo->obtener_trn($_SESSION["no_cuenta"]);

       

        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    
    }

   

}