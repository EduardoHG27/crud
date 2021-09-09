<?php require RUTA_APP . '/vistas/inc/header.php'; ?>

<script type="text/javascript" src='../files/bower_components/sweetalert/js/sweetalert2.all.min.js'> </script>
<!-- SweetAlert2 -->
<link rel="stylesheet" href='../files/bower_components/sweetalert/css/sweetalert2.min.css' media="screen" />


<!--<a href="<?php //echo RUTA_URL; 
              ?>/paginas" class="btn btn-light"><i class="fa fa-backward"></i>Volver<a>-->



<div id="collapseExample2">
<table class="table table-head-fixed text-nowrap" id="mytabla">
                  <thead>
                    <tr>
                      <th>Usuarios</th>
                      <th>Colonia</th>
                      
                     
                     
                    <!--  <th>Guardar</th>-->
                    </tr>
                  </thead>
                  <tbody id ="res">
                 
                  </tbody>
                </table>
    
</div>
<div id="content1" class="col-lg-12">
            Contenido inicial...
        </div>




<script>



$(document).ready(function() {

        cargarcajas();
    });


function cargarcajas() {

  $('#content1').html('<div class="loading"><img src="<?php echo RUTA_ESTILOS; ?>/pagina_prueba/assets/img/balls.gif" class="img-fluid" alt=""><br/>Un momento, por favor...</div>');

    $.ajax({
				type:"POST",
				url:"<?php echo RUTA_URL ?>/paginas/cargar_dash/",
				data:'jaja',
				success:function(result){
          var result = JSON.parse(result);
          var datos= result.datos;
          var suma=0;
          if (result.status == 'success') {
            $('#content1').html('<div class="loading"><br/>Consulta Lista</div>');

            let res = document.querySelector('#res');
            int=0;
            res.innerHTML='';

           for(let item of datos)
           {
             int=int+1;
             res.innerHTML += 
             `<td>${item.Repetidos}</td>
              <td>${item.Codigo}</td>`
              suma= suma + parseInt(item.Repetidos);
           }

           console.log("Suma de los registros:"+suma);
            $.notify("Busqueda Realizada!!");
		                           
            
          }else{
                              $.notify("Sin datos");
						}
				}
			});
}

</script>