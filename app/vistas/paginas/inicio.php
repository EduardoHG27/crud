<?php require RUTA_APP . '/vistas/inc/header.php';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<table class="table table-bordered" id="tabla">
  <thead>
      <th>#</th>
      <th>Requisito</th>
      <th>Fecha completado</th>
      <th>Completado</th>
      <th>Observacion</th>
  </thead>
  <tbody id="t_cuerpo">
      <tr>
          <td>1</td>
          <td>Ceremonia de bienvenida</td>
          <td><input type="text" id="fecha" class="form-control"></td>
          <td><select name="" id="estado" class="form-control">
              <option value="si">si</option>
              <option value="no">no</option>
          </select></td>
          <td><textarea name="" id="obs" cols="20" rows="2" class="form-control"></textarea></td>
      </tr>
      <tr>
          <td>2</td>
          <td>Sermon nocturno</td>
          <td><input type="text" id="fecha" class="form-control"></td>
          <td><select name="" id="estado" class="form-control">
              <option value="si">si</option>
              <option value="no">no</option>
          </select></td>
          <td><textarea name="" id="obs" cols="20" rows="2" class="form-control"></textarea></td>
      </tr>
      <tr>
          <td>3</td>
          <td>Sermon diurno</td>
          <td><input type="text" id="fecha" class="form-control"></td>
          <td><select name="" id="estado" class="form-control">
              <option value="si">si</option>
              <option value="no">no</option>
          </select></td>
          <td><textarea name="" id="obs" cols="20" rows="2" class="form-control"></textarea></td>
      </tr>
  </tbody>
</table>

<button type="button" id="obtener" onclick="crearDatos();">Obtener</button>

<script>


function crearDatos() {
  var listaRequisitos = [];
  $("#t_cuerpo tr").each(function(index, elem){
    listaRequisitos.push({
      id: $(this).find('td').eq(0).html(),
      descri: $(this).find('td').eq(1).html(),
      fecha: $(this).find('td').eq(2).find('input').val(),
      estado: $(this).find('td').eq(3).find('select').val()
    });
  });
  console.log(listaRequisitos);
}



</script>

<?php require RUTA_APP . '/vistas/inc/footer.php';?>
