<div>
    <x-header title="Tipo de produto / Editar" separator progress-indicator>
        <x-slot:actions>
            <x-button label="Voltar" link="{{ url()->previous() }}" class="btn-primary" responsive
                icon="o-arrow-long-left" />
        </x-slot:actions>
    </x-header>
    <x-card>
        <x-form wire:submit="save">
            <x-input label="Name" wire:model="form.name" />

            <x-slot:actions>
                <x-button label="Salvar" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>
        </x-form>
    </x-card>
</div>
