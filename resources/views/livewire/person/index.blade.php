<div>
    <x-header title="Pessoas" separator progress-indicator>
        <x-slot:middle class="!justify-end">
            <x-input placeholder="Search..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass" />
        </x-slot:middle>
        <x-slot:actions>
            <x-button label="Filters" @click="$wire.drawer = true" responsive icon="o-funnel" />
            <x-button label="Adicionar" class="btn-primary" link="{{ route('admin.persons.create') }}"
                icon="o-plus-circle" />
        </x-slot:actions>
    </x-header>

    <x-card>
        <x-table :headers="$headers" :rows="$this->rows" :sort-by="$sortBy" with-pagination per-page="perPage"
            :per-page-values="[10, 50, 100]">
            @scope('actions', $person)
                <div class="flex gap-3">
                    <x-button icon="o-pencil-square" link="{{ route('admin.persons.edit', $person['id']) }}" spinner
                        class="text-yellow-500 btn-ghost btn-sm" />
                    <x-button icon="o-trash" wire:click="delete({{ $person['id'] }})" wire:confirm="Are you sure?" spinner
                        class="text-red-500 btn-ghost btn-sm" />
                </div>
            @endscope
        </x-table>
    </x-card>
</div>
