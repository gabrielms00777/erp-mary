<?php

namespace App\Livewire\ProductType;

use App\Livewire\Forms\ProductTypeForm;
use Livewire\Component;
use Mary\Traits\Toast;

class Create extends Component
{
    use Toast;

    public ProductTypeForm $form;

    public function save()
    {
        $this->form->store();

        $this->success('Tipo de produto cadastrado com sucesso!', redirectTo: '/admin/groups');
    }

    public function render()
    {
        return view('livewire.product-type.create');
    }
}
