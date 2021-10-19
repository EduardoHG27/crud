<?php

class M_Consultas{

    private $db;
   

    public function __construct()
    {
        $this->db = new Base;
    }


    // Form Datos Generales
    public function select_pad_consulta($datos)
    {

        $txtid                           = $datos['txt_reg'];
        $parametro                       = $datos['txt_com'];


        if ($parametro == 'No.Cuenta') {
            $var = 'NO_CUENTA_USUARIO';
            $this->db->query("select * from dat_padron where " . $var . " = '" . $txtid . "'");
        } else if ($parametro == 'Domicilio') {
            $pieces = explode("-", $txtid);
          
            $var = 'DOMICILIO_USUARIO';

            $this->db->query("select * from dat_padron where CALLE_USUARIO = '" . $pieces[0] . "' and COLONIA_USUARIO ='" . $pieces[1] . "'");


        } else if ($parametro == 'Nombre')
        {
            $var = 'NOMBRE_USUARIO';
            $this->db->query("select * from dat_padron where " . $var . " = '" . $txtid . "'");
        }  
        else if ($parametro == 'Medidor')
        {
            $var = 'NO_SERIE_MEDIDOR';
            $this->db->query("select * from dat_padron where " . $var . " = '" . $txtid . "'");
        }  
        else if ($parametro == 'Ruta y folio')
        {
      
            $pieces = explode(" ", $txtid);
      
            
            $this->db->query("select * from dat_padron where ID_RUTA_LECTURA_USUARIO = '" . $pieces[0] . "' and FOLIO_LECTURA_USUARIO = '" . $pieces[1] . "'"); 
        }
        else
        {

        }
        
        if ($datos=$this->db->registros()) {
           
            $numreg=count($datos);

           
           $_SESSION["no_cuenta"] = $datos[0]->NO_CUENTA_USUARIO; 
           $_SESSION["nombre"] = $datos[0]->NOMBRE_USUARIO; 
           $_SESSION["domicilio"] = $datos[0]->DOMICILIO_USUARIO;           
     
            return array('estado' => 'success','message' => 'var_datos','datos'=>$datos,'parametro'=>$parametro ,'num_reg'=>$numreg );
			
        } else {
      
            return array('estado' => 'error', 'message' => 'var_sin_datos');
            
		}
    }

    public function search_quej($datos)
    {

        $op                           = $datos['sel_opt'];
        $act                          = $datos['sel_act'];
        $cuenta                           = $datos['txt_cuenta'];

        if($cuenta=='')
        {

            $this->db->query("select q.NO_CUENTA_Q,dat.NOMBRE_USUARIO,dat.DOMICILIO_USUARIO,c.DESC_QUEJA,q.DESC_Q,q.FECHA_QUEJA,q.FOLIO_QUEJA from dat_quejas q inner join dat_padron dat on (dat.NO_CUENTA_USUARIO=q.no_cuenta_q) inner join cat_quejas c on (c.id_queja=q.id_queja_q) where id_queja_q =".$op." and status ='".$act."'");
       
            if($datos=$this->db->registros())
            {
                
                return array('estado' => 'success','datos'=>$datos);
                
            }
            else
            {
                return array('estado' => 'error', 'message' => 'var_sin_datos');
            }
    
        }
        else
        {

            $this->db->query("select q.NO_CUENTA_Q,dat.NOMBRE_USUARIO,dat.DOMICILIO_USUARIO,c.DESC_QUEJA,q.DESC_Q,q.FECHA_QUEJA,q.FOLIO_QUEJA from dat_quejas q inner join dat_padron dat on (dat.NO_CUENTA_USUARIO=q.no_cuenta_q)inner join cat_quejas c on (c.id_queja=q.id_queja_q) where id_queja_q =".$op." and status ='".$act."' and dat.NO_CUENTA_USUARIO ='".$cuenta."'");
       
            if($datos=$this->db->registros())
            {
                
                return array('estado' => 'success','datos'=>$datos);
                
            }
            else
            {
                return array('estado' => 'error', 'message' => 'var_sin_datos');
            }
    

        }

        
      

      
    }

    
    public function obtener_bri($cod)
    {
    



             //seleccionar no cuenta ... tomar el primer caracter de id_estatus_usuario .. . Si el primer caracter es k
             //true sino error 
        $this->db->query("select id_brigada,desc_brigada from cat_brigada where id_queja ='" . $cod . "'");
     
        if ($datos = $this->db->registros()) {
            
            
            return array('estado' => 'success', 'datos' => $datos);
        } else {
            return array('estado' => 'error');
        }
    }

    public function sel_queja($cod)
    {
    

        $tipo                  = $cod['sel_tipo'];
        $act                    = $cod['sel_act'];
        $bri                    = $cod['sel_bri'];
        $date              = $cod['datepicker'];
        $date1              = $cod['datepicker_1'];


        $_SESSION["tipo"]=$tipo;
        $_SESSION["act"]=$act;
        $_SESSION["date"]=$date;
        $_SESSION["date1"]=$date1;

  
      
             //seleccionar no cuenta ... tomar el primer caracter de id_estatus_usuario .. . Si el primer caracter es k
             //true sino error 
             if($act=='T' && $bri =='t')
             {
                
                $this->db->query("select * from dat_quejas where id_queja_q ='" . $tipo . "' and fecha_queja BETWEEN '".$date."' AND '".$date1."';");
     
                if ($datos = $this->db->registros()) {
        
                    return array('estado' => 'success', 'datos' => $datos);
                } else {
                    return array('estado' => 'error');
                }
             }
             else if ($act=='T' && $bri !='na' && $bri!='t')
             {
               
                $this->db->query("select * from dat_quejas where id_queja_q ='" . $tipo . "' and fecha_queja BETWEEN '".$date."' AND '".$date1."' and asignado_a_dq ='" . $bri . "';");
     
                if ($datos = $this->db->registros()) {
          

                    $_SESSION["status"]=$datos[0]->status;
                    return array('estado' => 'success', 'datos' => $datos);
                } else {
                    return array('estado' => 'error');
                }
             }
             else if ($act!='T' && $bri =='t')
             {
              
                $this->db->query("select * from dat_quejas where id_queja_q ='" . $tipo . "' and fecha_queja BETWEEN '".$date."' AND '".$date1."' and status = '".$act."' ;");
     
                if ($datos = $this->db->registros()) {
          
                    $_SESSION["status"]=$datos[0]->status;
                    return array('estado' => 'success', 'datos' => $datos);
                } else {
                    return array('estado' => 'error');
                }
             }


             else if ($act!='T' && $bri !='t' && $bri !='na')
             {
              
                $this->db->query("select * from dat_quejas where id_queja_q ='" . $tipo . "' and fecha_queja BETWEEN '".$date."' AND '".$date1."' and status = '".$act."' and asignado_a_dq  = '".$bri."'  ;");
     
                if ($datos = $this->db->registros()) {
          
                    $_SESSION["status"]=$datos[0]->status;
                    return array('estado' => 'success', 'datos' => $datos);
                } else {
                    return array('estado' => 'error');
                }
             }



             else if ($act=='T' && $bri ='na')
             {
               
                $this->db->query("select * from dat_quejas where id_queja_q ='" . $tipo . "' and fecha_queja BETWEEN '".$date."' AND '".$date1."' and asignado_a_dq = '' ;");
     
                if ($datos = $this->db->registros()) {
          

                    $_SESSION["status"]=$datos[0]->status;
                    return array('estado' => 'success', 'datos' => $datos);
                } else {
                    return array('estado' => 'error');
                }
             }
             else if ($act!='T' && $bri ='na')
             {
               
                $this->db->query("select * from dat_quejas where id_queja_q ='" . $tipo . "' and fecha_queja BETWEEN '".$date."' AND '".$date1."' and asignado_a_dq = '' ;");
     
                if ($datos = $this->db->registros()) {
          

                    $_SESSION["status"]=$datos[0]->status;
                    return array('estado' => 'success', 'datos' => $datos);
                } else {
                    return array('estado' => 'error');
                }
             }
            
       
    }

    public function combo_brigada($id)
    {
        $this->db->query("SELECT id_brigada,desc_brigada FROM cat_brigada where id_queja=".$id."");
       
        if($datos=$this->db->registros())
        {
         
            return array('estado' => 'success','datos'=>$datos);
			
        }
        else
        {
            return array('estado' => 'error', 'message' => 'var_sin_datos');
        }
    }

    public function save_bri($datos)
    {
        $bri                          = $datos['sel_bri'];
        $txt_fol                          = $datos['txt_fol'];

        
        $_SESSION['brigada'] = $bri;
        $_SESSION['folio_bri'] = $txt_fol;

        
        $fechaActual = date('Y-m-d');
        $this->db->query("SELECT desc_brigada FROM cat_brigada where id_brigada=".$bri."");
        $datos=$this->db->registro();

   

        $this->db->query("update dat_quejas set asignado_a_dq = '".$datos->desc_brigada."', fecha_asignacion='".$fechaActual."' where folio_queja='" . $txt_fol . "'");
           
        if($this->db->execute())
        {
            return array('estado' => 'success','datos'=>$datos);
        }
        else
        {
            return array('estado' => 'error', 'message' => 'var_sin_datos');
        }
    }


    public function select_pad_consulta_ajax($datos)
    {

        $txtid                           = $datos['txt_reg'];
        $parametro                       = $datos['txt_com'];


        if ($parametro == 'No.Cuenta') {
            $var = 'NO_CUENTA_USUARIO';
            $this->db->query("select * from dat_padron where " . $var . " = '" . $txtid . "'");
        } else if ($parametro == 'Domicilio') {
            $pieces = explode("-", $txtid);
          
            $var = 'DOMICILIO_USUARIO';

            $this->db->query("select * from dat_padron where CALLE_USUARIO = '" . $pieces[0] . "' and COLONIA_USUARIO ='" . $pieces[1] . "'");


        } else if ($parametro == 'Nombre')
        {
            $var = 'NOMBRE_USUARIO';
            $this->db->query("select * from dat_padron where " . $var . " = '" . $txtid . "'");
        }  
        else if ($parametro == 'Medidor')
        {
            $var = 'NO_SERIE_MEDIDOR';
            $this->db->query("select * from dat_padron where " . $var . " = '" . $txtid . "'");
        }  
        else if ($parametro == 'Ruta y folio')
        {
      
            $pieces = explode(" ", $txtid);
      
            
            $this->db->query("select * from dat_padron where ID_RUTA_LECTURA_USUARIO = '" . $pieces[0] . "' and FOLIO_LECTURA_USUARIO = '" . $pieces[1] . "'"); 
        }
        else
        {

        }
        
        if ($datos=$this->db->registros()) {

            var_dump($datos);
           
            $numreg=count($datos);
            $_SESSION["no_cuenta"] = $datos[0]->NO_CUENTA_USUARIO; 
            $_SESSION["nombre"] = $datos[0]->NOMBRE_USUARIO; 
            $_SESSION["domicilio"] = $datos[0]->DOMICILIO_USUARIO;   



            $txt = '[
                [ "Tiger Nixon", "System Architect", "Edinburgh", "5421", "2011/04/25", "$320,800" ],
                [ "Garrett Winters", "Accountant", "Tokyo", "8422", "2011/07/25", "$170,750" ],
                [ "Ashton Cox", "Junior Technical Author", "San Francisco", "1562", "2009/01/12", "$86,000" ],
                [ "Cedric Kelly", "Senior Javascript Developer", "Edinburgh", "6224", "2012/03/29", "$433,060" ],
                [ "Airi Satou", "Accountant", "Tokyo", "5407", "2008/11/28", "$162,700" ],
                [ "Brielle Williamson", "Integration Specialist", "New York", "4804", "2012/12/02", "$372,000" ],
                [ "Herrod Chandler", "Sales Assistant", "San Francisco", "9608", "2012/08/06", "$137,500" ],
                [ "Rhona Davidson", "Integration Specialist", "Tokyo", "6200", "2010/10/14", "$327,900" ],
                [ "Colleen Hurst", "Javascript Developer", "San Francisco", "2360", "2009/09/15", "$205,500" ],
                [ "Sonya Frost", "Software Engineer", "Edinburgh", "1667", "2008/12/13", "$103,600" ],
                [ "Jena Gaines", "Office Manager", "London", "3814", "2008/12/19", "$90,560" ],
                [ "Quinn Flynn", "Support Lead", "Edinburgh", "9497", "2013/03/03", "$342,000" ],
                [ "Charde Marshall", "Regional Director", "San Francisco", "6741", "2008/10/16", "$470,600" ],
                [ "Haley Kennedy", "Senior Marketing Designer", "London", "3597", "2012/12/18", "$313,500" ],
                [ "Tatyana Fitzpatrick", "Regional Director", "London", "1965", "2010/03/17", "$385,750" ],
                [ "Michael Silva", "Marketing Designer", "London", "1581", "2012/11/27", "$198,500" ],
                [ "Paul Byrd", "Chief Financial Officer (CFO)", "New York", "3059", "2010/06/09", "$725,000" ],
                [ "Gloria Little", "Systems Administrator", "New York", "1721", "2009/04/10", "$237,500" ],
                [ "Bradley Greer", "Software Engineer", "London", "2558", "2012/10/13", "$132,000" ],
                [ "Dai Rios", "Personnel Lead", "Edinburgh", "2290", "2012/09/26", "$217,500" ],
                [ "Jenette Caldwell", "Development Lead", "New York", "1937", "2011/09/03", "$345,000" ],
                [ "Yuri Berry", "Chief Marketing Officer (CMO)", "New York", "6154", "2009/06/25", "$675,000" ],
                [ "Caesar Vance", "Pre-Sales Support", "New York", "8330", "2011/12/12", "$106,450" ],
                [ "Doris Wilder", "Sales Assistant", "Sydney", "3023", "2010/09/20", "$85,600" ],
                [ "Angelica Ramos", "Chief Executive Officer (CEO)", "London", "5797", "2009/10/09", "$1,200,000" ],
                [ "Gavin Joyce", "Developer", "Edinburgh", "8822", "2010/12/22", "$92,575" ],
                [ "Jennifer Chang", "Regional Director", "Singapore", "9239", "2010/11/14", "$357,650" ],
                [ "Brenden Wagner", "Software Engineer", "San Francisco", "1314", "2011/06/07", "$206,850" ],
                [ "Fiona Green", "Chief Operating Officer (COO)", "San Francisco", "2947", "2010/03/11", "$850,000" ],
                [ "Shou Itou", "Regional Marketing", "Tokyo", "8899", "2011/08/14", "$163,000" ],
                [ "Michelle House", "Integration Specialist", "Sydney", "2769", "2011/06/02", "$95,400" ],
                [ "Suki Burks", "Developer", "London", "6832", "2009/10/22", "$114,500" ],
                [ "Prescott Bartlett", "Technical Author", "London", "3606", "2011/05/07", "$145,000" ],
                [ "Gavin Cortez", "Team Leader", "San Francisco", "2860", "2008/10/26", "$235,500" ],
                [ "Martena Mccray", "Post-Sales support", "Edinburgh", "8240", "2011/03/09", "$324,050" ],
                [ "Unity Butler", "Marketing Designer", "San Francisco", "5384", "2009/12/09", "$85,675" ]
            ];';
            
            
    
     
            return array($txt);
			
        } else {
      
            return array('estado' => 'error', 'message' => 'var_sin_datos');
            
		}
    }


    public function obtener_datos_padron($id){

       
        
        $this->db->query("select * from dat_padron where NO_CUENTA_USUARIO = '" . $id . "'");
        if($datos=$this->db->registros())
        {
            $_SESSION["no_cuenta"] = $datos[0]->NO_CUENTA_USUARIO; 
            $_SESSION["nombre"] = $datos[0]->NOMBRE_USUARIO; 
            $_SESSION["domicilio"] = $datos[0]->DOMICILIO_USUARIO;       
            return array('estado' => 'success','datos' => $datos);
        }else
        {
            return array('estado' => 'error');
        }

        
    
    }

    public function change_status($folio){

        $fechaActual = date('Y-m-d');
        $this->db->query("update dat_quejas set status = 'C',fecha_resolucion='".$fechaActual."' where folio_queja='" . $folio . "'");
  
        if($this->db->execute())
        {
            var_dump("hola");
            return array('estado' => 'success');
			
        }
        else
        {
            return array('estado' => 'error');
        }
    
    }
    


    public function select_tip(){


        $this->db->query("select desc_larga_corte,desc_corta_corte from cat_cortes");
      

        if($datos=$this->db->registros())
        {
           
            return array('estado' => 'success','datos'=>$datos);
			
        }
        else
        {
            return array('estado' => 'error');
        }
    
    }

    public function get_cort($datos){

        $select                         = $datos['sel_opt'];
        $txt_importe                    = $datos['txt_importe'];
        $txt_de                         = $datos['txt_de'];
        $txt_a                          = $datos['txt_a'];

        $_SESSION["pag_ven_cor"]=$select;
        $_SESSION["importe_cor"]=$txt_importe;
        $_SESSION["tex_de_cor"]=$txt_de;
        $_SESSION["tex_a_cor"]=$txt_a;

        $this->db->query("SELECT distinct NO_CUENTA_USUARIO,NOMBRE_USUARIO,DOMICILIO_USUARIO,COD_POS_USUARIO,ID_RUTA_LECTURA_USUARIO,fh.PAGOS_VENCIDOS_FAC,fh.SALDO_TOT_FAC 
                          FROM dat_padron dp inner join dat_fac_header fh on 
                          (fh.NO_CUENTA_FAC=dp.NO_CUENTA_USUARIO) where fh.PAGOS_VENCIDOS_FAC >='".$select."'
                           and fh.SALDO_TOT_FAC >='".$txt_importe."'AND ID_RUTA_LECTURA_USUARIO BETWEEN '".$txt_de."' AND '".$txt_a."'");
      

        if($datos=$this->db->registros())
        {
            $_SESSION['datos_cortes']=$datos;
            return array('estado' => 'success','datos'=>$datos);
			
        }
        else
        {
            return array('estado' => 'error');
        }
    
    }

    

    public function inse_q($folio,$txt){
    
        $this->db->query("select * from dat_quejas_seguimiento where folios_qs = '" . $folio . "'");
        $num=count($datos=$this->db->registros());
        $num = $num+1;
        $fechaActual = date('Y-m-d');

        $this->db->query("insert into dat_quejas_seguimiento(id_comp_qs,folios_qs,cons_qs ,fecha_qs,txt_qs)values
            ('1','" . $folio . "','".$num."','".$fechaActual."','" . $txt . "')");
           
        

        if($this->db->execute())
        {
            
            return array('estado' => 'success');
			
        }
        else
        {
            return array('estado' => 'error');
        }
    
    }

    public function load_seg($id){
    
        $this->db->query("select * from dat_quejas_seguimiento where folios_qs = '" . $id . "'");
       
        if($datos=$this->db->registros())
        {
            
            return array('estado' => 'success','datos'=>$datos);
			
        }
        else
        {
            return array('estado' => 'error', 'message' => 'var_sin_datos');
        }
    
    }

    public function mostrar_queja($id){
    
        $this->db->query("select desc_q from dat_quejas where folio_queja = '" . $id . "'");
        if($datos=$this->db->registro())
        {
         
            return array('estado' => 'success','datos' => $datos->desc_q);
        }else
        {
            return array('estado' => 'error');
        }

        
    
    }

     // Formulario Lecturas
    public function cargar_lecturas(){

      
        
        $this->db->query("select ANHO_LE24,MES_LE24,LEC_MES_LE24,CONSUMO_LE24,FECHA_LE24,INCOS1_LE24,LECTURISTA_LE24 from dat_lecturas24 where id_comp18 = 1 and no_cuenta_le24='".$_SESSION["no_cuenta"]."'");
        
        $resultados= $this->db->registros();
     
        if($resultados!=null)
        {
            return array('status' => 'success','datos' => $resultados);
        }else
        {
            return array('status' => 'error');
        }

        
    
    }

    public function cargar_header(){

      
        
        $this->db->query("select no_docto,fec_pago,id_caja,importe_pago,tipo_docto from his_linea_pagos_header where no_cuenta_15 ='".$_SESSION["no_cuenta"]."'");
     
       
        $resultados= $this->db->registros();
     
        if($resultados!=null)
        {
            return array('status' => 'success','datos' => $resultados);
        }else
        {
            return array('status' => 'error');
        }
    }

    public function usuario_quej(){

      
        
        $this->db->query("select folio_queja,desc_q,status,fecha_queja,fecha_asignacion,cq.desc_queja from dat_quejas q inner join cat_quejas cq on (q.id_queja_q=cq.id_queja) where no_cuenta_q ='".$_SESSION["no_cuenta"]."'");
  
        $resultados= $this->db->registros();

        if($resultados!=null)
        {
            return array('status' => 'success','datos' => $resultados);
        }else
        {
            return array('status' => 'error');
        }
    }

    public function cargar_nodocto($datos){
 
         
        $numero                           = $datos['numero'];


        $this->db->query("select no_docto,fec_pago,id_caja,importe_pago,tipo_docto from his_linea_pagos_header where no_docto ='".$numero."'");
     
       
        $resultados= $this->db->registros();
        

        $numero_docu=$resultados[0]->no_docto;

        $this->db->query("select id_con_facturacion,importe from his_linea_pagos_detalle where no_docto ='".$numero_docu."'");
    
        $res= $this->db->registros();
     
   
        if($resultados!=null)
        {
            return array('status' => 'success','datos' => $resultados,'dat'=>$res);
        }else
        {
            return array('status' => 'error');
        }

        
    
    }

    
    public function obtener_trn($no_cuenta){
      

   
        $this->db->query("select * from trn_registro_lectura where no_cuenta7='".$no_cuenta."'");

      
        if ( $datos= $this->db->registros()) {
                     
            return array('estado' => 'success','datos'=>$datos );
			
        } else {
 
            return array('estado' => 'error');
            
        }
    }
}