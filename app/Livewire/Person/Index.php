<?php

namespace App\Livewire\Person;

use App\Models\Person;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;

class Index extends Component
{
    use Toast, WithPagination;

    public string $search = '';

    public int $perPage = 10;

    public bool $drawer = false;

    public bool $modal = false;

    public array $sortBy = ['column' => 'id', 'direction' => 'asc'];

    public array $headers = [
        ['key' => 'id', 'label' => '#', 'class' => 'w-1 text-primary'],
        ['key' => 'name', 'label' => 'Name', 'class' => 'w-72 text-primary'],
        ['key' => 'document', 'label' => 'Documento', 'class' => 'w-64 text-primary'],
        ['key' => 'city', 'label' => 'Cidade', 'class' => 'w-64 text-primary'],
        ['key' => 'groups_name', 'label' => 'Grupos', 'class' => 'w-64 text-primary'],
        ['key' => 'deactivation_date', 'label' => 'Data desativação', 'class' => 'w-64 text-primary'],
    ];

    public function updated($property): void
    {
        if (! is_array($property) && $property != '') {
            $this->resetPage();
        }
    }

    public function clear(): void
    {
        $this->reset();
        $this->resetPage();
        $this->success('Filters cleared.', position: 'toast-bottom');
    }

    public function delete(Person $person): void
    {
        $person->delete();
        $this->warning('Pessoa deletada com sucesso');
    }

    #[Computed()]
    public function rows()
    {
        return Person::query()
            ->withAggregate('groups', 'name')
            ->orderBy(...array_values($this->sortBy))
            ->when($this->search, function (Builder $query) {
                return $query->where('name', 'like', '%'.$this->search.'%');
            })
            // ->select(['id', 'name'])
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.person.index');
    }
}
