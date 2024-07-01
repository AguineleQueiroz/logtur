<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm">
            <div class="text-gray-900">
                <section class="mt-2">
                    <div class="mx-auto max-w-screen-xl">
                        <div class="bg-white relative shadow-md  overflow-x-auto">
                            <div class="flex items-center justify-between p-6">
                                <div class="flex">
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
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                                                    focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2 "
                                            placeholder="Buscar" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="overflow-x-hidden">
                                <table class="w-full text-sm text-left text-gray-500">
                                    <thead class="text-xs text-gray-700 uppercase bg-sky-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 w-auto">Nome da lista</th>
                                            <th scope="col" class="px-6 py-3 w-auto">Quantidade de pessoas</th>
                                            <th scope="col" class="px-6 py-3 w-auto">Criada em</th>
                                            <th scope="col" class="px-6 py-3">
                                                <span class="sr-only">Actions</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($lists as $list)
                                        <tr wire:key="'{{$list->id}}'" class="border-b border-gray-300 px-6">
                                            <td class="px-6 py-3 w-auto">{{str_replace('_',' ', $list->name)}}</td>
                                            <td class="px-6 py-3 w-auto">{!! $list->size < 1 ? 'Nenhum viajante nesta lista' : $list->size.' viajantes' !!}</td>
                                            <td class="px-6 py-3 w-auto">{{\App\Util\GeneralHelper::formatDate($list->created_at)}}</td>
                                            <td class="px-6 py-3 flex items-center justify-end" >
                                                {{--edit list--}}
                                                <x-generic-button
                                                    class="p-1 border-transparent hover:border-blue-500"
                                                    wire:click="$dispatch('openModal', {  component: 'passenger.edit-list-modal', arguments:{list_id:'{{$list->id}}'} })">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-4 h-4 text-gray-500 hover:text-blue-600">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg>
                                                </x-generic-button>

                                                {{--view list--}}
                                                <x-generic-button
                                                    class="p-1 border-transparent hover:border-gray-300"
                                                    wire:click="$dispatch('openModal', {  component: 'passenger.passengers-actions-modal', arguments:{list_id:'{{$list->id}}'} })">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-4 h-4 text-gray-500 hover:text-gray-800">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>
                                                </x-generic-button>

                                                {{--remove list--}}
                                                <x-generic-button
                                                    class="p-1 border-transparent hover:border-red-600"
                                                    wire:click="$dispatch('openModal',
                                                        {  component: 'passenger.confirm.list-confirm-deletion',
                                                        arguments:{ list_id:'{{$list->id}}' }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-4 h-4 text-gray-500 hover:text-red-600">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>

                                                </x-generic-button>
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
                                                        <p class="text-gray-500 mt-5">There are no lists to show...</p>
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
                                    <div class="flex items-center mb-3">
                                        <label class="w-20 text-sm font-medium text-gray-900">Por Pagina</label>
                                        <select
                                            wire:model.live="perPage"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                                                    focus:ring-blue-500 focus:border-blue-500 block w-20 p-2.5 ">
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                                {{--{{ $lists->links() }}--}}
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    @livewire('wire-elements-modal')
</div>


