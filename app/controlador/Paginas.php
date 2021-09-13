<?php

class Paginas extends Controlador
{
    public function __construct()
    {
            $this->usuarioModelo=$this->modelo('Usuario');
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
    public function index()
    {
        //obtener los usuarios

        //$usuarios=$this->usuarioModelo->obtenerUsuarios();
        
     //   $datos = ['usuarios'=>$usuarios];
     $datos='';
        $this->vista('paginas/sesion',$datos);

    }
     public function formusuarios()
     {

        $datos = '';
        $this->vista('paginas/formusuarios',$datos);

     }

     
     public function form_modal_carga()
     {

        $datos = '';
        $this->vista('paginas/form_modal_carga',$datos);

     }
     

     public function form_modal_cajas()
     {

        $datos = '';
        $this->vista('paginas/form_modal_cajas',$datos);

     }
     
     public function form_cajas()
     {

        $datos = '';
        $this->vista('paginas/form_cajas',$datos);

     }
     public function cat_cajas()
     {

        $datos = '';
        $this->vista('paginas/form_cajas',$datos);

     }
     public function log_cajas()
     {

        $datos = '';
        $this->vista('paginas/form_log_cajas',$datos);

     }
     public function pagina_inicial()
     {

        $datos = '';
        $this->vista('paginas/index_1',$datos);

     }
     public function cerrar_sesion()
     {
        $datos = '';
        $this->vista('paginas/logout',$datos);
     }
     
     public function iniciar_sesion()
     {
        $datos= array(
            'txtusuario' =>  $txtusuario=$_POST['txtusuario'],
            'txtpass' =>  $txtpass= md5($_POST['txtpass'])
        );
    

        $res=$this->usuarioModelo->logueo($datos);

        if ($res['estado'] == 'success') {
            echo json_encode($res);
        } else if ($res['estado'] == 'error') {
            echo json_encode($res);
            }

       // $this->vista('paginas/logout',$datos);
     }

     public function logueo_1()
     {
      
        $datos = '';
        $this->vista('paginas/login',$datos);

     }
     public function logueo()
     {

        $datos = '';
        $this->vista('paginas/pag_web',$datos);

     }
     public function form_lecturas()
     {
        $GLOBALS['bandera']=1;
        $GLOBALS['sub_menu']=1;
        $datos = '';
        $this->vista('paginas/form_lecturas',$datos);

     }
     public function form_quejas()
     {
       
        $datos = '';
        $this->vista('paginas/form_quejas',$datos);

     }
     public function form_quejas_dat()
     {
        $GLOBALS['bandera']=1;
        $GLOBALS['sub_menu']=1;
        $datos = '';
        $this->vista('paginas/form_quejas_dat',$datos);

     }
     public function form_quejas_1()
     {
        
        $GLOBALS['menu_quejas']=1;
        $GLOBALS['nav1']='navbar navbar-light';
        $datos = '';
        $this->vista('paginas/form_quejas_1',$datos);

     }

     public function form_reporte()
     {
        
        $GLOBALS['menu_quejas']=1;
        $GLOBALS['nav']='navbar navbar-light';

        $datos = '';
        $this->vista('paginas/form_reporte_q',$datos);

     }

     

     public function form_acep_cont()
     {
        $GLOBALS['menu_cont']=1;
        $datos = '';
        $this->vista('paginas/form_aceptar_contr',$datos);

     }
     public function form_contratos()
     {
        $GLOBALS['menu_cont']=1;
      
        $datos = '';
        $this->vista('paginas/form_contratos',$datos);

     }

     public function form_operacion()
     {
        $GLOBALS['menu_op']=1;
      
        $datos = '';
        $this->vista('paginas/form_operacion',$datos);

     }
     public function form_liquidar()
     {
        $GLOBALS['menu_conv']=1;
      
        $datos = '';
        $this->vista('paginas/form_liquidar',$datos);

     }

     public function form_insertar()
     {
        $GLOBALS['menu_conv']=1;
      
        $datos = '';
        $this->vista('paginas/form_insertar',$datos);

     }

     
     public function form_prueba()
     {
        $GLOBALS['menu_conv']=1;
      
        $datos = '';
        $this->vista('paginas/pagina_tipoweb',$datos);

     }
     public function form_tabla()
     {
        $GLOBALS['menu_conv']=1;
      
        $datos = '';
        $this->vista('paginas/ejemploajax',$datos);

     }
     
     

     public function form_cargos()
     {
        
      
        $datos = '';
        $this->vista('paginas/form_cargos',$datos);

     }

     public function dash()
     {
        $datos = '';
        $this->vista('paginas/form_dash',$datos);
     }
     
       
     public function form_cortes()
     {
        $GLOBALS['menu_cortes']=1;
        $datos = '';
        $this->vista('paginas/form_cortes',$datos);
     }

     public function form_reconexiones()
     {
        $GLOBALS['menu_cortes']=1;
        $datos = '';
        $this->vista('paginas/form_reconexiones',$datos);
     }


     public function cort_con()
     {
        $GLOBALS['menu_cortes']=1;
        $datos = '';
        $this->vista('paginas/form_cort_con',$datos);
     }

     public function form_convenios()
     {
        $GLOBALS['bandera']=1;
        $GLOBALS['sub_menu']=1;
        $datos = '';
        $this->vista('paginas/form_convenio',$datos);

     }
     public function form_conv()
     {
        $GLOBALS['bandera']=1;
        $GLOBALS['sub_menu']=1;
        $datos = '';
        $this->vista('paginas/form_conv',$datos);

     }
     public function form_consumos()
     {
        $GLOBALS['bandera']=1;
        $GLOBALS['sub_menu']=1;
        $datos = '';
        $this->vista('paginas/form_consumos',$datos);

     }
     public function form_facturacion()
     {
        $GLOBALS['bandera']=1;
        $GLOBALS['sub_menu']=1;
        $datos = '';
        $this->vista('paginas/form_facturacion',$datos);

     }
     public function form_pagos()
     {
        $GLOBALS['bandera']=1;
        $GLOBALS['sub_menu']=1;
        $datos = '';
        $this->vista('paginas/form_pagos',$datos);

     }

     public function ajustes()
     {

        $datos = '';
        $this->vista('paginas/form_ajustes',$datos);

     }

     public function facturacion()
     {
      
        $datos = '';
        $this->vista('paginas/facturacion',$datos);

     }
     public function reportico()
     {
      
        $datos = '';
        $this->vista('paginas/index',$datos);

     }
     public function form_otros_pagos()
     {
        $GLOBALS['bandera']=1;
        $GLOBALS['sub_menu']=1;
        $datos = '';
        $this->vista('paginas/form_otros_pagos',$datos);

     }
     public function convenios()
     {
        $GLOBALS['menu_conv']=1;

        $datos = '';
        $this->vista('paginas/form_conv',$datos);

     }
     public function ejemploajax()
     {
        $datos = '';
        $this->vista('paginas/inicio',$datos);

     }

     public function pagina_prueba()
     {
        $datos = '';
        $this->vista('paginas/pagina_tipoweb',$datos);
      }
    public function catalogos()
    {   $GLOBALS['bandera']=2;
        $tablas=$this->usuarioModelo->obtenerTablas();
        
        $datos = ['tablas'=>$tablas];
        $this->vista('paginas/catalogos',$datos);
    }
    
    

    public function select_dat_det()
    {    
        
        $datos= array(
            'txt_ruta' =>  $txt_ruta=$_POST['txt_ruta']
             );

             
     

        $resultado_sol=$this->usuarioModelo->select_datpad($datos);
     
        if ($resultado_sol['estado'] == 'success') {
           echo json_encode($resultado_sol);
       } else if ($resultado_sol['estado'] == 'error') {
           echo json_encode($resultado_sol);
           }
    }
    public function consultas()
    {
        $GLOBALS['bandera']=1;
        $_SESSION['no_cuenta']='';
        $_SESSION['nombre']='';
        $_SESSION['domicilio']='';
        $datos='';
        $this->vista('paginas/consultas',$datos);
    }
    public function datos_generales()
    {
        $GLOBALS['bandera']=1;
        $tablas=$this->usuarioModelo->datosPadron();
        
        $datos = ['datos'=>$tablas];
        $this->vista('paginas/datos_generales',$datos);
    }

    public function add_falla()
    {
        $datos= array(
            'id_falla' =>  $id_falla=$_POST['id_falla'],
            'falla' =>  $falla=$_POST['falla']
        );
        
     
  
     $resultado_sol=$this->usuarioModelo->agr_falla($datos);
     
     if ($resultado_sol['status'] == 'success') {
        echo json_encode($resultado_sol);
    } else if ($resultado_sol['status'] == 'error') {
        echo json_encode($resultado_sol);
        }
    }

    
    public function crear_respaldo()
    {
  
     $resultado_sol=$this->usuarioModelo->respaldo_dat_padron();
     
     if ($resultado_sol['estado'] == 'success') {
        echo json_encode($resultado_sol);
    } else if ($resultado_sol['estado'] == 'error') {
        echo json_encode($resultado_sol);
        }
    }

    public function cp()
    {
        $cod= array(
            'txt_8' =>  $txt_17=$_POST['txt_8'],
        );
        
     
  
     $resultado_sol=$this->usuarioModelo->codigo_postal($cod);



  
     if ($resultado_sol['estado'] == 'success') {
        echo json_encode($resultado_sol);
    } else if ($resultado_sol['estado'] == 'error') {
        echo json_encode($resultado_sol);
        }
    }

    
    public function cp_1()
    {
        $cod= array(
            'txt_81' =>  $txt_81=$_POST['txt_81'],
        );
        
     
  
     $resultado_sol=$this->usuarioModelo->codigo_postal_1($cod);



  
     if ($resultado_sol['estado'] == 'success') {
        echo json_encode($resultado_sol);
    } else if ($resultado_sol['estado'] == 'error') {
        echo json_encode($resultado_sol);
        }
    }


    public function no_sol()
    { 
        $cod= array(
            'txt_num' =>  $txt_num=$_POST['txt_num'],
        );


        $resultado_sol=$this->usuarioModelo->num_solicitud($cod);

        
        
        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    }
    public function load_convenio()
    { 
       

        $resultado_sol=$this->usuarioModelo->load_conv();

        
        
        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    }

    
    public function contratar()
    { 

        $datos= array(
            
            'txt_1' =>  $txt_1=$_POST['txt_1'],
            'txt_2' =>  $txt_2=$_POST['txt_2'],
            'txt_3' =>  $txt_3=$_POST['txt_3'],
            'txt_4' =>  $txt_4=$_POST['txt_4'],
            'txt_5' =>  $txt_5=$_POST['txt_5'],
            'txt_rfc' =>  $txt_rfc=$_POST['txt_rfc'],
            'txt_6' =>  $txt_6=$_POST['txt_6'],
            'txt_7' =>  $txt_7=$_POST['txt_7'],
            'txt_8' =>  $txt_8=$_POST['txt_8'],
            'txt_9' =>  $txt_9=$_POST['txt_9'],
            'txt_11' =>  $txt_11=$_POST['txt_11'],
            'txt_12' =>  $txt_12=$_POST['txt_12'],
            'txt_13' =>  $txt_13=$_POST['txt_13'],
            'txt_14' =>  $txt_14=$_POST['txt_14'],
            'txt_15' =>  $txt_15=$_POST['txt_15'],
            'txt_16' =>  $txt_16=$_POST['txt_16'],
            'txt_17' =>  $txt_17=$_POST['txt_17'],
            'txt_18' =>  $txt_18=$_POST['txt_18'], 
            'txt_sol' =>  $txt_18=$_POST['txt_sol'],
            'txt_dom' =>  $txt_dom=$_POST['txt_dom'], 
            'txt_ref' =>  $txt_ref=$_POST['txt_ref'],
            'txt_tel' =>  $txt_tel=$_POST['txt_tel']   


            
        );

        


     

        $resultado_sol=$this->usuarioModelo->contratar($datos);

        
        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    }


    public function cargar_dash()
    {   
        $resultado_sol=$this->usuarioModelo->load_dash();

        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
    }

    public function aceptar_contrato()
    { 

        $datos= array(
            
            'txt_sol' =>  $txt_sol=$_POST['txt_sol'],
            'txt_fec' =>  $txt_fec =$_POST['txt_fec']
            
        );


    

        $resultado_sol=$this->usuarioModelo->contrato_success($datos);

     
        
        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
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
    public function insetar_ajuste()
    {
        $datos= array(
            
            'txt_sol' =>  $txt_sol=$_POST['txt_sol'],
            'txt_rec' =>  $txt_rec =$_POST['txt_rec'],
            'txt_fec' =>  $txt_fec =$_POST['txt_fec']
            
            
        );
         
        $resultado_sol=$this->usuarioModelo->obtener_trn($_SESSION["no_cuenta"]);

       

        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    
    }

    public function update_ajuste()
    {
        $data = json_decode($_POST['array']);
        $cuenta=$_POST['cuenta'];
        $tipo=$_POST['tipo'];
        $sol=$_POST['num'];

        
         
        $resultado_sol=$this->usuarioModelo->actualizar_ajuste($data,$cuenta,$tipo,$sol);

       

        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    
    }
    public function ajuste_insert()
    {
        $datos= array(
            'vencido' =>  $vencido=$_POST['vencido'],
            'mes' =>  $mes=$_POST['mes'],
            'total' =>  $total=$_POST['total']
        );
       
        
      
        
        $resultado_sol=$this->usuarioModelo->insertar_ajuste();

       

        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    
    }
    
    public function obtener_combos()
    {
        $datos= array(
            'tar' =>  $tar=$_POST['tar'],
            'gir' =>  $gir=$_POST['gir'],
            'ser' =>  $ser=$_POST['ser']
         
        );

        
        $resultado_sol=$this->usuarioModelo->load_combos($datos);


        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    
    }
    public function actualizar_trn()
    {
        $datos= array(
            
            'select_usu_1' =>  $select_usu_1=$_POST['select_usu_1'],
            'txt_21' =>  $txt_2 =$_POST['txt_21'],
            'txt_31' =>  $txt_3 =$_POST['txt_31'],
            'txt_41' =>  $txt_4=$_POST['txt_41'],
            'txt_51' =>  $txt_5=$_POST['txt_51'],
            'txt_61' =>  $txt_6=$_POST['txt_61'],
            'txt_rfc1' =>  $txt_rfc=$_POST['txt_rfc1'],
            'txt_71' =>  $txt_7=$_POST['txt_71'],
            'txt_81' =>  $txt_8=$_POST['txt_81'],
            'txt_91' =>  $txt_9=$_POST['txt_91'],
            'txt_101' =>  $txt_10=$_POST['txt_101'],
            'txt_col' =>  $txt_col=$_POST['txt_col'],
            'txt_121' =>  $txt_12=$_POST['txt_121'],
            'txt_131' =>  $txt_13=$_POST['txt_131'],
            'txt_141' =>  $txt_14=$_POST['txt_141'],
            'txt_tel_1' =>  $txt_tel_1=$_POST['txt_tel_1'],
            'sel_1' =>  $sel_1=$_POST['sel_1'],
            'sel_2' =>  $sel_2=$_POST['sel_2'],
            'sel_3' =>  $sel_3=$_POST['sel_3'],
            'nosol' =>  $nosol=$_POST['nosol']

        );

     
      

        $resultado_sol=$this->usuarioModelo->update_trn($datos);


        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    
    }
    
    public function buscar_solicitud()
    {
        $cod= array(
            'txt_num' =>  $txt_num=$_POST['txt_num'],
        );
         

       

        $resultado_sol=$this->usuarioModelo->bsc_sol($cod);


        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    
    }

/*
    public function buscar_cuenta()
    {
        $cod= array(
            'txt_num' =>  $txt_num=$_POST['txt_num'],
        );
        $resultado_sol=$this->usuarioModelo->bsc_cuenta_1($cod);

        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
            else if ($resultado_sol['estado'] == 'sin_datos') {
                echo json_encode($resultado_sol);
                }
    
    }

    */

    
    public function select_concepto()
    {
        $cuenta=$_POST['cuenta'];
         
        $resultado_sol=$this->usuarioModelo->selec_con($cuenta);


        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    
    }

    
    public function calcular_60()
    {
        $cod= array(
            'txt_tarifa' =>  $txt_tarifa=$_POST['txt_tarifa'],
            'txt_serv' =>  $txt_serv=$_POST['txt_serv'],
            'txt_fecha' =>  $txt_fecha=$_POST['txt_fecha'],
            'txt_cuenta' =>  $txt_cuenta=$_POST['txt_cuenta']
        );
         
        $resultado_sol=$this->usuarioModelo->calc_min($cod);


        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    
    }
    
    public function save_calculo()
    {
        $fecha=$_POST['fecha'];
        $sol=$_POST['sol'];
        $imp_act=$_POST['imp_act'];
        $imp_aju=$_POST['imp_aju'];
        $desc=$_POST['desc'];
       

         
        $resultado_sol=$this->usuarioModelo->save_cal($fecha,$sol,$imp_act,$imp_aju,$desc);


        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    
    }

    public function save_ajuste()
    {
        $data = json_decode($_POST['array']);
        $solicitante=$_POST['sol'];
        $tipo=$_POST['tipo'];
        $sol=$_POST['num'];
        $desc=$_POST['conc'];


         
        $resultado_sol=$this->usuarioModelo->save_aju($solicitante,$tipo,$sol,$desc,$data);


        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    
    }

    
    public function form_calculo()
    {
        
         
        $resultado_sol=$this->usuarioModelo->frm_calculo();


        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    
    }

    public function calcular_minimos()
    {
        $cod= array(
            'txt_tarifa' =>  $txt_tarifa=$_POST['txt_tarifa'],
            'txt_serv' =>  $txt_serv=$_POST['txt_serv'],
            'txt_fecha' =>  $txt_fecha=$_POST['txt_fecha'],
            'txt_cuenta' =>  $txt_cuenta=$_POST['txt_cuenta']
        );
         
        $resultado_sol=$this->usuarioModelo->calc_min($cod);


        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    
    }

    public function validar_ajuste()
    {
            
        $ruta=$_POST['ruta'];
        $cuenta=$_POST['cuenta'];


       
      
        $resultado_sol=$this->usuarioModelo->val_ajus($ruta,$cuenta);


        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }else if ($resultado_sol['estado'] == 'no_success') {
                echo json_encode($resultado_sol);
                }
            
    }
    public function validar_quejas()
    {
            
        var_dump("hola");
        $ruta=$_POST['ruta'];
        $cuenta=$_POST['cuenta'];


       
      
        $resultado_sol=$this->usuarioModelo->val_ajus($ruta,$cuenta);


        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }else if ($resultado_sol['estado'] == 'no_success') {
                echo json_encode($resultado_sol);
                }
            
    }
    
    



    public function buscar_cargo()
    {
        $cod= array(
            'txt_num' =>  $txt_num=$_POST['txt_num'],
        );
         
    
       

        $resultado_sol=$this->usuarioModelo->bsc_cuenta($cod);


        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    
    }

    public function buscar_datos_quejas()
    {
        $cod= array(
            'txt_num' =>  $txt_num=$_POST['txt_num']
        );
         
       
       
        $resultado_sol=$this->usuarioModelo->bsc_cuenta_queja($cod);


        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
            else if ($resultado_sol['estado'] == 'cortada') {
                echo json_encode($resultado_sol);
                }
            
    
    }

    public function buscar_datos_cortes()
    {
        $cod= array(
            'txt_num' =>  $txt_num=$_POST['txt_num']
        );
         
       
       
        $resultado_sol=$this->usuarioModelo->bsc_cuenta_cortes($cod);


        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
            else if ($resultado_sol['estado'] == 'cortada') {
                echo json_encode($resultado_sol);
                }
            
    
    }

    public function buscar_datos_recon()
    {
        $cod= array(
            'txt_num' =>  $txt_num=$_POST['txt_num']
        );
         
       
       
        $resultado_sol=$this->usuarioModelo->bsc_cuenta_recon($cod);


        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
            else if ($resultado_sol['estado'] == 'reconectado') {
                echo json_encode($resultado_sol);
                }
    
    }

    public function agreg_filas()
    { 
        $datos= array(
        'txt_fila' =>  $txt_fila=$_POST['txt_fila']
    );
         

      

        $resultado_sol=$this->usuarioModelo->agregar_filas($datos);



        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    
    }

    public function cal_caja1()
    { 
        $datos= array(
            't_2' =>  $t_2=$_POST['t_2'],
            't_3' =>  $t_3 =$_POST['t_3']
    );
         

  

        $resultado_sol=$this->usuarioModelo->calcu_caja1($datos);



        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    
    }
    public function cal_caja2()
    { 
        $datos= array(
            'txt_22' =>  $txt_22=$_POST['txt_22'],
            'txt_33' =>  $txt_33 =$_POST['txt_33']
    );
         

  

        $resultado_sol=$this->usuarioModelo->calcu_caja2($datos);



        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    
    }
    public function cal_caja3()
    { 
        $datos= array(
            'txt_222' =>  $txt_222=$_POST['txt_222'],
            'txt_333' =>  $txt_333 =$_POST['txt_333']
    );
         

  

        $resultado_sol=$this->usuarioModelo->calcu_caja3($datos);



        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    
    }

    public function cal_caja4()
    { 
        $datos= array(
            'txt_2222' =>  $txt_2222=$_POST['txt_2222'],
            'txt_3333' =>  $txt_3333 =$_POST['txt_3333']
    );
         

  

        $resultado_sol=$this->usuarioModelo->calcu_caja4($datos);



        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    
    }

    public function cal_caja5()
    { 
        $datos= array(
            'txt_22222' =>  $txt_22222=$_POST['txt_22222'],
            'txt_33333' =>  $txt_33333 =$_POST['txt_33333']
    );
         

  

        $resultado_sol=$this->usuarioModelo->calcu_caja5($datos);



        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    
    }

    public function calcu_tot()
    { 
    
         

  

        $resultado_sol=$this->usuarioModelo->calcular_tot();



        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    
    }


    
    

    public function cont_save()
    {
        $datos= array(
            'select_usu' =>  $select=$_POST['select_usu'],
            'txt_2' =>  $txt_2 =$_POST['txt_2'],
            'txt_3' =>  $txt_3 =$_POST['txt_3'],
            'txt_4' =>  $txt_4=$_POST['txt_4'],
            'txt_6' =>  $txt_6=$_POST['txt_6'],
            'txt_rfc' =>  $txt_rfc=$_POST['txt_rfc'],
            'txt_7' =>  $txt_7=$_POST['txt_7'],
            'txt_8' =>  $txt_8=$_POST['txt_8'],
            'txt_9' =>  $txt_9=$_POST['txt_9'],
            'txt_10' =>  $txt_10=$_POST['txt_10'],
            'select' =>  $select=$_POST['select'],
            'txt_12' =>  $txt_12=$_POST['txt_12'],
            'txt_13' =>  $txt_13=$_POST['txt_13'],
            'txt_14' =>  $txt_14=$_POST['txt_14'],
            'txt_tel' =>  $txt_tel=$_POST['txt_tel'],
            'txt_ref' =>  $txt_ref=$_POST['txt_ref'],
            'select_1' =>  $select_1=$_POST['select_1'],
            'select_2' =>  $select_2=$_POST['select_2'],
            'select_3' =>  $select_3=$_POST['select_3']     
        );

        

       

        $resultado_sol=$this->usuarioModelo->guardar_cont($datos);

        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    }

    public function guardar_queja()
    {
      
        $data = json_decode($_POST['num']);
        $nom = $_POST['nom'];
        $dom = $_POST['dom'];
        $col = $_POST['col'];
        $ven = json_decode($_POST['ven']);
        $sal = json_decode($_POST['sal']);
        $sel = json_decode($_POST['sel']);
        $desc = $_POST['desc'];        
      
       

        $resultado_sol=$this->usuarioModelo->save_queja($data,$nom,$dom,$col,$ven,$sal,$sel,$desc);

        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }else if ($resultado_sol['estado'] == 'duplicado') {
                echo json_encode($resultado_sol);
                }
            
    }

    public function guardar_recon()
    {
      
        $data = json_decode($_POST['num']);
       
        
      
        $desc = $_POST['desc'];
        $caja = $_POST['caja'];
        $fecha = $_POST['fecha'];
        $fecha1 = $_POST['fecha_1'];

       
     

        $resultado_sol=$this->usuarioModelo->save_recon($data,$caja,$fecha,$fecha1);

        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    }


    public function guardar_corte()
    {
      
        $data = json_decode($_POST['num']);
        $nom = $_POST['nom'];
        $dom = $_POST['dom'];
        $col = $_POST['col'];
        $ven = json_decode($_POST['ven']);
        $sal = json_decode($_POST['sal']);
        $motivo = $_POST['motivo'];
        $id_corte = $_POST['id_corte'];
    
       

        $resultado_sol=$this->usuarioModelo->save_corte($data,$nom,$dom,$col,$ven,$sal,$motivo,$id_corte);

        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    }
    
    public function val_acu()
    {
        $datos= array(
            'txt_cuenta' =>  $txt_cuenta=$_POST['txt_cuenta'],
            'txt_tipo' =>  $txt_tipo=$_POST['txt_tipo'],
            'txt_recibo' =>  $txt_recibo=$_POST['txt_recibo'],
            'txt_ucs' =>  $txt_ucs=$_POST['txt_ucs']
        );

      
        $resultado_sol=$this->usuarioModelo->validar_acu($datos);


        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    }
    
    public function folio_caja()
    {
        $datos= array(
            'txt_cuenta_1' =>  $txt_cuenta_1=$_POST['txt_cuenta_1'],
            'txt_recibo_1' =>  $txt_recibo_1=$_POST['txt_recibo_1'],
            'txt_importe_1' =>  $txt_importe_1=$_POST['txt_importe_1'],
            'txt_concepto' =>  $txt_concepto=$_POST['txt_concepto'],
            'txt_ucs_1' =>  $txt_ucs_1=$_POST['txt_ucs_1']
        );
      
       
  
        $resultado_sol=$this->usuarioModelo->gen_folio_caja($datos);


        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    }

    public function caja_res()
    {
        $datos= array(
            'txt_importe_1' =>  $txt_importe_1=$_POST['txt_importe_1'],
            'txt_efectivo' =>  $txt_efectivo=$_POST['txt_efectivo']
        );
      

       
        $resultado_sol=$this->usuarioModelo->caja_resta($datos);


        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    }
    public function selec_cajas()
    {
        $datos=$_POST['select'];

       
        $resultado_sol=$this->usuarioModelo->seleccion_cajas($datos);


        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    }

    public function load_cajas()
    {
        
        $resultado_sol=$this->usuarioModelo->select_cajas();


        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    }
    public function load_detalle()
    {
        
        $resultado_sol=$this->usuarioModelo->select_dat_detalle($_SESSION["no_cuenta"]);

        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    }

    public function load_header()
    {
        
        $resultado_sol=$this->usuarioModelo->select_dat_header($_SESSION["no_cuenta"]);

        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    }
    public function load_header_ajuste()
    {
        $datos= array(
            'txt_num' =>  $txt_num=$_POST['txt_num']
        );
        
       

        $resultado_sol=$this->usuarioModelo->select_dat_header_detalle($datos);

        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }
    }

    public function save_cap()
    {
        $datos= array(
            'txt_mano' =>  $txt_mano=$_POST['txt_mano'],
            'txt_prima' =>  $txt_prima=$_POST['txt_prima'],
            'txt_derecho' =>  $txt_derecho=$_POST['txt_derecho'],
            'Solicitud' =>  $Solicitud=$_POST['Solicitud'],
            'tipousu' =>  $tipousu=$_POST['tipousu']
        );



        $resultado_sol=$this->usuarioModelo->save_cap_usu($datos);

        if ($resultado_sol['estado'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['estado'] == 'error') {
            echo json_encode($resultado_sol);
            }

    }

    public function llenar_datdet()
    {
        $data = json_decode($_POST['array']);
     
        $data1 = json_decode($_POST['datos']);

   
      


        $resultado_sol=$this->usuarioModelo->fill_datdet($data,$data1);

      
        if ($resultado_sol['estado'] == 'success') {
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
        
   
        

      
        $resultado_sol=$this->usuarioModelo->select_pad($datos);
        
                
        // $estado=$resultado_sol['estado'];
        // $datos=$resultado_sol['datos'];
        
  
            if ($resultado_sol['estado'] == 'success') {
                echo json_encode($resultado_sol);
            } else if ($resultado_sol['estado'] == 'error') {
                echo json_encode($resultado_sol);
                }
    }
    public function mod_falla()
    {
        $datos= array(
            'id_falla' =>  $id_falla=$_POST['id_falla'],
            'falla' => $falla=$_POST['falla']
        );
        
        $resultado_sol=$this->usuarioModelo->modificar_falla($datos);

        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
    }
    public function modificar_dat_padron()
    {
        $datos= array(
            'txtid' =>  $txtid=$_POST['txtid'],
            'no_cuenta' => $no_cuenta=$_POST['no_cuenta'],
            'status' => $status=$_POST['status'],
            'ban_usu_clie' => $ban_usu_clie=$_POST['ban_usu_clie'],
            'tarifa' =>  $tarifa=$_POST['tarifa'],
            'desc_tarifa' => $desc_tarifa=$_POST['desc_tarifa'],
            'id_servicio' => $id_servicio=$_POST['id_servicio'],
            'no_solicitud' => $no_solicitud=$_POST['no_solicitud']
        );
        
        $resultado_sol=$this->usuarioModelo->modificar_dat_pat($datos);

        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
    }
  
    public function modificar_cat_folios()
    {
        $datos= array(
            'id' =>  $id=$_POST['id'],
            'id_folio' => $email=$_POST['id_folio'],
            'folio' => $telefono=$_POST['folio'],
            'desc' => $telefono=$_POST['desc']
        );
        
        $resultado_sol=$this->usuarioModelo->modificar_cat_fol($datos);

        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
    }

    public function modificar_cat_organismos()
    {
        $datos= array(
            'txtid' =>  $id=$_POST['txtid'],
            'txt' => $email=$_POST['txt'],
            'rfc' => $telefono=$_POST['rfc'],
            'curp' => $telefono=$_POST['curp']
        );
        
        $resultado_sol=$this->usuarioModelo->modificar_cat_org($datos);

        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
    }
    public function agregar_tbl()
    {
        $datos= array(
            'nombre' =>  $nombre=$_POST['nombre'],
            'email' => $email=$_POST['email'],
            'telefono' => $telefono=$_POST['telefono']
        );
        
    

        $resultado_sol=$this->usuarioModelo->agregarUsuario1($datos);
      
        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
    }

    public function mostrar_tabla()
    {
        $datos= array(
            'tabla' =>  $tabla=$_POST['tabla'],
            
            
        );
    
        var_dump($datos);
        $resultado_sol=$this->usuarioModelo->obtener_registros($datos);
      
        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
    }
    public function pdf_tiket()
    {
      
      $datos = ''; 
        $this->vista('paginas/pdf_tkt',$datos);
    }
    
    public function imprimir_conv()
    {
      
      $datos = ''; 
        $this->vista('paginas/imprimir_convenio',$datos);
    }

    public function imprimir_seguimiento()
    {
      
      $datos = ''; 
        $this->vista('paginas/imprimir_seguimiento',$datos);
    }

    
    public function imprimir_corte()
    {
      
      $datos = ''; 
        $this->vista('paginas/imprimir_corte',$datos);
    }

    public function imprimir_liquidar()
    {
      
      $datos = ''; 
        $this->vista('paginas/imprimir_liq',$datos);
    }
    public function imprimir_presupuesto()
    {
      
      $datos = ''; 
        $this->vista('paginas/imprimir_prueba',$datos);
    }

    public function imprimir_tkt()
    {
      
      $datos = ''; 
        $this->vista('paginas/imprimir_tkt',$datos);
    }

    public function example()
    {
      
      $datos = ''; 
        $this->vista('paginas/imprimir_recibos',$datos);
    }

    public function imprimir_prueba()
    {
      
      $datos = ''; 
        $this->vista('paginas/imprimir_prueba',$datos);
    }

    public function imprimir_recibos()
    {
      
      $datos = ''; 
        $this->vista('paginas/imprimir_recibos',$datos);
    }

    public function imprimir_recibos1()
    {
      
      $datos = ''; 
        $this->vista('paginas/imprimir_recibos1',$datos);
    }

    public function respaldo()
    {
      
      $datos = ''; 
        $this->vista('paginas/respaldo',$datos);
    }


    public function pdf()
    {
      
      $datos = ''; 
        $this->vista('paginas/pdf',$datos);
    }

    public function excel()
    {
      
      $datos = ''; 
        $this->vista('paginas/excel',$datos);
    }

    public function excel_quejas()
    {
      
      $datos = ''; 
        $this->vista('paginas/excel_queja',$datos);
    }
    public function agregar()
    {
       
        $datos = '';
        $this->vista('paginas/agregar',$datos);
    }

    public function select_vista_lec()
    {
        $datos= array(
            'txt_ruta' => $txt_ruta=$_POST['txt_ruta']  
            //'txt_num' => $txt_num=$_POST['txt_num']  
        );
        
        $resultado_sol=$this->usuarioModelo->obtener_vista_1($datos);

        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
     
    }

    public function select_vista_lec_prueba()
    {
        $datos= array(
            'txt_ruta' => $txt_ruta=$_POST['txt_ruta']  
           // 'txt_num' => $txt_num=$_POST['txt_num']  
        );
        
        $resultado_sol=$this->usuarioModelo->obtener_vista($datos);


        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
     
    }

    public function insert_cov()
    {
        $datos= array(
            'txt_monto' => $txt_monto=$_POST['txt_monto'], 
            'txt_pag' => $txt_monto=$_POST['txt_pag'], 
            'txt_aut' => $txt_aut=$_POST['txt_aut'], 
            'Solicitud' => $Solicitud=$_POST['Solicitud']
        );
        $resultado_sol=$this->usuarioModelo->insertar_cob_header($datos);
        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
     
    }
    public function buscar_dat_cob_detalle()
    {
        $datos= array(
            'txt_ruta' => $txt_ruta=$_POST['txt_ruta']  
        );
     
        $resultado_sol=$this->usuarioModelo->buscar_dat_cob_det($datos);
        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
     
    }

    public function insertar_pago()
    {
       
        $datos= array(
            'txt_monto' => $txt_monto=$_POST['txt_monto'], 
            'txt_pag' => $txt_pag=$_POST['txt_pag'], 
            'txt_fecha' => $txt_fecha=$_POST['txt_fecha'],
            'txt_cuenta' => $txt_cuenta=$_POST['txt_cuenta'],
            'txt_int' => $txt_int=$_POST['txt_int'],
            'txt_mon' => $txt_mon=$_POST['txt_mon']
            
        );
        
        
        $resultado_sol=$this->usuarioModelo->insert_pag($datos);
        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
     
    }

    public function insertar_dat_det()
    {
       
        $datos= array(
            'txt_imp_ven' => $txt_imp_ven=$_POST['txt_imp_ven'], 
            'txt_imp_mes' => $txt_imp_mes=$_POST['txt_imp_mes'], 
            'txt_total' => $txt_total=$_POST['txt_total'],
            'sel_opt' => $sel_opt=$_POST['sel_opt'],
            'txt_cuenta' => $txt_cuenta=$_POST['txt_cuenta']
            
        );
     
       
        $resultado_sol=$this->usuarioModelo->insert_datdet($datos);
        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
     
    }

    public function insertar_dat_detheader()
    {
       
        $datos= array(
            'txt_vencido' => $txt_vencido=$_POST['txt_vencido'], 
            'txt_mes' => $txt_mes=$_POST['txt_mes'], 
            'txt_t' => $txt_t=$_POST['txt_t'],
            'txt_pag' => $txt_pag=$_POST['txt_pag'],
            'txt_cuenta_1' => $txt_cuenta_1=$_POST['txt_cuenta_1']
        );
     

       
        $resultado_sol=$this->usuarioModelo->insert_datdetheader($datos);
        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
     
    }

    
    public function buscar_detalle_header()
    {
        $datos= array(
            'txt_ruta' => $txt_ruta=$_POST['txt_ruta']  
           // 'txt_num' => $txt_num=$_POST['txt_num']  
        );
        
        $resultado_sol=$this->usuarioModelo->bsc_cuenta_1($datos);


        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
            else if ($resultado_sol['status'] == 'sin_datos') {
                echo json_encode($resultado_sol);
                }
     
    }

    public function insertar_detalle_cob()
    {
        $datos= array(
            'txt_monto' => $txt_monto=$_POST['txt_monto'], 
            'txt_pag' => $txt_monto=$_POST['txt_pag'], 
            'txt_aut' => $txt_aut=$_POST['txt_aut'], 
            'Solicitud' => $Solicitud=$_POST['Solicitud']
        );
        $resultado_sol=$this->usuarioModelo->insertar_cob_header($datos);
        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
     
    }

   

    public function vista_2()
    {
        $datos= array(
            'txt_ruta' => $txt_ruta=$_POST['txt_ruta']
        );
        
        

        $resultado_sol=$this->usuarioModelo->validacion($datos);

        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
     
    }


    public function captura_lecturas()
    {
        $datos= array(
           // 'txt_fecha' =>  $txt_fecha=$_POST['txt_fecha'],
            'txt_ruta' => $txt_ruta=$_POST['txt_ruta']  
        );
        
        $resultado_sol=$this->usuarioModelo->obtener_registro_pad($datos);

        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
     
    }
    public function cap_contrato()
    {
        $datos= array(
            'txt_ruta_2' =>  $txt_ruta_2=$_POST['txt_ruta_2'],
            'txt_ant' =>  $txt_ant=$_POST['txt_ant'],
            'txt_fecha_2' => $txt_fecha_2=$_POST['txt_fecha_2'],
            'txt_contrato' => $txt_contrato=$_POST['txt_contrato'],
            'txt_lec' => $txt_lec=$_POST['txt_lec'],
            'select1' =>$estado= $_POST['estado'],
            'select2' =>$estado_1= $_POST['estado_1'],
            'select3' =>$estado_2= $_POST['estado_2']
        );


        $resultado_sol=$this->usuarioModelo->capturar_contrato($datos);

        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
            else if ($resultado_sol['status'] == 'pregunta') {
                echo json_encode($resultado_sol);
                }
     
    }

    public function chek_contrato()
    {
        $datos=$_POST['numCotr'];
        $dato1=$_POST['ruta'];


        
        $resultado_sol=$this->usuarioModelo->validar_contrato($datos,$dato1);

        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
            else if ($resultado_sol['status'] == 'pregunta') {
                echo json_encode($resultado_sol);
                }
     
    }
    public function chek_ruta()
    {
       
        $ruta=$_POST['ruta'];
        $resultado_sol=$this->usuarioModelo->validar_ruta($ruta);

        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
     
    }

    public function select_fechas()
    {
        
        
        $resultado_sol=$this->usuarioModelo->validar_fecha();

        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
     
    }

    public function det_det()
    {
        $datos= array(
            'txt_num' =>  $txt_num=$_POST['txt_num'],
            
        );
        
        $resultado_sol=$this->usuarioModelo->obtener_det_det($datos);

        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
     
    }

    
    public function load_det_det()
    {
        $datos= array(
            'txt_fecha' =>  $txt_fecha=$_POST['no_cuenta'],
            
        );
        
        $resultado_sol=$this->usuarioModelo->obtener_registro_pad($datos);

        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
     
    }

    
    public function mostrar_lecturas()
    {
        $resultado_sol=$this->usuarioModelo->cargar_lecturas();

        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
     
    }

    public function guardar_lectura()
    {
        $datos= array(
            'lec_ant' =>  $lec_ant=$_POST['lec_ant'],
            'lec_act' =>  $lec_act=$_POST['lec_act'],
            'falla_1' =>  $no_cuenta=$_POST['falla_1'],
            'falla_2' => $falla_2=$_POST['falla_2'],
            'falla_3' =>  $falla_3=$_POST['falla_3'],
            'folio_ruta' =>  $folio_ruta=$_POST['folio_ruta'],  
            'no_cuenta' =>  $no_cuenta=$_POST['no_cuenta']
        );
       

        $resultado_sol=$this->usuarioModelo->insertar_lectura($datos);

        if ($resultado_sol['status'] == 'success') {
            echo json_encode($resultado_sol);
        } else if ($resultado_sol['status'] == 'error') {
            echo json_encode($resultado_sol);
            }
     
    }
   
    public function ingresar_reg()
    { 
        $data = json_decode($_POST['mytabla']);
 
      
        $fecha=$_POST['fecha'];

       $resultado_sol=$this->usuarioModelo->insertar_lecturas($data,$fecha);

       if ($resultado_sol['status'] == 'success') {
        echo json_encode($resultado_sol);
    } else if ($resultado_sol['status'] == 'error') {
        echo json_encode($resultado_sol);
        }
    }
    public function editar_cat_organismos($id)
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
        $datos=[
            'nombre'=>trim($_POST['nombre']),
            'email'=>trim($_POST['email']),
            'telefono'=>trim($_POST['telefono'])
        ];

        if($this->usuarioModelo->agregarUsuario($datos)){
            redireccionar('/paginas');
        }
        else
        {
            die('Algo salio mal..2');
        }
    }
    else
    {
        //$usuarios= $this->usuarioModelo->obtener_cat_org($id);
        
        $usuarios= $this->usuarioModelo->obtener_registros($id);
            $datos=['usuarios'=>$usuarios];

            
            $this->vista('paginas/editar_cat_organismos',$datos);
    }       

    }
    
}
