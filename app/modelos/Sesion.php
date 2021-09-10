<?php 
		session_start();
		class Sesion{		
			
			private $db;

			public function __construct()
			{
				$this->db = new Base;
			}

			
			public function iniciarSesion($datos){
				
			

				if($datos){ 
			
				$usuario                    = $datos['txtusuario'];
				$pass                       = $datos['txtpass'];
		
				$this->db->query("select * from usuarios where nombre='".$usuario."' and password ='".$pass."'");
				
				if ( $resultados= $this->db->registros()) {

					var_dump($resultados);
					$_SESSION["rol"]=$resultados[0]->rol;
					$_SESSION["sesion_ok"]="sesion_correcta";
					$_SESSION["sesion_usuario"] = $usuario;
					
					$time = time(); 
					$_SESSION["fecha"] = date("Y-m-d", $time);

				

					$GLOBALS['sub_menu']=0;
					return array('estado' => 'success' );
					
				} else {
		 
					return array('estado' => 'error');
					
				}
				
			
		}
	}
	public function iniciarSesioncajas($datos){
				
			
		if($datos){ 
	
		$usuario                    = $datos['txtusuario'];
		$pass                       = $datos['txtpass'];

		$this->db->query("select * from cat_cajeros where id_cajero='".$usuario."' and password_cajero='".$pass."'");
		
		if ( $resultados= $this->db->registros()) {
			$_SESSION["sesion_ok"]="sesion_correcta";
			$_SESSION["sesion_usuario"] = $usuario;

			$GLOBALS['sub_menu']=0;
			return array('estado' => 'success' );
			
		} else {
 
			return array('estado' => 'error');
			
		}
		
	
}
}
	public function guardar_cuenta($datos){
				
		var_dump($datos);
		
		if($datos){ 
			
			$txt_nocuenta                    = $datos['txt_nocuenta'];

			$_SESSION["no_cuenta"] = $txt_nocuenta;

				return array('estado' => 'success' );
		}else {
		 
			return array('estado' => 'error');
			
		}

	}
}
?>