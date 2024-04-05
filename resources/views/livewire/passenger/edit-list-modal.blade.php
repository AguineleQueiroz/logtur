<div>
    <section wire:submit.prevent="save" class="p-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900"> Atualizar </h2>
        </header>
        <div class="mt-4">
            <div>
                <div class="w-full">
                    <x-input-label for="user_id"/>
                    <x-text-input wire:model="form.user_id" id="user_id" name="user_id" type="hidden" class="mt-1 block w-full"/>

                    <x-input-label for="name" :value="__('Nome da lista')"/>
                    <x-text-input wire:model="form.name" id="name" name="name" type="text" maxlength="45" class="mt-1 block w-full"/>
                    <x-input-error :messages="$errors->get('form.name')" class="mt-1" />
                </div>
            </div>
            <div class="mt-6 flex justify-end border-t pt-4">
                <x-secondary-button wire:click="$dispatch('closeModal')">
                    Cancelar
                </x-secondary-button>

                <x-primary-button class="ms-3">
                    Salvar Alteraçoes
                </x-primary-button>
            </div>
        </div>
    </section>
    @livewire('wire-elements-modal')
</div>

