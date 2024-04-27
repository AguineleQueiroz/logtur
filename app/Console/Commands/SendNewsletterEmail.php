<?php

namespace App\Console\Commands;

use App\Mail\MonthlyEmail;
use App\Models\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendNewsletterEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-newsletter-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email newsletter to clients';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $clients = Client::with('user')->get();
        foreach ($clients as $client) {
            Mail::to($client->email)->send(new MonthlyEmail($client));
        }
        $this->info('Monthly emails sent successfully!');
    }
}
