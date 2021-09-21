<div>
    <div class="form-group">
        <label>Producto</label>
        <input type="text" class="form-control" wire:model="Producto">
        @error('Producto') <span class="text-danger">{{$message}}</span> @enderror
    </div>

    <br>
    <div class="form-group">
        <label>Descripcion</label>
        <textarea class="form-control" wire:model="Descripcion"></textarea>
        @error('Descripcion') <span class="text-danger">{{$message}}</span> @enderror
    </div>

    <br>
    <div class="form-group">
        <label>Monto</label>
        <input type="number" step="any" class="form-control" wire:model="Monto">
        @error('Monto') <span class="text-danger">{{$message}}</span> @enderror
    </div>
</div>
