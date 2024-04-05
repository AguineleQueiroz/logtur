<div>
    <section class="p-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900"> Listas de Passageiros </h2>
        </header>

        {{--<div>
            <form wire:submit.prevent="saveNewList">
                <div class="flex mt-6 border-t pt-3 space-y-6 space-x-3">
                    <div class="w-[75%]">
                        <x-input-label for="user_id"/>
                        <x-text-input wire:model="form.user_id" id="user_id" name="user_id" type="hidden" class="mt-1 block w-full"/>

                        <x-input-label for="name" :value="__('Nome da lista')"/>
                        <x-text-input wire:model="form.name" id="name" name="name" type="text" maxlength="45" class="mt-1 block w-full input_name"
                                      placeholder="{{ __('Ex: lista passageiros recife 20240102') }}"/>
                    </div>

                    <div class="w-[25%]">
                        <x-generic-button type="submit" class="border border-gray-400 bg-gray-50 hover:bg-gray-300 hover:border-gray-400 w-full h-full">
                            <span class="text-center w-full"> Nova Lista</span>
                        </x-generic-button>
                    </div>
                </div>
                <x-input-error :messages="$errors->get('form.name')" class="mt-2" />
            </form>
        </div>--}}
        <div>
            <livewire:passenger.send-data-to-passenger-list/>
        </div>
    </section>
    @livewire('wire-elements-modal')
</div>
