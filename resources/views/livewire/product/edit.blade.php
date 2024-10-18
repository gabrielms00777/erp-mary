<div>
    {{-- <x-slot name="style">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    </x-slot> --}}

    <x-header title="Produto / Editar" size="text-3xl" separator progress-indicator>
        <x-slot:actions>
            <x-button label="Voltar" link="{{ url()->previous() }}" class="btn-primary" responsive
                icon="o-arrow-long-left" />
        </x-slot:actions>
    </x-header>

    <x-form wire:submit="save">
        <x-card title="Informações gerais">
            <div class="grid grid-cols-2 gap-3">
                <x-input label="Nome*" wire:model="form.name" />
                <x-input label="Código de barras" wire:model="form.barcode" />
                <x-choices-offline label="Tipo de produto*" wire:model="form.product_type_id" :options="$productTypes"
                    placeholder="Buscar ..." single searchable />
                <x-choices-offline label="Fornecedor*" wire:model="form.supplier_id" :options="$supplier"
                    placeholder="Buscar ..." single searchable />
            </div>
        </x-card>

        <hr class="my-5" />

        <x-card title="Preços e pesos">
            <div class="grid grid-cols-2 gap-3">
                <div class="grid grid-cols-2 col-span-2">
                    <x-choices-offline label="Unidade de medida*" wire:model="form.unit_id" :options="$unit"
                        placeholder="Buscar ..." single searchable />
                </div>
                <x-input label="Peso líquido:" wire:model="form.net_weight" />
                <x-input label="Peso bruto:" wire:model="form.gross_weight" />
                <x-input label="Preço de custo:" wire:model="form.cost_price" />
                <x-input label="Preço de venda:" wire:model="form.sale_price" />
            </div>
        </x-card>

        <hr class="my-5" />

        <x-card title="Informações do estoque">
            <div class="grid grid-cols-2 gap-3">
                <x-input label="Estoque mínimo:" wire:model="form.min_stock" />
                <x-input label="Estoque máximo:" wire:model="form.max_stock" />
                <x-input label="Estoque atual:" wire:model="form.current_stock" />
                <x-input label="Observação:" wire:model="form.observation" />
            </div>
        </x-card>

        <x-slot:actions>
            <x-button label="Salvar" class="btn-primary" type="submit" spinner="save" />
        </x-slot:actions>
    </x-form>



</div>
