<div>
    <div wire:ignore.self class="p-6">
        <section class="space-y-6">
            <div class="space-y-6">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Deseja mesmo excluir este passageiro da lista?') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted.
                            Please enter your password to Confirm you would like to permanently delete your account.') }}
                </p>
            </div>
            <div class="mt-6 flex justify-end border-t pt-4">
                <x-secondary-button  wire:click="$dispatch('closeModal')">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button wire:click="delete" class="ms-3">
                    {{ __('Deletar') }}
                </x-danger-button>
            </div>
        </section>
        @livewire('wire-elements-modal')
    </div>
</div>
