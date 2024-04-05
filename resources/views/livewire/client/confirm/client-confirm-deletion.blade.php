<div>
    <div wire:ignore.self class="p-6">
        <section class="space-y-6">
            <div class="space-y-6">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Deseja mesmo excluir permanentemente este cliente?') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 text-start">
                    {{ __('Depois que sua conta for excluída, todos os seus recursos e dados serão excluídos permanentemente. Por favor, digite sua senha para confirmar que você deseja excluir permanentemente sua conta.') }}
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
    </div>
    @livewire('wire-elements-modal')
</div>

