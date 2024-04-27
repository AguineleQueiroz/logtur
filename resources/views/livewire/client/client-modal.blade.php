<div class="p-6">
    <section wire:submit.prevent="save" class="p-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900">Cadastrar Cliente</h2>
        </header>
        <div class="mt-6 border-t pt-3 space-y-6">
            <div class="flex gap-4">
                <div class="w-[75%]">
                    <x-input-label for="name" :value="__('Nome')"/>
                    <x-text-input wire:model="form.name" id="name" name="name" type="text" class="mt-1 block w-full"
                                  placeholder="{{ __('Nome') }}"/>
                    <x-input-error :messages="$errors->get('form.name')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="age" :value="__('Idade')"/>
                    <x-text-input wire:model="form.age" id="age" name="age" type="number" class="mt-1 block w-full"
                                  placeholder="{{ __('Idade') }}"/>
                    <x-input-error :messages="$errors->get('form.age')" class="mt-2" />
                </div>
            </div>
            <div class="w-full">
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input wire:model="form.email" id="email" name="email" type="text" class="mt-1 block w-full"
                              placeholder="{{ __('Email') }}"/>
                <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
            </div>
            <div class="flex gap-4">
                <div class="w-full">
                    <x-input-label for="identity" :value="__('Identidade')"/>
                    <x-text-input wire:model="form.identity" id="identity" name="identity" type="text" class="mt-1 block w-full"
                                  placeholder="{{ __('identity') }}"/>
                    <x-input-error :messages="$errors->get('form.identity')" class="mt-2" />
                </div>
                <div class="w-full">
                    <x-input-label for="city" :value="__('Cidade')"/>
                    <x-text-input wire:model="form.city" id="city" name="city" type="text" class="mt-1 block w-full"
                                  placeholder="{{ __('Cidade') }}"/>
                    <x-input-error :messages="$errors->get('form.city')" class="mt-2" />
                </div>
            </div>

            <div class="flex gap-4">

                <div class="w-[75%]">
                    <x-input-label for="address" :value="__('Endereço')"/>
                    <x-text-input wire:model="form.address" id="address" name="address" type="text" class="mt-1 block w-full"
                                  placeholder="{{ __('Endereço') }}"/>
                    <x-input-error :messages="$errors->get('form.address')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="phone" :value="__('Telefone')"/>
                    <x-text-input wire:model="form.phone" id="phone" name="phone" type="text" class="mt-1 block w-full"
                                  placeholder="{{ __('Telefone') }}"/>
                    <x-input-error :messages="$errors->get('form.phone')" class="mt-2" />
                </div>
            </div>

        </div>

        <div class="mt-6 flex justify-end border-t pt-4">
            <x-secondary-button wire:click="$dispatch('closeModal')">
                Cancelar
            </x-secondary-button>

            <x-primary-button wire:navigate class="ms-3">
                Salvar
            </x-primary-button>
        </div>
    </section>
    @livewire('wire-elements-modal')
</div>
