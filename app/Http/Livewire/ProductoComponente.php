<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Producto;

class ProductoComponente extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Pro_id,$Producto,$Descripcion,$Monto;
    public $view = 'create';

    public function render()
    {
        return view('livewire.producto-componente',[
            'productos'=>Producto::orderBy('id','desc')->paginate(10)
        ]);
    }

    public function store()
    {
        $this->validate(['Producto'=>'required', 'Descripcion'=>'required', 'Monto'=>'required']);

        $producto = Producto::create([
            'Producto' => $this->Producto,
            'Descripcion' => $this->Descripcion,
            'Monto' => $this->Monto
        ]);

        $this->edit($producto->id);
    }

    public function edit($id)
    {
        $producto = Producto::find($id);

        $this->Pro_id = $producto->id;
        $this->Producto = $producto->Producto;
        $this->Descripcion = $producto->Descripcion;
        $this->Monto = $producto->Monto;

        $this->view = "edit";
    }

    public function update()
    {
        $this->validate(['Producto'=>'required', 'Descripcion'=>'required', 'Monto'=>'required']);

        $producto = Producto::find($this->Pro_id);

        $producto -> update([
            'Producto' => $this->Producto,
            'Descripcion' => $this->Descripcion,
            'Monto' => $this->Monto,
        ]);

        $this->default();
    }

    public function default()
    {
        $this->Producto = '';
        $this->Descripcion = '';
        $this->Monto = '';

        $this->view = "create";
    }

    public function destroy($id)
    {
        Producto::destroy($id);
    }
}
