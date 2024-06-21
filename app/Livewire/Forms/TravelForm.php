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
    public $photo;
    public string $user_id = '';
    public string $name = '';
    public string $description = '';
    public string $departure = '';
    public string $arrival = '';
    public string $payment_method1 = '';
    public string $payment_method2 = '';

    /**
     * Rules for validation fields
     *
     * @return string[]
     */
    protected function rules(): array {
        return [
            'photo' => 'required|image|max:1024',
            'user_id' => 'required',
            'name' => 'required|unique:travels|min:3|max:45|string',
            'description' => 'required|min:5|max:135|string',
            'departure' => 'required|date|after_or_equal:today',
            'arrival' => 'required|date|after_or_equal:departure',
            'payment_method1' => 'required|min:5|max:35|string',
            'payment_method2' => 'required|min:5|max:35|string',
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
            /*handle image package*/
            self::handleAndSavePicture();
            $resultAction = Travel::create($this->only(['photo', 'user_id', 'name', 'description', 'departure', 'arrival', 'payment_method1', 'payment_method2']));
            if(!$resultAction) {
                ClientList::dispatchNotification($resultAction,'Não foi possivel registrar a sua viagem', color: 'white');
            }
            session()->put(['travel_id_created' => $resultAction->id]);
            CreatePassengerListForm::createPassengersList();
            ClientList::dispatchNotification($resultAction,'Viagem registrada com sucesso', color: 'white');
        }else{
            $this->validate([
                'photo' => 'required|max:1024',
                'user_id' => 'required',
                'name' => 'required|min:3|max:45|string',
                'description' => 'required|min:5|max:135|string',
                'departure' => 'required|date|after_or_equal:today',
                'arrival' => 'required|date|after_or_equal:departure',
                'payment_method1' => 'required|min:5|max:35|string',
                'payment_method2' => 'required|min:5|max:35|string',
            ]);
            /*handle image package*/
            self::handleAndSavePicture();
            $resultAction = $this->travel->update(
                $this->only(['photo', 'user_id', 'name', 'description', 'departure', 'arrival', 'payment_method1', 'payment_method2'])
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
        $this->photo = $travel->photo;
        $this->name = $travel->name;
        $this->description = $travel->description;
        $this->departure = $travel->departure;
        $this->arrival = $travel->arrival;
        $this->payment_method1 = $travel->payment_method1;
        $this->payment_method2 = $travel->payment_method2;
    }
}
