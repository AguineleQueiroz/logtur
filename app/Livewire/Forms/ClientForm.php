<?php

namespace App\Livewire\Forms;

use App\Livewire\Client\ClientList;
use App\Models\Client;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Livewire\Form;

class ClientForm extends Form
{
    public ?Client $client = null;
    /* form properties */
    public string $user_id = '';
    public string $name = '';
    public string $identity = '';
    public string $age = '';
    public string $city = '';
    public string $address = '';
    public string $phone = '';

    /**
     * Rules for validation fields
     *
     * @return string[]
     */
    protected function rules(): array {
        return [
            'user_id' => 'required',
            'name' => 'required|min:3|string|max:255',
            'identity' => 'required|unique:clients,identity|min:8|max:8|string',
            'age' => 'required|min:7|max:115|numeric',
            'city' => 'required|min:3|max:45|string',
            'address' => 'required|min:5|max:255|string',
            'phone' => 'required|min:11|max:16|string',
        ];
    }

    /**
     * Saves data after form submission
     *
     * @throws ValidationException
     */
    public function save(): void {
        $this->user_id = User::getOwner();
        if(empty($this->client)) {
            $this->validate();
            $resultAction = Client::create($this->only(['user_id', 'name', 'identity', 'age', 'city', 'address', 'phone']));
            ClientList::dispatchNotification($resultAction, color: 'white');

        }else{
            $this->validate([
                'user_id' => 'required',
                'name' => 'required|min:3|string|max:255',
                'identity' => 'required|min:8|max:8|string',
                'age' => 'required|min:7|max:115|numeric',
                'city' => 'required|min:3|max:45|string',
                'address' => 'required|min:5|max:255|string',
                'phone' => 'required|min:11|max:16|string',
            ]);
            $resultAction = $this->client->update($this->only(['user_id', 'name', 'identity', 'age', 'city', 'address', 'phone']));
            $resultAction ? ClientList::dispatchNotification(color: 'white') : ClientList::dispatchNotification(false, color: 'white');
        }
        $this->reset();
    }

    /**
     * Fill fields in edit modal
     *
     * @param Client|null $client
     * @return void
     */
    public function setClient(?Client $client = null):void {
        $this->client = $client;
        $this->user_id =$client->user_id;
        $this->name = $client->name;
        $this->age = $client->age;
        $this->identity = $client->identity;
        $this->city = $client->city;
        $this->address = $client->address;
        $this->phone = $client->phone;
    }

}
