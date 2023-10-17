@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Usuario</div>
                ID: {{$id}}
                <div class="panel-body">
                    <form id="eliminar_usuario">
                        <input type="hidden" name="_method" value="DELETE" />
                        <input type="hidden" name="idv" id="idv" value="{{$id}}" />
                        <button>eliminar</button>
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