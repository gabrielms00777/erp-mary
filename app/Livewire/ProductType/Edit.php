<?php

namespace App\Livewire\ProductType;

use App\Livewire\Forms\ProductTypeForm;
use App\Models\ProductType;
use Livewire\Component;
use Mary\Traits\Toast;

class Edit extends Component
{
    use Toast;

    public ProductTypeForm $form;

    public ProductType $productType;

    public function mount()
    {
        $this->form->setProductType($this->productType);
    }

    public function save()
    {
        $this->form->update();

        $this->success('Tipo de produto editado com sucesso!', redirectTo: '/admin/product-types');
    }

    public function render()
    {
        return view('livewire.product-type.edit');
    }
}
