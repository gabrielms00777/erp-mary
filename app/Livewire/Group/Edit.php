<?php

namespace App\Livewire\Group;

use App\Livewire\Forms\GroupForm;
use App\Models\Group;
use Livewire\Component;
use Mary\Traits\Toast;

class Edit extends Component
{
    use Toast;

    public GroupForm $form;

    public Group $group;

    public function mount()
    {
        $this->form->setGroup($this->group);
    }

    public function save()
    {
        $this->form->update();

        $this->success('Grupo editado com sucesso!', redirectTo: '/admin/groups');
    }

    public function render()
    {
        return view('livewire.group.edit');
    }
}
