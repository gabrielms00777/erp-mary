<?php

namespace App\Livewire\Product;

use App\Livewire\Forms\ProductForm;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Supplier;
use App\Models\Unit;
use Livewire\Component;
use Mary\Traits\Toast;

class Edit extends Component
{
    use Toast;

    public ProductForm $form;

    public Product $product;

    public $productTypes;

    public $supplier;

    public $unit;

    public function mount()
    {
        $this->form->setProduct($this->product);
        $this->productTypes = ProductType::all();
        $this->supplier = Supplier::all();
        $this->unit = Unit::all();
    }

    public function save()
    {
        $this->form->update();

        $this->success('Produto editado com sucesso!', redirectTo: '/admin/product');
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
        return view('livewire.product.edit');
    }
}
