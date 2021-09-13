<?php
   


$db;
$this->db = new Base;

$this->db->query("select * from dat_quejas dq inner join cat_quejas cq on (dq.id_queja_q=cq.id_queja) where  id_queja_q ='" . $_SESSION["tipo"] . "' and status = '".$_SESSION["act"]."' and fecha_asignacion BETWEEN '".$_SESSION["date"]."' AND '".$_SESSION["date1"]."';");
     
$resultados= $this->db->registros();

$num=1;

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= Lec_usu_". $_SESSION["status"].".xls"); 


?>

<div id="demo" class="collapse">
      <table class="table table-head-fixed text-nowrap" id="mytabla">
        <thead>
          <tr>
            <th>Folio Queja</th>
            <th>No. Cuenta</th>
            <th>Tipo</th>
            <th>Observación</th>
            <th>Fecha Queja</th>
            <th>Brigada</th>
            <th>Estatus</th>
       


            <!--  <th>Guardar</th>-->
          </tr>
        </thead>
        <tbody id="res">
        <?php
            foreach($resultados AS $rows) {
             
              ?>
                <tr>
                  <td><?php echo $rows->folio_queja; ?></td>
                  <td><?php echo $rows->no_cuenta_q ?></td>
                  <td><?php echo $rows->desc_queja ?></td>
                  <td><?php echo $rows->desc_q ?></td>
                  <td><?php echo $rows->fecha_queja ?></td>          
                  <td><?php echo $rows->asignado_a_dq ?></td>     
                  <td><?php echo $rows->status ?></td>   
                  <td><?php $_SESSION["status"]  ?></td>   
                   
                 
                </tr>
              <?php
                 $num=$num+1;
              }
              ?>
        </tbody>
      </table>
    </div>



