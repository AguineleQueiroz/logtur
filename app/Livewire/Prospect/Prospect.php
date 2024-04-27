<?php

namespace App\Livewire\Prospect;

use App\Mail\MonthlyEmail;
use App\Models\Client;
use Filament\Notifications\Livewire\Notifications;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Prospect extends Component
{
    use WithFileUploads;

    /* Form properties */
    public $photo;
    public string $title = '';
    public string $body = '';

    /**
     * Rules for validation fields
     *
     * @return string[]
     */
    protected function rules(): array {
        return [
            'photo' => 'required|max:1024',
            'title' => 'required|min:3|max:45|string',
            'body' => 'required|min:5|max:135|string'
        ];
    }

    /**
     * Handle image and url
     *
     * @return void
     */
    public function handleAndSavePicture(): void
    {
        if(!Storage::exists('app/public/email_images')) {
            File::makeDirectory(storage_path('app/public/email_images'), 0755, true, true);
        }
        if(!str_contains($this->photo, 'storage/email_images/')) {
            $imageExt = $this->photo->getClientOriginalExtension();
            $filename = time().'.'.$imageExt;
            $urlImage = 'storage/email_images/'.$filename;
            $this->photo->storeAs('email_images', $filename, 'public');

            $this->photo = $urlImage;
        }
    }

    /**
     * Saves data after form submission
     *
     */
    public function save(): void {

        $this->validate();
        /*handle image package*/
        self::handleAndSavePicture();
        $email_sent = 0;
        $clients = Client::with('user')->get();
        $sender_name = Auth::user()->name;
        $sender_email = Auth::user()->email;

        /*email sending routine*/
        foreach ($clients as $client) {
            Mail::to($client->email)->send(new MonthlyEmail($client, $sender_name, $sender_email, $this->title, $this->body));
            $email_sent++;
        }
        Notification::make()
            ->title($email_sent.' Emails enviados')
            ->color('success')
            ->duration(4000)
            ->success()
            ->send();

        $this->reset();
    }

    public function clear(): void {
        $this->reset();
    }

}
