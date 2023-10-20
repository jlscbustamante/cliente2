@extends('layouts.app')

@section('content')

<!-- Modal eliminar-->
<div class="modal fade" id="delete_paciente_modal" tabindex="-1" role="dialog" aria-labelledby="delete_paciente_modal_label">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="delete_paciente_modal_label">Titulo temp</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Nombres</label>

                    <div class="col-md-6">                          
                       
                        <input id="delete_vid" type="hidden" class="form-control" name="delete_vid" value="">
                        <input id="d_nombres" type="text" class="form-control" name="d_nombres" value="" readonly>

                        @if ($errors->has('nombres'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nombres') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Apellidos</label>

                    <div class="col-md-6">
                        <input id="d_apellidos" type="text" class="form-control" name="d_apellidos" value="" readonly>

                        @if ($errors->has('apellidos'))
                            <span class="help-block">
                                <strong>{{ $errors->first('apellidos') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('tipo_doc') ? ' has-error' : '' }}">
                    <label for="tipo_doc" class="col-md-4 control-label">Tipo Doc.</label>

                    <div class="col-md-6">
                        <input id="d_tipo_doc" type="tipo_doc" class="form-control" name="d_tipo_doc" value="" readonly>

                        @if ($errors->has('tipo_doc'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tipo_doc') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('nro_doc') ? ' has-error' : '' }}">
                    <label for="nro_doc" class="col-md-4 control-label">Nro_doc</label>

                    <div class="col-md-6">
                        <input id="d_nro_doc" type="nro_doc" class="form-control" name="d_nro_doc" value="" readonly>

                        @if ($errors->has('nro_doc'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nro_doc') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('fecha_nac') ? ' has-error' : '' }}">
                    <label for="fecha_nac" class="col-md-4 control-label">Fecha Nac.</label>

                    <div class="col-md-6">
                        <input id="d_fecha_nac" type="text" class="form-control" name="d_fecha_nac" value="" readonly>

                        @if ($errors->has('fecha_nac'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fecha_nac') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
    
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" id="eliminar_paciente">Eliminar</button>
        </div>
      </div>
    </div>
  </div>

<!-- Fin de Modal eliminar-->

<!-- Modal editar-->
<div class="modal fade" id="edit_paciente_modal" tabindex="-1" role="dialog" aria-labelledby="edit_paciente_modal_label">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="edit_paciente_modal_label">Titulo temp</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Nombres</label>

                    <div class="col-md-6">                          
                       
                        <input id="edit_vid" type="hidden" class="form-control" name="edit_vid" value="">
                        <input id="e_nombres" type="text" class="form-control" name="e_nombres" value="" required>

                        @if ($errors->has('nombres'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nombres') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Apellidos</label>

                    <div class="col-md-6">
                        <input id="e_apellidos" type="text" class="form-control" name="e_apellidos" value="" required autofocus>

                        @if ($errors->has('apellidos'))
                            <span class="help-block">
                                <strong>{{ $errors->first('apellidos') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('tipo_doc') ? ' has-error' : '' }}">
                    <label for="tipo_doc" class="col-md-4 control-label">Tipo Doc.</label>

                    <div class="col-md-6">
                        <input id="e_tipo_doc" type="tipo_doc" class="form-control" name="e_tipo_doc" value="" required>

                        @if ($errors->has('tipo_doc'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tipo_doc') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('nro_doc') ? ' has-error' : '' }}">
                    <label for="nro_doc" class="col-md-4 control-label">Nro_doc</label>

                    <div class="col-md-6">
                        <input id="e_nro_doc" type="nro_doc" class="form-control" name="e_nro_doc" value="" required>

                        @if ($errors->has('nro_doc'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nro_doc') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('fecha_nac') ? ' has-error' : '' }}">
                    <label for="fecha_nac" class="col-md-4 control-label">Fecha Nac.</label>

                    <div class="col-md-6">
                        <input id="e_fecha_nac" type="text" class="form-control" name="e_fecha_nac" value="" required>

                        @if ($errors->has('fecha_nac'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fecha_nac') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
    
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" id="editar_paciente">Modificar</button>
        </div>
      </div>
    </div>
  </div>

<!-- Fin de Modal editar-->

<!-- Modal Crear-->
<div class="modal fade" id="create_paciente_modal" tabindex="-1" role="dialog" aria-labelledby="create_paciente_modal_label">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="create_paciente_modal_label">Crear paciente</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Nombres</label>

                    <div class="col-md-6">
                        
                        <!-- <input id="apiToken" type="text" class="form-control" name="apiToken" value="dfdfdf"  autofocus> -->
                        <input id="c_nombres" type="text" class="form-control" name="c_nombres" value="{{ old('nombres') }}" required autofocus>

                        @if ($errors->has('nombres'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nombres') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Apellidos</label>

                    <div class="col-md-6">
                        <input id="c_apellidos" type="text" class="form-control" name="c_apellidos" value="{{ old('apellidos') }}" required autofocus>

                        @if ($errors->has('apellidos'))
                            <span class="help-block">
                                <strong>{{ $errors->first('apellidos') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('tipo_doc') ? ' has-error' : '' }}">
                    <label for="tipo_doc" class="col-md-4 control-label">Tipo Doc.</label>

                    <div class="col-md-6">
                        <input id="c_tipo_doc" type="tipo_doc" class="form-control" name="c_tipo_doc" value="{{ old('tipo_doc') }}" required>

                        @if ($errors->has('tipo_doc'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tipo_doc') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('nro_doc') ? ' has-error' : '' }}">
                    <label for="nro_doc" class="col-md-4 control-label">Nro_doc</label>

                    <div class="col-md-6">
                        <input id="c_nro_doc" type="nro_doc" class="form-control" name="c_nro_doc" required>

                        @if ($errors->has('nro_doc'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nro_doc') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('fecha_nac') ? ' has-error' : '' }}">
                    <label for="fecha_nac" class="col-md-4 control-label">Fecha Nac.</label>

                    <div class="col-md-6">
                        <input id="c_fecha_nac" type="text" class="form-control" name="c_fecha_nac" value="{{ old('fecha_nac') }}" required autofocus>

                        @if ($errors->has('fecha_nac'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fecha_nac') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
          
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" id="crear_paciente">Crear</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Fin Modal crear -->
<div class="container">
    <div class="row">
        <div class="col-md-2 col-md-offset-10">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create_paciente_modal" >Nuevo paciente</button>            
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="lista" cellpadding="0" cellspacing="0" border="0" class="display table table-bordered table-striped" >
    
                                        <thead>
                                            <tr>                                            
                                                <th>
                                                    Nombres
                                                </th>
                                                <th>
                                                    Apellidos
                                                </th>
                                                <th>
                                                    Tipo Doc
                                                </th>
                                                <th>
                                                    Nro. Doc
                                                </th>
                                                <th>
                                                    Fecha Nac.
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


            </div>
        </div>
    </div>
</div>

@push('scripts')
<!-- Scripts -->
<script src="{{ asset('js_app/listar.js')}}"></script>

<script src="{{ asset('js_app/crear.js')}}"></script>
<script src="{{ asset('js_app/editar.js')}}"></script>
<script src="{{ asset('js_app/eliminar.js')}}"></script>
@endpush
@endsection
