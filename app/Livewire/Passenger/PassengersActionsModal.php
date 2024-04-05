<?php

namespace App\Livewire\Passenger;

use App\Exports\ListExport;
use App\Models\PassengersList;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;
use Maatwebsite\Excel\Facades\Excel;

class PassengersActionsModal extends ModalComponent
{
    public string $list_id;

    /**
     * show modal template
     * @return View
     */
    public function render(): View
    {
        $list = self::handleList();
        return view('livewire.passenger.passengers-actions-modal', ['data' => $list]);
    }

    /**
     * Get data list by ID - id, name, list
     * @return mixed
     */
    public function getDataListByID(): mixed
    {
        return PassengersList::find($this->list_id);
    }

    /**
     * Handle some data list as name and list
     * @return mixed
     */
    public function handleList(): mixed
    {
        $list = self::getDataListByID();
        /*replace all chars: '_', '/' by ' ' */
        $list->name = ucwords((str_replace('_',' ', strtolower($list->name))));
        $list->list = json_decode($list->list, true);
        return $list;
    }

    /**
     * Download data list on file xlsx format
     * @param $ext
     * @return BinaryFileResponse
     */
    public function export($ext): BinaryFileResponse
    {
        abort_if(!in_array($ext, ['csv', 'xlsx', 'pdf']), Response::HTTP_NOT_FOUND);
        $list = self::getDataListByID();
        return Excel::download(new ListExport($list->id), $list->name.'.'.$ext);
    }
}
