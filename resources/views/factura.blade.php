@extends('plantilla')

@section('contenido')
    <div id="imp1">
        <h2 class="mt-4">Factura de venta</h2>
        <p class="mt-4 mb-4"><strong>Repuesto:</strong> 
            @if (session('repuesto'))
                {{ session('repuesto')}}
            @endif
        </p>
        <p class="mb-4"><strong>Precio unitario:</strong> 
            @if (session('precio'))
                $ {{ session('precio')}}
            @endif
        </p>
        <p class="mb-4"><strong>Unidades:</strong> 
            @if (session('unidades'))
                {{ session('unidades')}}
            @endif
        </p>  
        <p class="mb-4"><strong>Precio total:</strong> 
            @if (session('total'))
                $ {{ session('total')}}
            @endif
        </p> 
    </div>  
    <button class="btn btn-success" type="submit" onclick="javascript:imprim1(imp1);">Imprimir factura</button>
    <a href="{{ route('inventario') }}" class="btn btn-secondary">Volver al inventario</a>
@endsection