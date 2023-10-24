@extends('layouts.app')

@section('content')

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
                    <label for="c_con_nombre" class="col-md-4 control-label">Nombre</label>

                    <div class="col-md-6">                          
                       
                        <input id="c2_pac_vid" type="hidden" class="form-control" name="c2_pac_vid" value="">
                        <input id="c_con_nombre" type="text" class="form-control" name="c_con_nombre" value="">

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


@include('actividad.lista') 
@include('actividad.create') 
@include('actividad.edit') 

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
                    <label for="d_nombres" class="col-md-4 control-label">Nombres</label>

                    <div class="col-md-6">                          
                       
                        <input id="delete_vid" type="hidden" class="form-control" name="delete_vid" value="">
                        <input id="d_nombres" type="text" class="form-control" name="d_nombres" value="" readonly>

                    </div>
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Apellidos</label>

                    <div class="col-md-6">
                        <input id="d_apellidos" type="text" class="form-control" name="d_apellidos" value="" readonly>

                    </div>
                </div>

                <div class="form-group">
                    <label for="d_tipo_doc" class="col-md-4 control-label">Tipo Doc.</label>

                    <div class="col-md-6">
                        <input id="d_tipo_doc" type="tipo_doc" class="form-control" name="d_tipo_doc" value="" readonly>

                    </div>
                </div>

                <div class="form-group">
                    <label for="d_nro_doc" class="col-md-4 control-label">Nro_doc</label>

                    <div class="col-md-6">
                        <input id="d_nro_doc" type="nro_doc" class="form-control" name="d_nro_doc" value="" readonly>

                    </div>
                </div>

                <div class="form-group">
                    <label for="d_fecha_nac" class="col-md-4 control-label">Fecha Nac.</label>

                    <div class="col-md-6">
                        <input id="d_fecha_nac" type="text" class="form-control" name="d_fecha_nac" value="" readonly>

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
                    <label for="e_nombres" class="col-md-4 control-label">Nombres</label>

                    <div class="col-md-6">                          
                       
                        <input id="edit_vid" type="hidden" class="form-control" name="edit_vid" value="">
                        <input id="e_nombres" type="text" class="form-control" name="e_nombres" value="" required>

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

                    </div>
                </div>

                <div class="form-group{{ $errors->has('nro_doc') ? ' has-error' : '' }}">
                    <label for="nro_doc" class="col-md-4 control-label">Nro_doc</label>

                    <div class="col-md-6">
                        <input id="e_nro_doc" type="nro_doc" class="form-control" name="e_nro_doc" value="" required>

                    </div>
                </div>

                <div class="form-group{{ $errors->has('fecha_nac') ? ' has-error' : '' }}">
                    <label for="fecha_nac" class="col-md-4 control-label">Fecha Nac.</label>

                    <div class="col-md-6">
                        <input id="e_fecha_nac" type="text" class="form-control" name="e_fecha_nac" value="" required>

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

                    </div>
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Apellidos</label>

                    <div class="col-md-6">
                        <input id="c_apellidos" type="text" class="form-control" name="c_apellidos" value="{{ old('apellidos') }}" required autofocus>

                    </div>
                </div>

                <div class="form-group{{ $errors->has('tipo_doc') ? ' has-error' : '' }}">
                    <label for="tipo_doc" class="col-md-4 control-label">Tipo Doc.</label>

                    <div class="col-md-6">
                        <input id="c_tipo_doc" type="tipo_doc" class="form-control" name="c_tipo_doc" value="{{ old('tipo_doc') }}" required>

                    </div>
                </div>

                <div class="form-group{{ $errors->has('nro_doc') ? ' has-error' : '' }}">
                    <label for="nro_doc" class="col-md-4 control-label">Nro_doc</label>

                    <div class="col-md-6">
                        <input id="c_nro_doc" type="nro_doc" class="form-control" name="c_nro_doc" required>

                    </div>
                </div>

                <div class="form-group{{ $errors->has('fecha_nac') ? ' has-error' : '' }}">
                    <label for="fecha_nac" class="col-md-4 control-label">Fecha Nac.</label>

                    <div class="col-md-6">
                        <input id="c_fecha_nac" type="text" class="form-control" name="c_fecha_nac" value="{{ old('fecha_nac') }}" required autofocus>

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
        <form class="form-grid">
            <div class="form-group">               

                <label for="f1_fecha_nac" class="col-md-1  col-md-offset-1 control-label">Fecha desde.</label>
                <div class="col-md-2">                    
                    <input id="f1_fecha_nac" type="text" class="form-control" name="f1_fecha_nac" value="1995-06-01" >

                </div>

                <label for="f2_fecha_nac" class="col-md-1 control-label">Fecha hasta.</label>
                <div class="col-md-2">                    
                    <input id="f2_fecha_nac" type="text" class="form-control" name="f2_fecha_nac" value="1995-08-31" >

                </div>

                <label for="f3_nombre" class="col-md-1 control-label">Nombre</label>
                <div class="col-md-2">                    
                    <input id="f3_nombre" type="text" class="form-control" name="f3_nombre" value="Da" >

                </div>

                <div class="col-md-1">
                    <button type="button" class="btn btn-primary" id="filtrar_fecha_act" >Filtrar</button>            
                </div>
            </div>

        </form>
    </div>
    <div class="row">
        <div class="col-md-2 col-md-offset-10">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create_paciente_modal" >Nuevo paciente</button>            
        </div>
    </div>
    <div class="row">
        <div class="col-md-11 col-md-offset-1">
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
                                                <th>
                                                    Actividad
                                                </th>
                                                <th>
                                                    Concepto
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

<script src="{{ asset('js_app/actividad/listar.js')}}"></script>
<script src="{{ asset('js_app/actividad/crear.js')}}"></script>
<script src="{{ asset('js_app/actividad/editar.js')}}"></script>
<script src="{{ asset('js_app/concepto/crear.js')}}"></script>
@endpush
@endsection
