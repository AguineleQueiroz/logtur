
<div>
    <section wire:submit.prevent="save" class="p-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900">Novo Pagamento</h2>
        </header>
        <div class="mt-4 space-y-6">
            <fieldset class="border border-dashed border-gray-300 p-4">
                <legend class="px-2">Cliente</legend>
                <div class="flex flex-col gap-4">
                    <div class="w-full">
                        <x-input-label for="name" :value="__('Nome')"/>
                        <x-text-input wire:model="form.name" id="name" name="name" type="text" class="mt-1 block w-full"
                                      placeholder="{{ __('Nome') }}" disabled/>
                    </div>
                    <div class="w-full">
                        <x-input-label for="phone" :value="__('Telefone')"/>
                        <x-text-input wire:model="form.phone" id="phone" name="phone" type="text" class="mt-1 block w-full"
                                      placeholder="{{ __('Telefone') }}" disabled/>
                    </div>
                </div>
            </fieldset>

            <fieldset class="flex gap-4 border border-dashed border-gray-300 p-4">
                <legend class="px-2">Selecione os meses pagos:</legend>
                <div class="flex w-full">
                    <div class="w-full">
                        <div class="space-x-2">
                            <input type="checkbox" wire:model="form.jan" id="jan" name="jan"/>
                            <label for="jan">Janeiro</label>
                        </div>

                        <div class="space-x-2">
                            <input type="checkbox" wire:model="form.fev" id="fev" name="fev"/>
                            <label for="fev">Fevereiro</label>
                        </div>

                        <div class="space-x-2">
                            <input type="checkbox" wire:model="form.mar" id="mar" name="mar"/>
                            <label for="mar">Março</label>
                        </div>

                        <div class="space-x-2">
                            <input type="checkbox" wire:model="form.abr" id="abr" name="abr"/>
                            <label for="abr">Abril</label>
                        </div>

                        <div class="space-x-2">
                            <input type="checkbox" wire:model="form.mai" id="mai" name="mai"/>
                            <label for="mai">Maio</label>
                        </div>

                        <div class="space-x-2">
                            <input type="checkbox" wire:model="form.jun" id="jun" name="jun"/>
                            <label for="jun">Junho</label>
                        </div>
                    </div>

                    <div class="w-full">
                        <div class="space-x-2">
                            <input type="checkbox" wire:model="form.jul" id="jul" name="jul"/>
                            <label for="jul">Julho</label>
                        </div>

                        <div class="space-x-2">
                            <input type="checkbox" wire:model="form.ago" id="ago" name="ago"/>
                            <label for="ago">Agosto</label>
                        </div>

                        <div class="space-x-2">
                            <input type="checkbox" wire:model="form.set" id="set" name="set"/>
                            <label for="set">Setembro</label>
                        </div>

                        <div class="space-x-2">
                            <input type="checkbox" wire:model="form.out" id="out" name="out"/>
                            <label for="out">Outubro</label>
                        </div>

                        <div class="space-x-2">
                            <input type="checkbox" wire:model="form.nov" id="nov" name="nov"/>
                            <label for="nov">Novembro</label>
                        </div>

                        <div class="space-x-2">
                            <input type="checkbox" wire:model="form.dez" id="dez" name="dez"/>
                            <label for="dez">Dezembro</label>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="mt-6 flex justify-end border-t pt-4">
            <x-secondary-button wire:click="$dispatch('closeModal')">
                Cancelar
            </x-secondary-button>

            <x-primary-button class="ms-3">
                Salvar
            </x-primary-button>
        </div>
    </section>
    @livewire('wire-elements-modal')
</div>
