<div class="relative mt-3 md:mt-0">
    <input
        type="text"
        class="form-control bg-white text-small"
        placeholder="Buscar..."
        wire:model.debounce.500ms="query"
        wire:keydown.escape="_reset"
        wire:keydown.tab="_reset"
        wire:keydown.ArrowUp="decrementHighlight"
        wire:keydown.ArrowDown="incrementHighlight"
        wire:keydown.enter="selectContact"
    />

    <div wire:loading class="absolute z1 list-group bg-white w-100 rounded-0 shadow-lg">
        <div class="list-group-item">Buscando...</div>
    </div>

    @if(!empty($query))
        <div class="fixed top-0 right-0 bottom-0 left-0" wire:click="_reset"></div>

        <div class="absolute z1 list-group-item bg-white w-100 rounded-0 shadow-lg">
            @if(!empty($filter))
                <table class="table table-hover">
                    @foreach($filter as $i => $producto)
                        <tr>
                            @csrf;
                            <td>
                                {{ $producto['Producto']  }}
                            </td>
                            <td>
                                {{$producto['Descripcion']}}
                            </td>
                            <td>
                                Q. {{ $producto['Monto']}}
                            </td>
                            <td>
                                <button class="btn btn-primary" method="GET" action="{{route('/v/', $producto['id'],$producto['Producto'],$producto['Descripcion'],$producto['Monto'])}}">Ver</button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
                <div class="list-item">No existen coincidencias</div>
            @endif
        </div>
    @endif
</div>
