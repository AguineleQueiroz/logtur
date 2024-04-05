<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-2 text-gray-900">
                <div class="flex-col space-y-6 lg:flex lg:space-x-4 lg:flex-row items-center justify-between p-4">
                    {{--text header--}}
                    <div class="flex">
                        <div class="relative">
                            <header class="space-y-2">
                                <h2 class="text-lg font-medium text-gray-900"> Pacotes de Viagem Cadastrados</h2>
                                <p class="text-md text-gray-500">Crie, edite, gerencie todos os seus pacotes em um único lugar.</p>
                            </header>
                        </div>
                    </div>
                    <div class="flex space-x-3 ms-auto">
                        {{--Add to passengers list--}}
                        <x-secondary-button
                            disabled
                            class="inline-flex items-center space-x-2 rounded-l-md border"
                            wire:click="$dispatch('openModal',
                                            {  component: 'travel.attach-passengers-list-modal' })">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="#2563eb" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5
                                4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                            </svg>

                            <span>Anexar Lista</span>

                        </x-secondary-button>
                        {{--create modal--}}
                        <x-primary-button
                            wire:click="$dispatch('openModal', { component: 'travel.travel-modal'})"
                            class="bg-blue-600 whitespace-nowrap"
                        >
                            Novo Pacote
                        </x-primary-button>
                    </div>
                </div>

                <div class="p-4 border-t border-dashed">
                    @forelse($travels as $travel)
                        <x-travel-card  wire:key="{{$travel->id}}" :travel="$travel"/>
                    @empty
                        <table class="w-full text-sm text-left text-gray-500">
                            <tr class="w-full flex flex-col items-center py-5">
                                    <td class="w-full flex flex-col items-center">
                                        <div class="w-full flex flex-col items-center py-5">
                                            <div>
                                                <svg width="200px" height="200px" viewBox="0 0 24 24"
                                                     fill="none" xmlns="http://www.w3.org/2000/svg">

                                                    <path d="M9 15C9.85038 15.6303 10.8846 16 12
                                                                            16C13.1154 16 14.1496 15.6303 15 15"
                                                          stroke="#4b5563" stroke-width=".1"
                                                          stroke-linecap="round"/>
                                                    <ellipse cx="15" cy="9.5" rx="1.2" ry="1" fill="#9ca3af"/>
                                                    <ellipse cx="9" cy="9.5" rx="1.2" ry="1" fill="#9ca3af"/>
                                                    <path d="M22 19.723V12.3006C22 6.61173 17.5228 2 12
                                                                    2C6.47715 2 2 6.61173 2 12.3006V19.723C2 21.0453
                                                                    3.35098 21.9054 4.4992 21.314C5.42726 20.836 6.5328
                                                                    20.9069 7.39614 21.4998C8.36736 22.1667 9.63264
                                                                    22.1667 10.6039 21.4998L10.9565 21.2576C11.5884
                                                                    20.8237 12.4116 20.8237 13.0435 21.2576L13.3961
                                                                    21.4998C14.3674 22.1667 15.6326 22.1667 16.6039
                                                                    21.4998C17.4672 20.9069 18.5727 20.836 19.5008
                                                                    21.314C20.649 21.9054 22 21.0453 22 19.723Z"
                                                          stroke="#1C274C" stroke-width=".02"/>
                                                </svg>
                                            </div>
                                            <p class="text-gray-500 mt-5">Nenhum pacote para mostrar...</p>
                                        </div>
                                    </td>
                                </tr>
                        </table>
                    @endforelse
                </div>
                @livewire('wire-elements-modal')
            </div>
        </div>
    </div>
</div>
