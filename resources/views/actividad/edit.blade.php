<!-- Modal actividad-->
<div class="modal fade" id="edit_actividad_modal" tabindex="-1" role="dialog" aria-labelledby="edit_actividad_modal_label">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="edit_actividad_modal_label">Titulo temp</h4>
        </div>
        <div class="modal-body">

            <form class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="c_act_nombre" class="col-md-4 control-label">Nombre</label>

                    <div class="col-md-6">                          
                       
                        <input id="e_act_vid" type="hidden" class="form-control" name="e_act_vid" value="">
                        <input id="e_pac_vid" type="hidden" class="form-control" name="e_pac_vid" value="">
                        <input id="e_act_nombre" type="text" class="form-control" name="e_act_nombre" value="">

                    </div>
                </div>
    
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" id="editar_actividad">Editar</button>          
        </div>
      </div>
    </div>
  </div>

<!-- Fin de Modal actividad-->