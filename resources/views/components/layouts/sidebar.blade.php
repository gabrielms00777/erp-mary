<x-slot:sidebar drawer="main-drawer" collapsible class="bg-gray-700 lg:bg-inherit">

    {{-- BRAND --}}
    <x-app-brand class="p-5 pt-3" />

    {{-- MENU --}}
    <x-menu activate-by-route>

        {{-- User --}}
        @if ($user = auth()->user())
            <x-menu-separator />

            <x-list-item :item="$user" value="name" sub-value="email" no-separator no-hover
                class="-mx-2 !-my-2 rounded">
                <x-slot:actions>
                    <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff" no-wire-navigate
                        link="/logout" />
                </x-slot:actions>
            </x-list-item>

            <x-menu-separator />
        @endif

        <x-menu-item title="Hello" icon="o-sparkles" link="/" />
        <x-menu-sub title="Estoque" icon="o-cog-6-tooth">
            <x-menu-item title="Produtos" icon="o-wifi" link="{{ route('admin.product.index') }}" />
        </x-menu-sub>
        <x-menu-sub title="Cadastros Gerais" icon="o-cog-6-tooth">
            <x-menu-item title="Pessoas" icon="o-wifi" link="{{ route('admin.persons.index') }}" />
            <x-menu-item title="Grupos" icon="o-wifi" link="{{ route('admin.groups.index') }}" />
            <x-menu-item title="Tipos de Produtos" icon="o-wifi" link="{{ route('admin.product_types.index') }}" />
        </x-menu-sub>
        <x-menu-sub title="Settings" icon="o-cog-6-tooth">
            <x-menu-item title="Wifi" icon="o-wifi" link="####" />
            <x-menu-item title="Archives" icon="o-archive-box" link="####" />
        </x-menu-sub>
    </x-menu>
</x-slot:sidebar>
