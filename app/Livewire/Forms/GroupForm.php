<?php

namespace App\Livewire\Forms;

use App\Models\Group;
use Livewire\Attributes\Validate;
use Livewire\Form;

class GroupForm extends Form
{
    public ?Group $group;

    #[Validate(['required', 'max:255', 'string'])]
    public ?string $name;

    public function setGroup($group)
    {
        $this->group = $group;
        $this->name = $group->name;
    }

    public function store()
    {
        $this->validate();

        Group::create($this->all());
    }

    public function update()
    {
        $this->validate();

        $this->group->update($this->all());
    }
}
