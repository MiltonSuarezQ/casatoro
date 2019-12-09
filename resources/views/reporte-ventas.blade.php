@extends('plantilla')

@section('contenido')
 <h1 class="mt-4">Reporte ventas</h1>
 @if (session('unidades'))
    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
        {{ session('unidades')}}
        <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session('repuesto'))
    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
        {{ session('repuesto')}}
        <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session('precio'))
    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
        {{ session('precio')}}
        <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@endsection