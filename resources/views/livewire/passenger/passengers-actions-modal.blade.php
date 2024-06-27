<div>
    <section class="p-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900">Informações</h2>
        </header>
        <div class="mt-4 pt-3 space-y-6">
            <div class="h-96 overflow-y-auto">
                <table class="w-full text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="ps-4 pe-2 py-3">Nome</th>
                            <th scope="col" class="px-2 py-3">Identidade</th>
                            <th scope="col" class="px-2 py-3">Telefone</th>
                            <th scope="col" class="px-2 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data->list as $key => $passenger)

                            <tr wire:key="'{{$passenger['id']}}'" class="border-t border-gray-300">
                                <td class="ps-4 pe-2 py-3 w-auto text-sm">{{$passenger['name']}}</td>
                                <td class="px-2 py-3 w-auto text-sm">{{$passenger['identity']}}</td>
                                <td class="px-2 py-3 w-auto text-sm">{{$passenger['phone']}}</td>
                                <td class="px-2 py-3 flex items-center justify-end" >
                                    {{--remove of the list--}}
                                    <x-generic-button wire:click="$dispatch('openModal', {component: 'passenger.confirm.passenger-confirm-deletion', arguments:{ passenger: '{{$passenger['id']}}', list: '{{$data->id}}'}})"
                                        class="p-1 border-transparent hover:border-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ef4444" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </x-generic-button>
                                </td>
                    </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-6 flex justify-end border-t pt-4 space-x-3">
                <x-secondary-button wire:click="$dispatch('closeModal')">
                    Fechar
                </x-secondary-button>

                {{--<button
                    wire:click="export('pdf')"
                    wire:loading.attr="disabled"
                    class="inline-flex items-center px-4 py-2 bg-orange-500 border border-transparent  font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-600 focus:bg-orange-600 active:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-600 focus:ring-offset-2 transition ease-in-out duration-150">
                    Download PDF
                </button>--}}

                <button
                    wire:click="export('xlsx')"
                    wire:loading.attr="disabled"
                    class="inline-flex items-center px-4 py-2 bg-orange-500 border border-transparent  font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-600 focus:bg-orange-600 active:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-600 focus:ring-offset-2 transition ease-in-out duration-150">
                    Download xlsx
                </button>
            </div>
            @livewire('wire-elements-modal')
        </div>
    </section>
</div>

