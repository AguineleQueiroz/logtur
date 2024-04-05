@aware(['travel'=>null])

<div class="bg-white rounded-lg shadow-md md:max-w-xxl hover:bg-gray-50 w-full relative mb-6">
    <div class="flex ">
        <div class="bg-no-repeat bg-right-bottom object-cover rounded-l-lg w-[20%]"
             style="background-image: url('{{ asset("$travel->photo") }}');
             background-size: cover;"
        >
        </div>
        <div class="w-[80%] ps-6 px-lg-6">
            <div>
                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 mt-2">{{$travel->name}}</h5>
                <p class="mb-3 font-normal text-gray-700">{{$travel->description}}</p>
            </div>

            <div class="flex flex-col lg:flex-row w-full space-y-2 border-t border-dashed py-2">
                <div class="inline-flex items-center space-x-2 lg:mt-2">
                    <svg style="margin-bottom: 3px!important;"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#64748b" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25
                        2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21
                        18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12
                        15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5
                        15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0
                        2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z"
                    /></svg>

                    <div class="">
                        <p class="font-medium text-gray-500">{{$travel->departure}} - {{$travel->arrival}}</p>
                    </div>
                </div>

                <div class="inline-flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2563eb"
                         class="w-5 h-5 lg:ms-6">
                        <path stroke-linecap="round"
                              stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879
                              1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303
                              0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                    <p class="font-medium text-blue-600">{{$travel->payment_method1}}</p>
                </div>

                <div class="inline-flex items-center space-x-2 lg:ms-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2563eb"
                         class="w-5 h-5">
                        <path stroke-linecap="round"
                              stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75
                              3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25
                              2.25 0 0 0 4.5 19.5Z" />
                    </svg>
                    <p class="font-medium text-blue-600">{{$travel->payment_method2}}</p>
                </div>

                <div class="flex grow justify-items-end items-center">
                    <p class="font-medium text-gray-500 lg:ms-auto">
                        {{ Helper::countPassengersInPackage($travel->passengers_list_id)
                            ? Helper::countPassengersInPackage($travel->passengers_list_id) .' Pessoas'
                            : ''
                         }}
                    </p>
                </div>
            </div>
        </div>
        <x-dropdown-options align="left" width="24" class="object-right-top absolute">
            <x-slot name="trigger">
                <div>
                    <svg
                         class="w-8 h-8 p-1 cursor-pointer rounded-sm text-gray-300 hover:bg-gray-200
                                focus:ring-2 relative mx-2 top-3 hover:text-gray-500"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </div>
            </x-slot>
            <x-slot name="content">
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
                    class="border-t"
                    wire:click="$dispatch('openModal', {
                                    component: 'travel.confirm.travel-confirm-deletion',
                                    arguments: { travel_id: '{{$travel->id}}' } })"
                >
                    Deletar
                </x-dropdown-button>
                {{--payments--}}
                @if(Helper::countPassengersInPackage($travel->passengers_list_id))
                <x-dropdown-button class="border-t">
                    <a wire:navigate href="{{route( 'payment_details', ['travel' => $travel->id] )}}">Pagamentos</a>
                </x-dropdown-button>
                @endif
            </x-slot>
        </x-dropdown-options>
    </div>
</div>

