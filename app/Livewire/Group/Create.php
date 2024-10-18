<?php

namespace App\Livewire\Group;

use App\Livewire\Forms\GroupForm;
use Livewire\Component;
use Mary\Traits\Toast;

class Create extends Component
{
    use Toast;

    public GroupForm $form;

    public function save()
    {
        $this->form->store();

        $this->success('Grupo cadastrado com sucesso!', redirectTo: '/admin/product-types');
    }

    public function render()
    {
        return view('livewire.group.create');
    }
}
