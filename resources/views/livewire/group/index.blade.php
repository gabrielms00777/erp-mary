<div>
    <!-- HEADER -->
    <x-header title="Grupos" separator progress-indicator>
        <x-slot:middle class="!justify-end">
            <x-input placeholder="Search..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass" />
        </x-slot:middle>
        <x-slot:actions>
            <x-button label="Filters" @click="$wire.drawer = true" responsive icon="o-funnel" />
            {{-- <x-button label="Adicionar" class="btn-primary" @click="$wire.modal = true" responsive icon="o-plus" /> --}}
            <x-button label="Adicionar" class="btn-primary" link="{{ route('admin.groups.create') }}"
                icon="o-plus-circle" />
        </x-slot:actions>
    </x-header>

    <!-- TABLE  -->
    <x-card>
        <x-table :headers="$headers" :rows="$this->rows" :sort-by="$sortBy" with-pagination per-page="perPage"
            :per-page-values="[10, 50, 100]">
            @scope('actions', $group)
                <x-button icon="o-pencil-square" link="{{ route('admin.groups.edit', $group['id']) }}" spinner
                    class="btn-ghost btn-sm text-yellow-500" />
                <x-button icon="o-trash" wire:click="delete({{ $group['id'] }})" wire:confirm="Are you sure?" spinner
                    class="btn-ghost btn-sm text-red-500" />
            @endscope
        </x-table>
    </x-card>

    <!-- FILTER DRAWER -->
    <x-drawer wire:model="drawer" title="Filters" right separator with-close-button class="lg:w-1/3">
        <x-input placeholder="Search..." wire:model.live.debounce="search" icon="o-magnifying-glass"
            @keydown.enter="$wire.drawer = false" />

        <x-slot:actions>
            <x-button label="Reset" icon="o-x-mark" wire:click="clear" spinner />
            <x-button label="Done" icon="o-check" class="btn-primary" @click="$wire.drawer = false" />
        </x-slot:actions>
    </x-drawer>

    <x-modal wire:model="modal" class="backdrop-blur" title="Adicionar grupo">
        <x-form wire:submit="save">
            <x-input label="Name" wire:model="name" />

            <x-slot:actions>
                <x-button label="Cancel" @click="$wire.modal = false" />
                <x-button label="Click me!" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>
        </x-form>
    </x-modal>
</div>
