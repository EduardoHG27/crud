<?php require RUTA_APP . '/vistas/inc/header.php'; ?>

<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Selecciona una caja</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" id="frmBuscar">
            <div class="modal-body">
                <div class="form-group">
                    <label>Caja</label>
                    
                    <select id="res" name="select" class="form-control select2" style="width: 100%;">
                    <option selected="selected"></option>
                    
                    </select>
                </div>
            </div>
                </form>
            <div class="modal-footer justify-content-between">
                <input type="button" class="btn btn-primary" id="btn_selec" name="btn_selec" value="Seleccionar" onclick="" />
       
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>

<script type="text/javascript">
    function hideCloseButton() {
        // get the close button inside the modal
        //  $('#modal-lg .close').css('display', 'none');
    }


    $(document).ready(function() {
        $('#modal-lg').modal({
            backdrop: 'static',
            keyboard: false
        })
        hideCloseButton();

        cargarcajas();
    });

    function cargarcajas() {

       select = $('select[name="lineas"] option:selected').text();
        $.ajax({
            type: "POST",
            url: "<?php echo RUTA_URL ?>/paginas/load_cajas/",
            data: select,
            success: function(result) {
                var result = $.parseJSON(result);
                var datos1 = result.datos;
                if (result.estado == 'success') {

                    let res = document.querySelector('#res');
                    int = 0;
                    res.innerHTML = '';
                    
                    for (let item of datos1) {
              int = int + 1;
              res.innerHTML += `
                    <option>${item.ID_CAJA}</option>
                    `
                    };
                    
                   
                } else {

                }
            }
        });
    }

    $('#btn_selec').click(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
      });
      var datos = $('#frmBuscar').serialize();
      $.ajax({
        type: "POST",
        url: "<?php echo RUTA_URL ?>/paginas/selec_cajas/",
        data: datos,
        success: function(result) {
          var result = $.parseJSON(result);
          var datos1 = result.datos;
          if (result.estado == 'success') {
            Toast.fire({
              icon: 'success',
              title: 'Exito: Registro encontrado.'
            })
            window.location.href ="<?php echo RUTA_URL?>/paginas/form_cajas";
          } else {
            Toast.fire({
              icon: 'error',
              title: 'Aviso: Datos no encontrados'
            })
          }
        }
      });

      return false;
    });
</script>