@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="row">
                        <div class="col-md-12 col-md-offset-10">
                            <a href="/pacientes/create">Nuevo Paciente</a>
                        </div>
                    </div>
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
@endsection
