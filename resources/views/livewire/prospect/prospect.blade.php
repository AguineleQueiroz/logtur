<div>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm">
                <div class="text-gray-900">
                    <section class="mt-2">
                        <div class="mx-auto max-w-screen-xl">
                            <form wire:submit.prevent="save" class="p-6">
                                @csrf
                                <header class="mb-2">
                                    <h2 class="text-lg font-medium text-gray-900">Cadastrar Pacote</h2>
                                </header>

                                <div class="flex flex-col border-t border-dashed">

                                    {{-- email image --}}
                                    <div class="flex flex-col space-y-4 py-2">
                                        <div class="w-full flex flex-col pb-3">
                                            {{--<label for="photo">Imagem do email:</label>
                                            <div class="border border-gray-300">
                                                <input  type="file" id="photo" wire:model="photo" wire:loading.attr="src" />
                                                <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                                            </div>
                                            <div id="image-preview" wire:loading.class="hidden">
                                                <img src="{{ $photo ? $photo->temporaryUrl()  : ''}}" alt="Imagem carregada">
                                            </div>--}}

                                            <div class="mt-2 flex justify-center border border-dashed border-gray-900/25 p-4"
                                                 style="background-image: url('{{ $photo ? $photo->temporaryUrl()  : ''}}');
                                                 background-size:cover;
                                                 background-position: center"
                                            >
                                                <div class="text-center h-32 flex-col justify-center content-center">
                                                    @if(!$photo)
                                                        <svg class="mx-auto h-10 w-10 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd"
                                                                  d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25
                                                                  2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021
                                                                  18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5
                                                                  1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                                                  clip-rule="evenodd" />
                                                        </svg>
                                                        <div class="mt-2 flex-col text-sm leading-6 text-gray-600">
                                                            <label  for="photo" class="relative cursor-pointer bg-white font-semibold
                                                                text-indigo-600 focus-within:outline-none  hover:text-indigo-500">
                                                                <span>
                                                                    Enviar imagem
                                                                </span>
                                                                <input class="sr-only"  type="file" id="photo" wire:model="photo" wire:loading.attr="src" />
                                                            </label>
                                                            <p class="pl-1">ou arrastar para cá</p>
                                                        </div>
                                                        <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                                    @else
                                                        <button type="button" wire:click="clear" class="h-10 w-10 justify-center align-center p-2" style="background-color: rgb(255,255,255,19%);">
                                                            <img width="50" height="50" src="https://img.icons8.com/ios-filled/50/ffffff/delete-sign--v1.png" alt="delete-sign--v1"/>
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                                        </div>

                                        <div class="flex-col space-y-3" style="margin: 0!important;">
                                            <div class="w-full">
                                                <label for="title" class="text-md">Título</label>
                                                <x-text-input wire:model="title" id="title" name="title" type="text" class="mt-1 block w-full"
                                                              placeholder="{{ __('Título do Email') }}"/>
                                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                            </div>
                                            <div class="w-full">
                                                <label for="body" class="text-md">Conteúdo</label>
                                                <textarea id="body" name="body" wire:model="body"
                                                          class="h-full block w-full  border-0 text-gray-900 ring-1 ring-inset ring-gray-300
                                                          placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm
                                                          sm:leading-6" placeholder="{{ __('Conteúdo do Email') }}">
                                                </textarea>
                                                <x-input-error :messages="$errors->get('body')" class="mt-2" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-2 flex justify-end border-t pt-4 space-x-4 min-w-max">
                                    <x-primary-button class="ms-3">
                                        Enviar Emails
                                    </x-primary-button>
                                </div>

                            </form>
                        </div>
                        @livewire('wire-elements-modal')
                    </section>
                </div>
            </div>
        </div>
    </div>

</div>
