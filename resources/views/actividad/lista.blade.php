<!-- Modal actividad-->
<div class="modal fade" id="lista_actividad_modal" tabindex="-1" role="dialog" aria-labelledby="create_actividad_modal_label">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="create_actividad_modal_label">Titulo temp</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create_actividad_modal" data-edit_vid="">Nuevo</button>
                </div>
            </div>
            <div class="row">
                <form class="form-grid">
                    <label for="f1_act_created_at" class="col-md-2 control-label">Fecha desde</label>
                    <div class="form-group">
                        <div class="input-group">                        
                            <input id="f1_act_created_at" type="text" class="form-control" name="f1_act_created_at" value="01/10/2023" >
                            <input type="hidden" id="pac_vid" name="pac_vid" value=""/>
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                      </div>

                      <label for="f2_act_created_at" class="col-md-2 control-label">Fecha hasta</label>
                      <div class="form-group">
                        <div class="input-group">                        
                            <input id="f2_act_created_at" type="text" class="form-control" name="f2_act_created_at" value="01/10/2023" >
                            
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                      </div>

                    <div class="form-group">               
                
                        <div class="col-md-1">
                            <button type="button" class="btn btn-primary" id="filtrar_act_created_at" >Filtrar</button>            
                        </div>
                    </div>
        
                </form>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="lista_activ" cellpadding="0" cellspacing="0" border="0" class="display table table-bordered table-striped" >

                            <thead>
                                <tr>                                            
                                    <th>
                                        Nombre
                                    </th>                                                        
                                    <th>
                                        Fecha creación
                                    </th>
                                    <th>
                                        Editar
                                    </th>
                                    <th>
                                        Borrar
                                    </th>                                    
                                </tr>
                            </thead>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>          
        </div>
      </div>
    </div>
  </div>

<!-- Fin de Modal actividad-->