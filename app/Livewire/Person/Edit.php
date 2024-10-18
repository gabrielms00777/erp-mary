<?php

namespace App\Livewire\Person;

use App\Livewire\Forms\PersonForm;
use App\Models\Contact;
use App\Models\Group;
use App\Models\Person;
use Livewire\Component;
use Mary\Traits\Toast;

class Edit extends Component
{
    use Toast;

    public PersonForm $form;

    public Person $person;

    public $grouped = [['id' => 1, 'name' => 'Administrador'], ['id' => 2, 'name' => 'User']];

    public $groups = [];

    public $contacts = [];

    public array $newContact = [ // Para armazenar os dados do novo contato temporariamente
        'name' => '',
        'email' => '',
        'phone' => '',
        'observation' => '',
    ];

    public function mount()
    {
        $this->groups = Group::select('id', 'name')->get();
        $this->form->setPerson($this->person);
        $this->person->load('contacts');
        $this->contacts = array_values($this->person->contacts->toArray());
    }

    public function addContact()
    {
        $this->validate([
            'newContact.name' => 'required|string|max:255',
            'newContact.email' => 'required|email|max:255',
            'newContact.phone' => 'nullable|string|max:20',
            'newContact.observation' => 'nullable|string',
        ]);

        $contact = $this->person->contacts()->create($this->newContact);
        $this->newContact['id'] = $contact->id;
        // dd($this->contacts, $this->newContact);
        $this->contacts[] = $this->newContact;

        $this->reset('newContact');
    }

    public function removeContact(Contact $contact, $index)
    {
        $contact->delete();
        array_splice($this->contacts, $index, 1);
    }

    public function save()
    {
        // dd($this->contacts);
        $this->form->update();

        foreach ($this->contacts as $contact) {
            $this->person->contacts()->create($contact);
        }

        $this->success('Pessoa editado com sucesso!', redirectTo: '/admin/persons');
    }

    public function render()
    {
        return view('livewire.person.edit');
    }
}
