<?php

namespace App\Livewire\Person;

use App\Livewire\Forms\PersonForm;
use App\Models\Group;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    public PersonForm $form;

    public $groups;

    public $contacts = [];

    public $grouped = [['id' => 1, 'name' => 'Administrador'], ['id' => 2, 'name' => 'User']];

    public array $newContact = [ // Para armazenar os dados do novo contato temporariamente
        'name' => '',
        'email' => '',
        'phone' => '',
        'observation' => '',
    ];

    #[Validate(['required', 'string', 'max:255'])]
    public string $newContactName;

    #[Validate(['required', 'email', 'max:255'])]
    public string $newContactEmail;

    #[Validate(['nullable', 'string', 'max:20'])]
    public string $newContactPhone;

    #[Validate(['nullable', 'string'])]
    public string $newContactObservation;

    public function mount()
    {
        $this->groups = Group::select('id', 'name')->get();
    }

    public function addContact()
    {
        $this->validate([
            'newContact.name' => 'required|string|max:255',
            'newContact.email' => 'required|email|max:255',
            'newContact.phone' => 'nullable|string|max:20',
            'newContact.observation' => 'nullable|string',
        ]);

        $this->contacts[] = $this->newContact;

        $this->reset('newContact');
    }

    public function removeContact($index)
    {
        array_splice($this->contacts, $index, 1);
    }

    public function save()
    {
        $this->form->store();

        $this->success('Pessoa cadastrado com sucesso!', redirectTo: '/admin/person');
    }

    public function render()
    {
        return view('livewire.person.create');
    }
}
