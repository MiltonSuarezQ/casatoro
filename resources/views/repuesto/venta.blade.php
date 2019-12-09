@extends('plantilla')

@section('contenido')

@if (!session('mensaje'))
    <h2 class="mt-4">Confirmar venta </h2>
    @foreach($repuestos ?? '' as $item)
    <p class="mt-4"><strong>Repuesto:</strong> {{ $item->nombre_repuesto }}</p>
    <p class="mb-4"><strong>Precio:</strong> $ {{ $item->precio }}</p>
    <div class="input-group mb-3 col-sm-2" style="padding-left: 0px!important;">
    <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">Unidades</label>
    </div>    
    <form action="{{ route('venta.confirmar', $item->nombre_repuesto) }}" method="POST">
        @method('PUT')
        {{ csrf_field() }}     
        <select class="custom-select " id="inputGroupSelect01" name="unidades"> 
            @for ($i = 1; $i <= $item->unidades; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor        
        </select>
        </div>
        <input type="hidden" name="precio" value="{{ $item->precio }}">        
        <button class="btn btn-success" type="submit">Confirmar venta</button>
    </form>
    @endforeach
@endif

@if (session('mensaje'))
    <div id="imp1">
        <h2 class="mt-4">Factura de venta</h2>
        <p class="mt-4 mb-4"><strong>Repuesto:</strong> {{ $repuestos->nombre_repuesto }}</p>
        <p class="mb-4"><strong>Precio unitario:</strong> {{ $repuestos->precio }}</p>
        <p class="mb-4"><strong>Unidades:</strong> 
            @if (session('unidades'))
                {{ session('unidades')}}
            @endif
        </p>  
        <p class="mb-4"><strong>Precio total:</strong> {{ $repuestos->precio }}</p> 
    </div>  
    <button class="btn btn-success" type="submit" onclick="javascript:imprim1(imp1);">Imprimir factura</button>
    <a href="{{ route('inventario') }}" class="btn btn-secondary">Volver al inventario</a>
@endif

@endsection