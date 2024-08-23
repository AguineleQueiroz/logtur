<div class="mt-6 pt-3 space-y-6">
    @if(count($lists) > 0)
        <div>
            <div class="relative">
                <x-input-label for="list_id" :value="__('Atribuir clientes a lista:')" />
                <select name="list_id" wire:model.live="list_id"
                        class="block w-full px-4 py-2 text-base text-gray-900 border border-gray-300
                                    bg-gray-50 focus:ring-blue-500 focus:border-blue-500 mt-1"
                        id="grid-state">
                    {{--default value--}}
                    <option value="" disabled>
                        Selecionar lista
                    </option>
                    {{--dynamic options--}}
                    @foreach($lists as $list)
                        <option value="{{$list->id}}">
                            {{ ucwords(str_replace('_',' ', $list->name)) }} -
                            {{ Helper::getMonthAndYear($list->created_at)}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mt-6 flex justify-end border-t pt-4 space-x-3">
                <x-secondary-button wire:click="$dispatch('closeModal')">
                    Cancelar
                </x-secondary-button>

                <x-primary-button class="ms-3" wire:click="save">
                    Adicionar à lista
                </x-primary-button>
            </div>
            @livewire('wire-elements-modal')
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
                <p class="text-gray-500 mt-5">Nenhuma lista para mostrar...</p>
            </div>
        </div>
        <div class="mt-6 flex justify-end border-t pt-4 space-x-3">
            <x-secondary-button wire:click="$dispatch('closeModal')">
                Cancelar
            </x-secondary-button>
        </div>
        @livewire('wire-elements-modal')
    @endif
</div>

