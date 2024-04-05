<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900">
                    <section class="mt-2">
                        <div class="mx-auto max-w-screen-xl">
                            <div class="bg-white relative shadow-md sm:rounded-lg">
                                <div class="flex flex-col lg:flex-row items-center justify-between p-6 lg:space-x-3 gap-4">
                                    <div class="flex order-1 lg:order-0">
                                        <div class="relative w-full">
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500"
                                                     fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89
                                                          3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                          clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <input
                                                wire:model.live.debounce.300ms="search"
                                                type="text"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                        focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2"
                                                placeholder="Buscar" required="">
                                        </div>
                                    </div>
                                    <div class="flex justify-center space-x-3 h-10 order-0 lg:order-1">
                                        {{--Add to passengers list--}}
                                        <x-secondary-button
                                            class="inline-flex items-center space-x-2 rounded-l-md border"
                                            wire:click="$dispatch('openModal',
                                            {  component: 'passenger.passenger-modal' })">

                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                 viewBox="0 0 24 24" stroke-width="1.5" stroke="#2563eb"
                                                 class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M12 4.5v15m7.5-7.5h-15" />
                                            </svg>

                                            <span class="whitespace-nowrap">Criar Lista</span>

                                        </x-secondary-button>

                                        {{--create modal--}}
                                        <x-primary-button
                                            wire:click="$dispatch('openModal', { component: 'client.client-modal' })"
                                            class="bg-blue-600 whitespace-nowrap"
                                        >
                                            Novo Cliente
                                        </x-primary-button>
                                    </div>
                                </div>
                                <div class="overflow-auto">
                                    <table class="w-full text-sm text-left text-gray-500 overflow-x-hidden">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-4 py-3"></th>
                                            <th scope="col" class="px-4 py-3">Nome</th>
                                            <th scope="col" class="px-4 py-3">Identidade</th>
                                            <th scope="col" class="px-4 py-3">Idade</th>
                                            <th scope="col" class="px-4 py-3">Cidade</th>
                                            <th scope="col" class="px-4 py-3">Endereço</th>
                                            <th scope="col" class="px-4 py-3">Telefone</th>
                                            <th scope="col" class="px-4 py-3">
                                                <span class="sr-only">Actions</span>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($clients as $client)
                                            <tr wire:key="'{{$client->id}}'" class="border-b border-gray-300">
                                                <td class="ps-6">
                                                    {{--<x-input-label for="passengers" :value="__('Nome')"/>--}}
                                                    <input type="checkbox"
                                                           value="{{$client->id}}"
                                                           wire:click="selectClients('{{$client->id}}')"
                                                           class="appearance-none h-3 w-3 mb-1 border-gray-300"
                                                    />
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">{{$client->name}}</td>
                                                <td class="px-4 py-3">{{$client->identity}}</td>
                                                <td class="px-4 py-3 ">{{$client->age}}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">{{$client->city}}</td>
                                                <td class="px-4 py-3 w-96">{{$client->address}}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">{{$client->phone}}</td>
                                                <td class="px-4 py-3 flex items-center justify-end" >
                                                    <x-dropdown-options align="right" width="80">
                                                        <x-slot name="trigger">
                                                            <div class="inline-flex items-center p-2 border border-transparent
                                                                        text-sm leading-4 font-medium rounded-md text-gray-500
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
                                                                    class=" rounded-r-md border"
                                                                    wire:click="$dispatch('openModal',
                                                                        {
                                                                            component: 'client.client-modal',
                                                                            arguments: {
                                                                                'client_id':'{{$client->id}}'
                                                                            }
                                                                        })"
                                                                >
                                                                    Editar
                                                                </x-dropdown-button>
                                                                {{--Delete client--}}
                                                                <x-dropdown-button
                                                                    class="border-t border-b border-l rounded-l-md"
                                                                    wire:click="$dispatch('openModal',
                                                                                {
                                                                                    component: 'client.confirm.client-confirm-deletion',
                                                                                    arguments: {
                                                                                        'client_id': '{{$client->id}}'
                                                                                    }
                                                                                })">
                                                                    Deletar
                                                                </x-dropdown-button>
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
                                                            <p class="text-gray-500 mt-5">Nenhum cliente para mostrar...</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="p-6">
                                    <div class="flex">
                                        <div class="flex items-center mb-3 gap-2 lg:gap-0">
                                            <label class="w-20 text-sm font-medium text-gray-900 order-1 lg:order-0">Por Pagina</label>
                                            <select
                                                wire:model.live="perPage"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
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
                                    {{ $clients->links() }}
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

