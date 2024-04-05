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
                                                placeholder="Buscar" required=""
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div class="overflow-auto">
                                    <table class="w-full text-sm text-left text-gray-500 overflow-x-hidden">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                        <tr>
                                            <th scope="col" class="ps-6 pe-4 py-3">Nome</th>
                                            <th scope="col" class="px-4 py-3">Telefone</th>
                                            <td class="px-4 py-3 whitespace-nowrap">jan</td>
                                            <td class="px-4 py-3 whitespace-nowrap">fev</td>
                                            <td class="px-4 py-3 whitespace-nowrap">mar</td>
                                            <td class="px-4 py-3 whitespace-nowrap">abr</td>
                                            <td class="px-4 py-3 whitespace-nowrap">mai</td>
                                            <td class="px-4 py-3 whitespace-nowrap">jun</td>
                                            <td class="px-4 py-3 whitespace-nowrap">jul</td>
                                            <td class="px-4 py-3 whitespace-nowrap">ago</td>
                                            <td class="px-4 py-3 whitespace-nowrap">set</td>
                                            <td class="px-4 py-3 whitespace-nowrap">out</td>
                                            <td class="px-4 py-3 whitespace-nowrap">nov</td>
                                            <td class="px-4 py-3 whitespace-nowrap">dez</td>
                                            <th scope="col" class="px-4 py-3">
                                                <span class="sr-only">Actions</span>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($passengers as $passenger)
                                            <tr wire:key="'{{$passenger['id']}}'" class="border-b border-gray-300">
                                                <td class="ps-6 pe-4 py-3 whitespace-nowrap">{{$passenger['name']}}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">{{$passenger['phone']}}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    {!! $passenger['jan']
                                                    ?'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#86efac" class="w-4 h-4">
                                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                                    </svg>'
                                                    :'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#f87171" class="w-4 h-4">
                                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
                                                    </svg>'
                                                    !!}
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    {!! $passenger['fev']
                                                    ?'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#86efac" class="w-4 h-4">
                                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                                    </svg>'
                                                    :'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#f87171" class="w-4 h-4">
                                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
                                                    </svg>'
                                                    !!}
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    {!! $passenger['mar']
                                                    ?'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#86efac" class="w-4 h-4">
                                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                                    </svg>'
                                                    :'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#f87171" class="w-4 h-4">
                                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
                                                    </svg>'
                                                    !!}
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    {!! $passenger['abr']
                                                    ?'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#86efac" class="w-4 h-4">
                                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                                    </svg>'
                                                    :'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#f87171" class="w-4 h-4">
                                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
                                                    </svg>'
                                                    !!}
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    {!! $passenger['mai']
                                                     ?'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#86efac" class="w-4 h-4">
                                                         <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                                     </svg>'
                                                     :'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#f87171" class="w-4 h-4">
                                                         <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
                                                     </svg>'
                                                     !!}
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    {!! $passenger['jun']
                                                    ?'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#86efac" class="w-4 h-4">
                                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                                    </svg>'
                                                    :'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#f87171" class="w-4 h-4">
                                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
                                                    </svg>'
                                                    !!}
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    {!! $passenger['jul']
                                                     ?'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#86efac" class="w-4 h-4">
                                                         <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                                     </svg>'
                                                     :'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#f87171" class="w-4 h-4">
                                                         <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
                                                     </svg>'
                                                     !!}
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    {!! $passenger['ago']
                                                    ?'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#86efac" class="w-4 h-4">
                                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                                    </svg>'
                                                    :'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#f87171" class="w-4 h-4">
                                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
                                                    </svg>'
                                                    !!}
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    {!! $passenger['set']
                                                    ?'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#86efac" class="w-4 h-4">
                                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                                    </svg>'
                                                    :'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#f87171" class="w-4 h-4">
                                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
                                                    </svg>'
                                                    !!}
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    {!! $passenger['out']
                                                    ?'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#86efac" class="w-4 h-4">
                                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                                    </svg>'
                                                    :'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#f87171" class="w-4 h-4">
                                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
                                                    </svg>'
                                                    !!}
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    {!! $passenger['nov']
                                                    ?'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#86efac" class="w-4 h-4">
                                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                                    </svg>'
                                                    :'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#f87171" class="w-4 h-4">
                                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
                                                    </svg>'
                                                    !!}
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    {!! $passenger['dez']
                                                    ?'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#86efac" class="w-4 h-4">
                                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                                    </svg>'
                                                    :'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#f87171" class="w-4 h-4">
                                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
                                                    </svg>'
                                                    !!}
                                                </td>
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
                                                                    class=" rounded-md border"
                                                                    wire:click="$dispatch('openModal',
                                                                        {
                                                                            component: 'travel.travel-edit-payments-modal',
                                                                            arguments: {
                                                                                'passenger_id':'{{$passenger['id']}}'
                                                                            }
                                                                        })"
                                                                >
                                                                    Editar
                                                                </x-dropdown-button>
                                                            </div>
                                                        </x-slot>
                                                    </x-dropdown-options>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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


