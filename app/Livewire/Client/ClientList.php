<?php

namespace App\Livewire\Client;

use App\Models\Client;
use App\Models\User;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use JetBrains\PhpStorm\NoReturn;
use Livewire\Component;
use Livewire\WithPagination;

class ClientList extends Component
{

    use WithPagination;
    public int $perPage = 10;
    public string $search = '';
    /**
     * @return View
     */
    public function render(): View
    {
        /*$clients = User::find(Auth::id())->clients;*/
        return view('livewire.client.client-list', [
            'clients' => Client::where('user_id', Auth::id())->Search($this->search)->paginate($this->perPage)
        ]);
    }

    /**
     * Refresh client list page
     *
     * @return void
     */
    public static function refresh(): void {
        redirect('/clients', true);
    }

    /**
     * Dispatch events messages after actions in the system
     *
     * @param $resultAction
     * @param $title
     * @param $color
     * @param $time
     * @return Notification|void
     */
    public static function dispatchNotification($resultAction = null, $title = null, $color = null, $time = null ) {
        if($resultAction === null) {
            return Notification::make()
                ->title($title ?? 'Registro atualizado!')
                ->color($color ?? 'info')
                ->duration($time ?? 4000)
                ->info()
                ->send();
        }
        if($resultAction) {
            return Notification::make()
                ->title($title ?? 'Cliente registrado')
                ->color($color ?? 'success')
                ->duration($time ?? 4000)
                ->success()
                ->send();
        }else{
            return Notification::make()
                ->title($title ?? 'Ops! Algo deu errado.')
                ->color($color ?? 'warning')
                ->duration($time ?? 4000)
                ->warning()
                ->send();
        }
    }

    /**
     * @param $client_id
     * @return void
     */
    public function selectClients($client_id): void
    {
        $client = (Client::getClient($client_id))->toArray();
        if (session()->exists('selected_clients')) {
            $clients_selected = session('selected_clients');

            if(isset($clients_selected['id'])) {
                if ($clients_selected['id'] !== $client_id) {
                    $clients_selected = array_merge([$clients_selected], [$client]);
                }
            }else{
                $exists = in_array($client_id, array_column($clients_selected, 'id'));
                if (!$exists) {
                    /*append client here without remove others*/
                    $clients_selected = array_merge($clients_selected, [$client]);
                }
            }
            session()->put('selected_clients', $clients_selected);
        }else{
            session()->put('selected_clients', [$client]);
        }
    }
}
