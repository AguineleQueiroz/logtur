@php $status = ['pending' => 'Pendente', 'in progress' => 'Em Andamento', 'accomplished' => 'Concluída'] @endphp
<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm">
                <div class="text-gray-900">
                    <section class="mt-2">
                        <div class="mx-auto max-w-screen-xl">
                            <div class="bg-white relative shadow-md">
                                <div class="flex-col space-y-6 lg:flex lg:space-x-4 lg:flex-row items-center justify-between p-4">
                                    {{--text header--}}
                                    <div class="flex">
                                        <div class="relative">
                                            <header class="space-y-2">
                                                <h2 class="text-lg font-medium text-gray-900"> Pacotes de Viagem Cadastrados</h2>
                                                <p class="text-md text-gray-500">Crie, edite, gerencie todos os seus pacotes em um único
                                                    lugar.</p>
                                            </header>
                                        </div>
                                    </div>
                                    <div class="flex space-x-3 ms-auto">
                                        {{--Add to passengers list--}}
                                        <x-secondary-button
                                            disabled
                                            class="inline-flex items-center space-x-2 border py-3"
                                            wire:click="$dispatch('openModal',
                                            {  component: 'travel.attach-passengers-list-modal' })">

                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                 stroke="#2563eb" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5
                                4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244"/>
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

                                <div class="pt-4 border-t border-dashed">
                                    <div class="overflow-auto">
                                        <table class="w-full text-sm text-left text-gray-500 overflow-x-hidden">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-4 py-3">Destino</th>
                                                <th scope="col" class="px-4 py-3">Saída</th>
                                                <th scope="col" class="px-4 py-3">Chegada</th>
                                                <th scope="col" class="px-4 py-3">Número de Vagas</th>
                                                <th scope="col" class="px-4 py-3">Vagas Disponíveis</th>
                                                <th scope="col" class="px-4 py-3">Status</th>
                                                <th scope="col" class="px-4 py-3">
                                                    <span class="sr-only">Actions</span>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($travels as $travel)
                                                <tr wire:key="'{{$travel->id}}'" class="border-b border-gray-300">
                                                    <td class="px-4 py-3 whitespace-nowrap">{{$travel->destiny}}</td>
                                                    <td class="px-4 py-3">{{ Helper::convertDate($travel->departure) }}</td>
                                                    <td class="px-4 py-3 ">{{ Helper::convertDate($travel->arrival) }}</td>
                                                    <td class="px-4 py-3 ">{{$travel->available_vacancies}}</td>
                                                    <td class="px-4 py-3 ">{{$travel->occupied_vacancies}}</td>
                                                    <td class="px-4 py-3 whitespace-nowrap">{!! $status[$travel->status] !!}</td>
                                                    <td class="px-4 py-3 flex items-center justify-end">
                                                        <x-dropdown-options align="right" width="80">
                                                            <x-slot name="trigger">
                                                                <div class="inline-flex items-center p-2 border border-transparent
                                                                            text-sm leading-4 font-medium text-gray-500
                                                                            bg-white hover:text-gray-700 focus:outline-none
                                                                            transition ease-in-out duration-150">
                                                                    <div>
                                                                        <x-tabler-grip-vertical class="cursor-pointer"/>
                                                                    </div>
                                                                </div>
                                                            </x-slot>
                                                            <x-slot name="content">
                                                                <div class="flex items-center px-1">
                                                                    {{--Edit client--}}
                                                                    <x-dropdown-button
                                                                        wire:click="$dispatch( 'openModal', {
                                                                        component: 'travel.travel-modal',
                                                                        arguments: { 'travel_id': '{{$travel->id}}' } })"
                                                                    >
                                                                        Editar
                                                                    </x-dropdown-button>

                                                                    {{--Delete client--}}
                                                                    <x-dropdown-button
                                                                        class="border-r"
                                                                        wire:click="$dispatch('openModal', {
                                                                        component: 'travel.confirm.travel-confirm-deletion',
                                                                        arguments: { travel_id: '{{$travel->id}}' } })"
                                                                    >
                                                                        Deletar
                                                                    </x-dropdown-button>
                                                                    {{--payments--}}
                                                                    @if(Helper::countPassengersInPackage($travel->passengers_list_id))
                                                                        <x-dropdown-button class="border-r">
                                                                            <a wire:navigate href="{{route( 'payment_details', ['travel' => $travel->id] )}}">Pagamentos</a>
                                                                        </x-dropdown-button>
                                                                    @endif
                                                                </div>
                                                            </x-slot>
                                                        </x-dropdown-options>
                                                    </td>
                                                </tr>
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
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <div class="flex">
                                        <div class="flex items-center mb-3 gap-2 lg:gap-0">
                                            <label class="w-20 text-sm font-medium text-gray-900 order-1 lg:order-0">Por
                                                Pagina</label>
                                            <select
                                                wire:model.live="perPage"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                                                        focus:ring-blue-500 focus:border-blue-500 block w-20 p-2.5 order-0
                                                        lg:order-1">
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{ $travels->links() }}
                                </div>
                            </div>
                        </div>
                        @livewire('wire-elements-modal')
                    </section>
                </div>
            </div>
        </div>
    </div>

</div>
