<!-- Modal concepto-->
<div class="modal fade" id="create_concepto_modal" tabindex="-1" role="dialog" aria-labelledby="create_concepto_modal_label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="create_concepto_modal_label">Titulo temp</h4>
      </div>
      <div class="modal-body">

          <form class="form-horizontal">
              {{ csrf_field() }}

              <div class="form-group">
                  <label for="c_cpt_nombre" class="col-md-4 control-label">Nombre</label>

                  <div class="col-md-6">                                                                         
                      <input id="c2_pac_vid" type="hidden" class="form-control" name="c2_pac_vid" value="">
                      <input id="c_cpt_nombre" type="text" class="form-control" name="c_cpt_nombre" value="">

                  </div>
              </div>
  
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="crear_concepto">Crear</button>          
      </div>
    </div>
  </div>
</div>

<!-- Fin de Modal concepto-->