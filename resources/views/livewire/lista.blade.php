<div>
    <h2>Listado de Productos</h2>
    <br>
    <div class="d-flex justify-content-center">
        {{$productos->links()}}
    </div>
    <br>
    <div class="row">
    @foreach ($productos as $producto)
        <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="card w-75 mb-5 shadow align-self-baseline mx-auto">
                <h5 class="card-title text-center">{{ $producto->Producto }}</h5>
                <div class="card-body">
                    <p class="card-text">{{ $producto->Descripcion }}</p>
                    <p>Q. {{ $producto->Monto }}</p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <button wire:click='edit({{$producto->id}})' class="btn btn-outline-primary btn-sm">
                        Editar
                    </button>
                    <p>&nbsp;&nbsp;</p>
                    <button wire:click='destroy({{ $producto->id }})' class="btn btn-outline-danger btn-sm">
                        Eliminar
                    </button>
                </div>
            </div>
        </div>
    @endforeach
    </div>

    <div class="d-flex justify-content-center">
        {{$productos->links()}}
    </div>
</div>


