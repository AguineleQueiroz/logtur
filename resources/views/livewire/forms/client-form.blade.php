<div>
    <form wire:submit.prevent="save" class="p-6">
        <header>
	    @if(!($client_id === ''))
                <h2 class="text-lg font-medium text-gray-900">Editar Cliente</h2>
            @else
                <h2 class="text-lg font-medium text-gray-900">Cadastrar Cliente</h2>
            @endif
        </header>

        <div class="mt-6 border-t pt-3 space-y-2">
            <div class="flex gap-4">
                <div class="w-[80%]">
                    <x-input-label for="name" :value="__('Nome')"/>
                    <x-text-input wire:model="form.name" id="name" name="name" type="text" class="mt-1 block w-full"
                                  placeholder="{{ __('Nome') }}"/>
                    <x-input-error :messages="$errors->get('form.name')" class="mt-1" />
                    <x-input-error :messages="$errors->get('form.age')"/>
                </div>
                {{--<div class="w-[20%]">
                    <x-input-label for="age" :value="__('Idade')"/>
                    <x-text-input wire:model="form.age" id="age" name="age" type="text" class="mt-1 block w-full"
                                  placeholder="{{ __('Idade') }}"/>
                </div>--}}
                <div>
                    <x-input-label for="age" :value="__('Data de Nascimento')"/>
                    <x-text-input wire:model="form.age" id="departure" name="age" type="date" class="mt-1 block w-full"
                                  placeholder="{{ __('Data de Nascimento') }}"/>
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
                    <x-text-input x-mask="99.999.999" wire:model.debounce="form.identity" id="identity" name="identity" type="text" class="mt-1 block w-full"
                                  placeholder="{{ __('00.000.000') }}"/>
                    <x-input-error :messages="$errors->get('form.identity')" class="mt-1" />
                </div>
                <div class="w-full">
                    <x-input-label for="city" :value="__('Cidade')"/>
                    <x-text-input wire:model="form.city" id="city" name="city" type="text" class="mt-1 block w-full"
                                  placeholder="{{ __('Cidade') }}"/>
                    <x-input-error :messages="$errors->get('form.city')" class="mt-1" />
                </div>
            </div>

            <div class="flex gap-4">
                <div class="w-[75%]">
                    <x-input-label for="address" :value="__('Endereço')"/>
                    <x-text-input wire:model="form.address" id="address" name="address" type="text" class="mt-1 block w-full"
                                  placeholder="{{ __('Endereço') }}"/>
                    <x-input-error :messages="$errors->get('form.address')" class="mt-1" />
                </div>
                <div>
                    <x-input-label for="phone" :value="__('Telefone')"/>
                    <x-text-input x-mask="(99)99999-9999" wire:model.debounce="form.phone" id="phone" name="phone" type="text" class="mt-1 block w-full"
                                  placeholder="{{ __('(00)00000-0000') }}"/>
                    <x-input-error :messages="$errors->get('form.phone')" class="mt-1" />
                </div>
            </div>

        </div>

        <div class="mt-6 flex justify-end border-t pt-4">
            <x-secondary-button wire:click="$dispatch('closeModal')">
                Cancelar
            </x-secondary-button>

            <x-primary-button type="submit" class="ms-3">
                Salvar
            </x-primary-button>
        </div>
    </form>
</div>
