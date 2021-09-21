<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Producto;
use App\Http\Livewire\ProductoComponente;

class Serch extends Component
{
    public $query = '',$filter = [],$highlightIndex;

    public function updatedQuery()
    {
        $this->filter = Producto::where('Producto', 'like', '%' . $this->query . '%')
            ->get()
            ->toArray();
    }

    public function mount()
    {
        $this->_reset();
    }

    public function _reset()
    {
        $this->query = '';
        $this->filter = [];
        $this->highlightIndex = 0;
    }

    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->filter) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->filter) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function selectProducto()
    {
        $produc = $this->filter[$this->highlightIndex] ?? null;
        if ($produc) {
            $this->redirect(route('show-contact', $produc['id']));
        }
    }

    public function render()
    {
        return view('livewire.serch');
    }

    public function index($id,$Producto,$des,$monto)
    {
        return view('_Producto',compact('id','Producto','des','monto'));
    }
}
