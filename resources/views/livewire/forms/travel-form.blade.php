@props(['action'])
<div>
    <form wire:submit.prevent="save" class="p-6">
        <header class="mb-2">
            <h2 class="text-lg font-medium text-gray-900">Cadastrar Pacote</h2>
        </header>

        <div class="flex flex-col border-t border-dashed space-y-4">

            {{-- image and information package --}}
            <div class="flex my-3 space-x-4">
                <div class="flex space-x-2 w-full">
                    <div class="w-full">
                        <x-input-label for="destiny" :value="__('Destino')"/>
                        <x-text-input wire:model="form.destiny" id="destiny" name="destiny" type="text" class="mt-1 block w-full"
                                      placeholder="{{ __('Destino') }}"/>
                        <x-input-error :messages="$errors->get('form.destiny')" class="mt-2" />
                    </div>
                    <div class="w-full">
                        <x-input-label for="departure" :value="__('Saída')"/>
                        <x-text-input wire:model="form.departure" id="departure" name="departure" type="date" class="mt-1 block w-full"
                                      placeholder="{{ __('Saída') }}"/>
                        <x-input-error :messages="$errors->get('form.departure')" class="mt-2" />
                    </div>
                    <div class="w-full">
                        <x-input-label for="arrival" :value="__('Chegada')"/>
                        <x-text-input wire:model="form.arrival" id="arrival" name="arrival" type="date" class="mt-1 block w-full"
                                      placeholder="{{ __('Chegada') }}"/>
                        <x-input-error :messages="$errors->get('form.arrival')" class="mt-2" />
                    </div>
                </div>
            </div>
            <div class="flex space-x-2">
                <div class="w-[40%]">
                    <x-input-label for="available_vacancies" :value="__('Vagas Disponíveis')"/>
                    <x-text-input wire:model="form.available_vacancies" id="available_vacancies" name="available_vacancies"
                                  type="number" min="1" class="mt-1 block w-full" placeholder="{{ __('0') }}"/>
                </div>
                <div class="w-[40%]">
                    <x-input-label for="occupied_vacancies" :value="__('Vagas Ocupadas')"/>
                    <x-text-input wire:model="form.occupied_vacancies" id="occupied_vacancies" name="occupied_vacancies"
                                  type="number" min="0" class="mt-1 block w-full" placeholder="{{ __('0') }}"/>
                </div>
                <div class="w-full">
                    <x-input-label for="status" :value="__('Status')" />
                    <select name="status" wire:model="form.status"
                            class="block w-full p-2 text-base text-gray-900 border border-gray-300
                                    bg-gray-50 focus:ring-blue-500 focus:border-blue-500 mt-1"
                            id="grid-state">
                        {{--default value--}}
                        <option value="" disabled selected>Selecionar status</option>
                        <option value="pending">Pendente</option>
                        <option value="in progress">Em Andamento</option>
                        <option value="accomplished">Realizada</option>
                    </select>
                </div>
            </div>
            <div class="w-[25%]">
                <x-input-label for="price" :value="__('Valor do Pacote')" />
                <x-text-input wire:model="form.price" id="price" name="price"
                              type="number" min="0.00" step="0.01" class="mt-1 block w-full" placeholder="{{ __('0.00') }}"/>
            </div>
        </div>

        <div class="mt-5 flex justify-end border-t pt-4 space-x-4 min-w-max">
            <x-secondary-button wire:click="$dispatch('closeModal')">
                Fechar
            </x-secondary-button>
            <x-primary-button class="ms-3">
                Salvar
            </x-primary-button>
        </div>

    </form>
</div>

