<?php

namespace App\Livewire\ProductType;

use App\Models\ProductType;
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

    public array $sortBy = ['column' => 'name', 'direction' => 'asc'];

    public array $headers = [
        ['key' => 'id', 'label' => '#', 'class' => 'w-1 text-primary'],
        ['key' => 'name', 'label' => 'Name', 'class' => 'w-64 text-primary'],
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

    public function delete(ProductType $productType): void
    {
        $productType->delete();
        $this->warning('Tipo de produto deletado com sucesso');
    }

    #[Computed()]
    public function rows()
    {
        return ProductType::query()
            ->orderBy(...array_values($this->sortBy))
            ->when($this->search, function (Builder $query) {
                return $query->where('name', 'like', '%'.$this->search.'%');
            })
            ->select(['id', 'name'])
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.product-type.index');
    }
}
