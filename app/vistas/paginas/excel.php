<?php
   


$db;
$this->db = new Base;

$this->db->query('select ANHO_LE24,MES_LE24,LEC_MES_LE24,CONSUMO_LE24,FECHA_LE24,INCOS1_LE24,LECTURISTA_LE24 from dat_lecturas24 where id_comp18 = 1 and no_cuenta_le24='.$_SESSION["no_cuenta"]).'';
$resultados= $this->db->registros();

$num=1;

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= Lec_usu_".$_SESSION["no_cuenta"].".xls"); 


?>

<div id="demo" class="collapse">
      <table class="table table-head-fixed text-nowrap" id="mytabla">
        <thead>
          <tr>
            <th>Ejercicio</th>
            <th>Mes</th>
            <th>Lecturas</th>
            <th>Consumo</th>
            <th>Fecha Lectura</th>
            <th>Inconsistencia</th>
            <th>Lecturista</th>


            <!--  <th>Guardar</th>-->
          </tr>
        </thead>
        <tbody id="res">
        <?php
            foreach($resultados AS $rows) {
             
              ?>
                <tr>
                  <td><?php echo $rows->ANHO_LE24; ?></td>
                  <td><?php echo $rows->MES_LE24 ?></td>
                  <td><?php echo $rows->LEC_MES_LE24 ?></td>
                  <td><?php echo $rows->CONSUMO_LE24 ?></td>          
                  <td><?php echo $rows->FECHA_LE24 ?></td>     
                  <td><?php echo $rows->INCOS1_LE24 ?></td>     
                  <td><?php echo $rows->LECTURISTA_LE24 ?></td>       
                </tr>
              <?php
                 $num=$num+1;
              }
              ?>
        </tbody>
      </table>
    </div>



