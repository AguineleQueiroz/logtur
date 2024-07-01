<?php

namespace App\Livewire\Forms;

use App\Livewire\Client\ClientList;
use App\Models\Travel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Livewire\Form;
use Livewire\WithFileUploads;

class TravelForm extends Form
{
    use WithFileUploads;

    public ?Travel $travel = null;

    /* Form properties */
    public string $user_id = '';
    public string $destiny = '';
    public string $departure = '';
    public string $arrival = '';
    public int $available_vacancies = 1;
    public int $occupied_vacancies = 0;
    public string $status = 'pending';
    public float $price = 0;


    /**
     * Rules for validation fields
     *
     * @return string[]
     */
    protected function rules(): array {
        return [
            'user_id' => 'required',
            'destiny' => 'required|unique:travels|min:3|max:45|string',
            'status' => 'required|min:5|string',
            'price' => 'required|numeric|min:0',
            'available_vacancies' => 'required|min:1|numeric',
            'occupied_vacancies' => 'required|min:0|numeric',
            'departure' => 'required|date|after_or_equal:today',
            'arrival' => 'required|date|after_or_equal:departure',
        ];
    }

    /**
     * Handle image and url
     *
     * @return void
     */
    public function handleAndSavePicture(): void
    {
        if(!Storage::exists('app/public/travel')) {
            File::makeDirectory(storage_path('app/public/travel'), 0755, true, true);
        }
        if(!str_contains($this->photo, 'storage/travel/')) {
            $imageExt = $this->photo->getClientOriginalExtension();
            $filename = time().'.'.$imageExt;
            $urlImage = 'storage/travel/'.$filename;
            $this->photo->storeAs('travel', $filename, 'public');

            $this->photo = $urlImage;
        }
    }

    /**
     * Saves data after form submission
     *
     * @throws ValidationException
     */
    public function save(): void {
        $this->user_id = User::getOwner();
        if(empty($this->travel)) {
            $this->validate();

            $resultAction = Travel::create($this->only(['user_id', 'destiny', 'status', 'price', 'departure', 'arrival', 'available_vacancies', 'occupied_vacancies']));
            if(!$resultAction) {
                ClientList::dispatchNotification($resultAction,'Não foi possivel registrar a sua viagem', color: 'white');
            }
            session()->put(['travel_id_created' => $resultAction->id]);
            CreatePassengerListForm::createPassengersList();
            ClientList::dispatchNotification($resultAction,'Viagem registrada com sucesso', color: 'white');
        }else{
            $this->validate([
                'user_id' => 'required',
                'destiny' => 'required|min:3|max:45|string',
                'status' => 'required|min:5|string',
                'price' => 'required|numeric',
                'available_vacancies' => 'required|min:1|numeric',
                'occupied_vacancies' => 'required|min:0|numeric',
                'departure' => 'required|date|after_or_equal:today',
                'arrival' => 'required|date|after_or_equal:departure',
            ]);
            $resultAction = $this->travel->update(
                $this->only(['user_id', 'destiny', 'status', 'price', 'departure', 'arrival', 'available_vacancies', 'occupied_vacancies'])
            );
            $resultAction ? ClientList::dispatchNotification(title: 'Viagem atualizada com sucesso', color: 'white')
                : ClientList::dispatchNotification(false, color: 'white');
        }
        $this->reset();
    }

    /**
     * Fill fields in edit modal
     *
     * @param Travel|null $travel
     * @return void
     */
    public function setTravelData(?Travel $travel = null):void {

        /* invert date from YYYY-MM-DD H:i:s to YYYY-MM-DD */
        $travel->departure = Carbon::createFromFormat('Y-m-d H:i:s', $travel->departure)->format('Y-m-d');
        $travel->arrival = Carbon::createFromFormat('Y-m-d H:i:s', $travel->arrival)->format('Y-m-d');

        $this->travel = $travel;
        $this->user_id =$travel->user_id;
        $this->destiny = $travel->destiny;
        $this->status = $travel->status;
        $this->price = $travel->price;
        $this->departure = $travel->departure;
        $this->arrival = $travel->arrival;
        $this->available_vacancies = $travel->available_vacancies;
        $this->occupied_vacancies = $travel->occupied_vacancies;
    }
}
