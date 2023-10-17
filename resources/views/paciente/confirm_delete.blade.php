@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-1 col-md-offset-9">
            <div class="top-right links">
                @if (Auth::check())
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Eliminación de paciente.</div>
              
                <div class="panel-body">
                    <form class="form-horizontal"  id="eliminar_paciente">
                        <input type="hidden" name="_method" value="DELETE" />
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombres</label>

                            <div class="col-md-6">                          
                               
                                <input id="vid" type="hidden" class="form-control" name="vid" value="{{ $id }}">
                                <input id="nombres" type="text" class="form-control" name="nombres" value="" readonly>

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
                                <input id="apellidos" type="text" class="form-control" name="apellidos" value="" readonly>

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
                                <input id="tipo_doc" type="tipo_doc" class="form-control" name="tipo_doc" value="" readonly>

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
                                <input id="nro_doc" type="nro_doc" class="form-control" name="nro_doc" value="" readonly>

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
                                <input id="fecha_nac" type="text" class="form-control" name="fecha_nac" value="" readonly>

                                @if ($errors->has('fecha_nac'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fecha_nac') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Eliminar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<!-- Scripts -->
<script src="{{ asset('js_app/eliminar.js')}}"></script>
@endpush
@endsection