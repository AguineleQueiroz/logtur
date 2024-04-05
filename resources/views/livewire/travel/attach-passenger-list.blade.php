<div>
    <div class="py-3">
        @if(count($lists) and count($packages))
            <div class="flex-col space-y-3">
                <div class="w-full">
                    <x-input-label for="list_selected" :value="__('Listas:')" />
                    <select name="list_selected" wire:model.live="list_selected"
                            class="block w-full px-4 py-2 text-base text-gray-900 border border-gray-300 rounded-lg
                                            bg-gray-50 focus:ring-blue-500 focus:border-blue-500 mt-1"
                            id="grid-state">
                        {{--default value--}}
                        <option value="" disabled>Selecionar a lista</option>
                        {{--dynamic options--}}
                        @foreach($lists as $list)
                            <option value="{{$list->id}}">{{$list->name}}</option>
                        @endforeach
                    </select>
                </div>
                {{--arrow up down--}}
                <div class="flex justify-center w-full py-2 m-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#a1a1aa"
                         class="w-6 h-6" style="transform: rotate(135deg);">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                    </svg>

                </div>
                <div class="w-full" style="margin: 0">
                    <x-input-label for="travel_selected" :value="__('Pacotes:')" />
                    <select name="travel_selected" wire:model.live="travel_selected"
                            class="block w-full px-4 py-2 text-base text-gray-900 border border-gray-300 rounded-lg
                                            bg-gray-50 focus:ring-blue-500 focus:border-blue-500 mt-1"
                            id="grid-state">
                        {{--default value--}}
                        <option value="" disabled>Selecionar o pacote</option>
                        {{--dynamic options--}}
                        @foreach($packages as $package)
                            <option value="{{$package->id}}">{{$package->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mt-6 flex justify-end border-t pt-4 space-x-3">
                <x-secondary-button wire:click="$dispatch('closeModal')">
                    Cancelar
                </x-secondary-button>

                <x-primary-button class="ms-3" wire:click="save">
                    Salvar
                </x-primary-button>
            </div>
        @else
            <div class="relative">
                <div class="w-full flex flex-col items-center py-5">
                    <div>
                        <svg width="100px" height="100px" viewBox="0 0 24 24"
                             fill="none" xmlns="http://www.w3.org/2000/svg">

                            <path d="M9 15C9.85038 15.6303 10.8846 16 12 16C13.1154 16 14.1496 15.6303 15 15"
                                  stroke="#4b5563" stroke-width=".1" stroke-linecap="round"
                            />
                            <ellipse cx="15" cy="9.5" rx="1.2" ry="1" fill="#9ca3af"/>
                            <ellipse cx="9" cy="9.5" rx="1.2" ry="1" fill="#9ca3af"/>
                            <path d="M22 19.723V12.3006C22 6.61173 17.5228 2 12 2C6.47715 2 2 6.61173 2 12.3006V19.723C2 21.0453
                                            3.35098 21.9054 4.4992 21.314C5.42726 20.836 6.5328 20.9069 7.39614 21.4998C8.36736 22.1667 9.63264
                                            22.1667 10.6039 21.4998L10.9565 21.2576C11.5884 20.8237 12.4116 20.8237 13.0435 21.2576L13.3961
                                            21.4998C14.3674 22.1667 15.6326 22.1667 16.6039 21.4998C17.4672 20.9069 18.5727 20.836 19.5008
                                            21.314C20.649 21.9054 22 21.0453 22 19.723Z"
                                  stroke="#1C274C" stroke-width=".02"
                            />
                        </svg>
                    </div>
                    <p class="text-gray-500 text-center text-sm mt-5">Nenhuma lista ou pacote para mostrar. Cadastre uma lista ou pacote e tente novamente.</p>
                </div>
            </div>
            <div class="mt-6 flex justify-end border-t pt-4 space-x-3">
                <x-secondary-button wire:click="$dispatch('closeModal')">
                    Voltar mais tarde
                </x-secondary-button>
            </div>
            @livewire('wire-elements-modal')
        @endif
    </div>
</div>
