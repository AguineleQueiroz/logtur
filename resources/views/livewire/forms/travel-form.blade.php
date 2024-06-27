@props(['action'])
<div>
    <form wire:submit.prevent="save" class="p-6">
        <header class="mb-2">
            <h2 class="text-lg font-medium text-gray-900">Cadastrar Pacote</h2>
        </header>

        <div class="flex flex-col border-t border-dashed">

            {{-- image and information package --}}
            <div class="flex my-3 space-x-4">
                <div class="w-96">
                    <div class="mt-2 flex justify-center border border-dashed border-gray-900/25 p-4"
                         style="background-image: url('{{ is_object($form->photo) ? $form->photo->temporaryUrl() : $form->photo  }}');
                         background-size:cover;
                         background-position: center"
                    >

                        <div class="text-center">
                            @if(!$form->photo)
                                <svg class="mx-auto h-10 w-10 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25
                                          2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021
                                          18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5
                                          1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                          clip-rule="evenodd" />
                                </svg>
                            @endif
                            @if(!$form->photo)
                                <div class="mt-2 flex-col text-sm leading-6 text-gray-600">
                                    <label  for="photo" class="relative cursor-pointer bg-white font-semibold
                                            text-indigo-600 focus-within:outline-none  hover:text-indigo-500">
                                        <span>
                                            Enviar imagem
                                        </span>
                                        <input wire:model="form.photo" id="photo" name="photo" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">ou arrastar para cá</p>
                                </div>
                                <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                            @else
                                <div class="h-10 w-10"></div>
                                <div class="mt-2 flex-col text-sm leading-6 text-gray-600">
                                    <label  for="photo"
                                            class="relative cursor-pointer  font-semibold
                                            text-indigo-600 focus-within:outline-none  hover:text-indigo-500">
                                        <span class="text-white font-medium">
                                            Enviar imagem
                                        </span>
                                        <input wire:model="form.photo" id="photo" name="photo" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1 text-white">ou arrastar para cá</p>
                                </div>
                                <p class="text-xs leading-5 text-white">PNG, JPG, GIF up to 10MB</p>
                            @endif
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('form.photo')" class="mt-2" />
                </div>

                <div class="flex-col space-y-2 w-full">
                    <div class="w-full">
                        <x-input-label for="name" :value="__('Nome')"/>
                        <x-text-input wire:model="form.name" id="name" name="name" type="text" class="mt-1 block w-full"
                                      placeholder="{{ __('Nome') }}"/>
                        <x-input-error :messages="$errors->get('form.name')" class="mt-2" />
                    </div>
                    <div class="w-full">
                        <x-input-label for="description" :value="__('Description')"/>
                        <x-text-input wire:model="form.description" id="description" name="description" type="text"
                                      class="mt-1 block w-full" placeholder="{{ __('Descrição') }}"/>
                        <x-input-error :messages="$errors->get('form.description')" class="mt-2" />
                    </div>
                </div>
            </div>

            {{-- payment methods and period --}}
            <div class="flex my-3 border-t border-dashed pt-3 space-x-4">

                <div class="flex-col space-y-2 w-full">
                    <h4 class="text-lg font-medium text-gray-900"> Método de pagamento </h4>
                    <div class="flex-col space-y-6">
                        <div>
                            <x-input-label for="payment_method1" :value="__('Método 1')"/>
                            <x-text-input wire:model="form.payment_method1" id="payment_method1" name="payment_method1"
                                          type="text" class="mt-1 block w-full" placeholder="{{ __('ex: 10 x de 999.99 de Jan a Dez') }}"/>
                        </div>
                        <div>
                            <x-input-label for="payment_method2" :value="__('Método 2')"/>
                            <x-text-input wire:model="form.payment_method2" id="payment_method2" name="payment_method2"
                                          type="text" class="mt-1 block w-full" placeholder="{{ __('ex: 10 x de 999.99 de Jan a Dez') }}"/>
                        </div>
                    </div>
                </div>

                <div class="flex-col space-y-2 w-48">
                    <h4 class="text-lg font-medium text-gray-900"> Período </h4>
                    <div class="flex-col space-y-6">
                        <div>
                            <x-input-label for="departure" :value="__('Saída')"/>
                            <x-text-input wire:model="form.departure" id="departure" name="departure" type="date" class="mt-1 block w-full"
                                          placeholder="{{ __('Saída') }}"/>
                        </div>
                        <div>
                            <x-input-label for="arrival" :value="__('Chegada')"/>
                            <x-text-input wire:model="form.arrival" id="arrival" name="arrival" type="date" class="mt-1 block w-full"
                                          placeholder="{{ __('Chegada') }}"/>
                        </div>
                    </div>
                </div>
            </div>
            <x-input-error :messages="$errors->get('form.payment_method1')" class="mt-2" />
            <x-input-error :messages="$errors->get('form.payment_method2')" class="mt-2" />
            <x-input-error :messages="$errors->get('form.departure')" class="mt-2" />
            <x-input-error :messages="$errors->get('form.arrival')" class="mt-2" />

        </div>

        <div class="mt-2 flex justify-end border-t pt-4 space-x-4 min-w-max">
            <x-secondary-button wire:click="$dispatch('closeModal')">
                Fechar
            </x-secondary-button>
            <x-primary-button class="ms-3">
                Salvar
            </x-primary-button>
        </div>

    </form>
</div>

