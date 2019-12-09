@extends('plantilla')

@section('contenido')
@if (session('mensaje'))
    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
        {{ session('mensaje')}}
        <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body d-flex">
                <H1>Stock</H1>
                <button type="button" class="btn btn-success ml-auto" data-toggle="modal" data-target="#exampleModalLong">
                    <i class="fas fa-plus"></i> Agregar repuesto
                </button>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive">
 <table class="table table-striped mt-4 table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Repuesto</th>
            <th scope="col">Precio</th>
            <th scope="col">Stock</th>
            <th scope="col">Ubicación</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($repuestos ?? '' as $item)
        <tr>
            <th scope="row">{{ $item->nombre_repuesto }}</th>
            <td> $ {{ $item->precio }}</td>
            <td>{{ $item->unidades }}</td>
            <td>{{ $item->ubicacion }}</td>
            <td class="text-center">
            <a href="{{ route('repuesto.venta', $item->nombre_repuesto) }}" class="btn btn-dark">Vender</a>
            </td>
        </tr>  
        @endforeach
    </tbody>
  </table>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nuevo repuesto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('agregar') }}" method="POST">
      <div class="modal-body mt-4 mb-4">        
            {{ csrf_field() }}

            @error('nombre')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    El campo nombre es obligatorio
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror
            @error('precio')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    El campo precio es obligatorio
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror

            <input type="text" name="nombre" placeholder="Nombre repuesto" class="form-control mb-2" value="{{ old('nombre')}}" required>
            <input type="number" name="precio" placeholder="Precio" class="form-control mb-2" value="{{ old('precio')}}" required>        
      </div><br>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button class="btn btn-dark" type="submit">Agregar repuesto</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection