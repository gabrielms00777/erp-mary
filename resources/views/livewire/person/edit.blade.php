<div>
    <x-slot name="style">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    </x-slot>

    <x-header title="Pessoas / Editar" size="text-3xl" separator progress-indicator>
        <x-slot:actions>
            <x-button label="Voltar" link="{{ url()->previous() }}" class="btn-primary" responsive
                icon="o-arrow-long-left" />
        </x-slot:actions>
    </x-header>

    <x-form wire:submit="save">
        <x-card title="Informações gerais">
            <div class="flex gap-3">
                <x-datepicker label="Data de ativação*" wire:model="form.activation_date" icon="o-calendar" />
                <x-select label="Usuario do sistema" :options="$grouped" wire:model="form.user_type" />
                <x-datepicker label="Data de desativação" wire:model="form.deactivation_date" icon="o-calendar" />
            </div>
            <div class="flex flex-col gap-3 mt-4">
                <span class="text-lg font-bold">Grupos:</span>
                <div class="grid grid-cols-4 gap-4">
                    @foreach ($groups as $group)
                        <label class="flex items-center gap-2">
                            <input type="checkbox" value="{{ $group->id }}" wire:model="form.groups"
                                class="checkbox checkbox-primary" />
                            <span class="label-text">{{ $group->name }}</span>
                        </label>
                    @endforeach
                    <div>
                        @error('form.groups')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </x-card>

        <hr class="my-5" />

        <x-card title="Dados Pessoais">
            <div class="grid grid-cols-2 gap-3">
                <x-input label="Nome*" wire:model="form.name" />
                <x-input label="Documento*" wire:model="form.document" />
                <x-input label="Telefone" wire:model="form.phone" />
                <x-input label="Email" wire:model="form.email" />
                <div class="col-span-2">
                    <x-textarea label="Observação" wire:model="form.observation" />
                </div>
            </div>
        </x-card>

        <hr class="my-5" />

        <x-card title="Localização">
            <div class="grid grid-cols-2 gap-3">
                <x-input label="Estado*" wire:model="form.state" />
                <x-input label="Cidade*" wire:model="form.city" />
                <x-input label="Bairro" wire:model="form.neighborhood" />
                <x-input label="Rua" wire:model="form.street" />
                <x-input label="Numero" wire:model="form.number" />
                <x-input label="Complemento" wire:model="form.complement" />
                <x-input label="CEP" wire:model="form.zipcode" />
            </div>
        </x-card>

        <hr class="my-5" />

        <!-- Seção de Contatos com Tabela -->
        <x-card title="Contato">
            <div class="grid grid-cols-2 gap-3">
                <x-input label="Email*" wire:model="newContact.email" />
                <x-input label="Nome*" wire:model="newContact.name" />
                <x-input label="Telefone" wire:model="newContact.phone" />
                <x-input label="Observação" wire:model="newContact.observation" />
            </div>

            <!-- Botão para adicionar contato -->
            <div class="flex justify-end mt-4">
                <x-button label="Adicionar Contato" class="btn-primary" wire:click="addContact" spinner="addContact" />
            </div>

            <!-- Tabela de Contatos -->
            <div class="mt-4">
                <h3 class="mb-3 text-lg font-bold">Contatos Cadastrados:</h3>
                <table class="w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Nome</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Telefone</th>
                            <th class="px-4 py-2">Observação</th>
                            <th class="px-4 py-2">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $index => $contact)
                            <tr>
                                <td class="px-4 py-2 border">{{ $contact['name'] }}</td>
                                <td class="px-4 py-2 border">{{ $contact['email'] }}</td>
                                <td class="px-4 py-2 border">{{ $contact['phone'] }}</td>
                                <td class="px-4 py-2 border">{{ $contact['observation'] }}</td>
                                <td class="px-4 py-2 border">
                                    <x-button wire:confirm="Tem certeza que quer deletar este contato?"
                                        wire:click="removeContact({{ $contact['id'] }}, {{ $index }})"
                                        spinner="removeContact" {{-- wire:click="removeContact({{ $index }})" spinner="removeContact" --}}
                                        class="btn-error btn-sm ">Remover</x-button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-card>

        <x-slot:actions>
            <x-button label="Salvar" class="btn-primary" type="submit" spinner="save" />
        </x-slot:actions>
    </x-form>


</div>
