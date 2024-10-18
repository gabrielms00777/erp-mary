<?php

namespace App\Livewire\Product;

use App\Livewire\Forms\ProductForm;
use App\Models\ProductType;
use App\Models\Supplier;
use App\Models\Unit;
use Livewire\Component;
use Mary\Traits\Toast;

class Create extends Component
{
    use Toast;

    public ProductForm $form;

    public $productTypes;

    public $supplier;

    public $unit;

    public function mount()
    {
        $this->productTypes = ProductType::all();
        $this->supplier = Supplier::all();
        $this->unit = Unit::all();
    }

    public function save()
    {
        $this->form->store();

        $this->success('Produto cadastrado com sucesso!', redirectTo: '/admin/product');
    }

    public function placeholder()
    {
        return <<<'HTML'
        <div>
            Carregando...
        </div>
        HTML;
    }

    public function render()
    {
        return view('livewire.product.create');
    }
}
