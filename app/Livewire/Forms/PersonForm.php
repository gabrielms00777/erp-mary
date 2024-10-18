<?php

namespace App\Livewire\Forms;

use App\Models\Person;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PersonForm extends Form
{
    public Person $person;

    #[Validate(['required', 'max:255', 'string'])]
    public ?string $name;

    #[Validate(['required', 'string', 'max:255'])]
    public ?string $document = null;

    #[Validate(['required', 'string', 'max:255'])]
    public $user_type = null;

    #[Validate(['nullable', 'string', 'max:20'])]
    public ?string $phone = null;

    #[Validate(['nullable', 'email', 'max:255'])]
    public ?string $email = null;

    #[Validate(['nullable', 'string'])]
    public ?string $observation = null;

    #[Validate(['required', 'string', 'max:255'])]
    public ?string $state = null;

    #[Validate(['required', 'string', 'max:255'])]
    public ?string $city = null;

    #[Validate(['nullable', 'string', 'max:255'])]
    public ?string $neighborhood = null;

    #[Validate(['nullable', 'string', 'max:255'])]
    public ?string $street = null;

    #[Validate(['nullable', 'string', 'max:20'])]
    public ?string $number = null;

    #[Validate(['nullable', 'string', 'max:255'])]
    public ?string $complement = null;

    #[Validate(['nullable', 'string', 'max:20'])]
    public ?string $zipcode = null;

    #[Validate(['nullable', 'date'])]
    public ?string $activation_date = null;

    #[Validate(['nullable', 'date'])]
    public ?string $deactivation_date = null;

    #[Validate(['required', 'array'])]
    public array $groups = [];

    public $contacts = [];

    public array $newContact = [
        'name' => '',
        'email' => '',
        'phone' => '',
        'observation' => '',
    ];

    // #[Validate(['required', 'string', 'max:255'])]
    // public string $newContactName;

    // #[Validate(['required', 'email', 'max:255'])]
    // public string $newContactEmail;

    // #[Validate(['nullable', 'string', 'max:20'])]
    // public string $newContactPhone;

    // #[Validate(['nullable', 'string'])]
    // public string $newContactObservation;

    public function setPerson($person)
    {
        $this->person = $person;
        $this->name = $person->name;
        $this->document = $person->document;
        $this->user_type = $person->user_type;
        $this->phone = $person->phone;
        $this->email = $person->email;
        $this->observation = $person->observation;
        $this->state = $person->state;
        $this->city = $person->city;
        $this->neighborhood = $person->neighborhood;
        $this->street = $person->street;
        $this->number = $person->number;
        $this->complement = $person->complement;
        $this->zipcode = $person->zipcode;
        $this->activation_date = $person->activation_date;
        $this->deactivation_date = $person->deactivation_date;
        $this->groups = $person->groups->pluck('id')->toArray();
    }

    public function store()
    {
        $this->validate();

        $person = Person::create([
            'name' => $this->name,
            'user_type' => $this->user_type,
            'document' => $this->document,
            'phone' => $this->phone,
            'email' => $this->email,
            'state' => $this->state,
            'city' => $this->city,
            'neighborhood' => $this->neighborhood,
            'street' => $this->street,
            'number' => $this->number,
            'complement' => $this->complement,
            'zipcode' => $this->zipcode,
            'observation' => $this->observation,
            'activation_date' => $this->activation_date,
            'deactivation_date' => $this->deactivation_date,
        ]);

        $person->groups()->sync($this->groups);

        dd($person->groups);

        dd($this->all());
    }

    public function update()
    {
        $this->validate();

        $this->person->update($this->all());

        $this->person->groups()->sync($this->groups);
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
}
